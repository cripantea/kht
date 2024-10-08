<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded=[];
    public function usersWhoFavorited()
    {
        return $this->belongsToMany(User::class, 'favorite_books')->withTimestamps();
    }

    public function isFavorite()
    {
        return auth()->user()->favoriteBooks()->where('book_id', $this->id)->exists();
    }

}
