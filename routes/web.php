<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::get('/', [BookController::class, 'index']);

Route::resource('users', UserController::class);
Route::resource('books', BookController::class);

/*Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('books', \App\Http\Controllers\BookController::class);
});


Route::get('/', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::middleware('auth')->group(function () {
    Route::post('/book/{id}/favorite', [BookController::class, 'toggleFavorite']);
    Route::get('/profile', [ProfileController::class, 'edit']);
});*/
