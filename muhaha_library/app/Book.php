<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function hasManyCopies()
    {
        return $this->hasMany('App\Status', 'book_id', 'book_id');
    }

    
    protected $fillable = ['title', 'author','category', 'description','copies'];

    
}
