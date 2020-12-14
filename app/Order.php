<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'id',
        'customer_name',
        'phone',
        'alt_phone',
        'postal_code',
        'address',
        'district',
        'customer_id',
        'payment_method',
        'trx_id',
        'total',
        'delivery_charge',
        'subtotal',
        'status',
        'created_at',
        'updated_at',
    ];

    public function products(){
        return $this->hasMany('App\OrderProducts', 'order_id', 'id');
    }
}
