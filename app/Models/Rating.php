<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public function books(){
        return $this->belongsToMany(Book::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
