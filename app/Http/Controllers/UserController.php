<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::select(['id', 'name', 'email', 'isAdmin'])->get();
        return view('user.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // Creazione dell'utente
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->isAdmin ?? false,
        ]);

        // Restituisci una risposta di successo
        return redirect()->route('users.index')->with('success', 'Registrazione avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $isAdmin=0;

        if(isset($request->isAdmin) && $request->isAdmin=='on')
        {
            $isAdmin=1;
        }

        //$user=User::find($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->isAdmin=$isAdmin;
        $user->save();

        return redirect(route('users.edit', $user));
    }


    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'oldpassword' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if(Hash::check($request->input('oldpassword'), $user->password))
        {
            $user->password=Hash::make($request->input('password'));
            $user->save();
        }
        else {
            return redirect(route('users.edit', $user));
        }

        return redirect(route('users.index'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
