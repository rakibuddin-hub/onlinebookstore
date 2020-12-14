<?php

namespace App\Http\Controllers\Frontend;

use App\Order;
use App\OrderProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function submit(Request $request){
        $products = Cart::getContent()->toArray();
        $settings = DB::table('settings')->where('id', 1)->first();
        if(Auth::check()){
            $customer_id = Auth::user()->id;
        }else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'alt_phone' => $request->alt_phone,
                'address' => $request->address,
                'postal_code' => $request->post_code,
                'district' => $request->district,
                'user_role' => 2,
            ]);
            $customer_id = $user->id;
        }
        $order = Order::create([
            'customer_name' => $request->name,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'postal_code' => $request->post_code,
            'address' => $request->address,
            'district' => $request->district,
            'customer_id' => $customer_id,
            'payment_method' => $request->payment_method,
            'trx_id' => $request->trx_id,
            'total' => Cart::getSubTotal(),
            'delivery_charge' => $settings->delivery_charge,
            'subtotal' => Cart::getSubTotal()+$settings->delivery_charge,
        ]);
        foreach($products as $product){
            OrderProducts::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'total' => $product['price']*$product['quantity'],
                'book_name' => $product['name'],
                'author' => $product['attributes']['author'],
                'image_path' => $product['attributes']['image_path']
            ]);
        }

        Cart::clear();

        return view('front.cart.orderconfirm');
    }
}
