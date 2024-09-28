<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
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
