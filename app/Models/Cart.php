<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Books;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'books_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class, 'books_id');
    }
}

