<?php

namespace App\Http\Controllers\Frontend;

use App\Book;
use Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index(){
        $items =Cart::getContent()->toArray();
        $dev_crg = DB::table('settings')->where('id', 1)->get()[0]->delivery_charge;
        return view('front.cart.index', compact('items', 'dev_crg'));
    }

    public function add(Request $request){
        $book = Book::where('id', $request->id)->get()[0];
        $price = $book->price;
        if($book->discount_price != 0){
            $price = $book->discount_price;
        }
        if(Cart::get($book->id) != null){
            Cart::update($book->id, array(
                'quantity' => 1,
            ));
            return redirect()->back();
        }

        Cart::add($book->id, $book->title, $price, 1, ['image_path' => $book->image_path, 'author' => $book->authors[0]->name]);
        return redirect()->back();
    }

    public function update(Request $request){
        if($request->quantity == 0){
            $this->remove($request->id);
        }
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->back();
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function checkout(){
        $settings = DB::table('settings')->where('id', 1)->first();
        $districts = DB::table('districts')->orderBy('name')->get();
        return view('front.cart.checkout', compact('districts', 'settings'));
    }
}
