<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = ['name', 'slug', 'description'];

    public function books(){
        return $this->belongsToMany('App\Book', 'book_authors', 'author_id', 'book_id');
    }
}
