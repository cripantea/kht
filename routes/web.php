<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', [BookController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [UserController::class, 'create']);


Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/{user}/updatePassword', [UserController::class, 'updatePassword'])->name('users.updatePassword');

//Route::resource('users', UserController::class);

Route::resource('books', BookController::class);

Route::post('/book/{id}/favorite', [BookController::class, 'toggleFavorite'])->name('book.toggle');




Route::get('/users', [UserController::class, 'index'])->name('users.index');




Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


