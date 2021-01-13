<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function genres(){
        return  $this->belongsToMany(Book::class);
    }
    public function author(){
        return $this->belongsTo(User::class, "author_id");
    }
    public function users(){
        return $this->belongsToMany(User::class, "book_user", "book_id", "user_id");
    }
    public function ratings(){
        return $this->belongsToMany(Rating::class);
    }
}

