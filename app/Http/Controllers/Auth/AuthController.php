<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    // Mostra il form di registrazione
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Gestisce la registrazione degli utenti
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $isAdmin=0;

        if(isset($request->isAdmin) && $request->isAdmin=='on')
        {
            $isAdmin=1;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $isAdmin,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Mostra il form di login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gestisce il login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.',
        ]);
    }

    // Gestisce il logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
