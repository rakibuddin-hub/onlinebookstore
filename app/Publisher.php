<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['title', 'slug', 'email', 'phone', 'password', 'is_active'];

    public function books(){
        return $this->hasMany('App\Book', 'publisher_id', 'id');
    }
}
