<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = "order_products";

    protected $fillable = ['order_id', 'product_id', 'quantity', 'total', 'book_name', 'author', 'image_path'];

    public $timestamps = false;
}
