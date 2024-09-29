<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $books=Book::all();
        return view('dashboard', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imagePath=uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
        Storage::disk('public')->put('photos/'. $imagePath, file_get_contents($request->file('image')));

        Book::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath
        ]);
        return redirect()->route('dashboard')->with('success', 'book created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->price = $request->input('price');

        // Check if a new image has been uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($book->image && Storage::disk('public')->exists('photos/'.$book->image)) {
                Storage::disk('public')->delete('photos/'.$book->image);
            }
            $imagePath=uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put('photos/'. $imagePath, file_get_contents($request->file('image')));
            $book->image=$imagePath;
        }
        $book->save();
        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->usersWhoFavorited()->detach();
        $book->delete();
        return redirect(route('books.index'));
    }

    public function toggleFavorite($id)
    {
        $book = Book::findOrFail($id);
        $user = auth()->user();
        $result='';
        if ($user->favoriteBooks()->where('book_id', $id)->exists()) {
            $user->favoriteBooks()->detach($id);
            $result="Rimosso dai favoriti!";
        } else {
            $user->favoriteBooks()->attach($id);
            $result="Aggiunto ai favoriti!";
        }
        return redirect()->back()->with(compact('result'));
    }

}
