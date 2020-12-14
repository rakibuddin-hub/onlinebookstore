<?php

namespace App\Http\Controllers\Frontend;

use App\Author;
use App\Order;
use App\User;
use Cart;
use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index(){
        $categories = Category::take(9)->get();
        $books = Book::where('status', 1)->take(8)->get();
        $settings = DB::table('settings')->where('id', 1)->get()[0];
        return view('front.home.welcome', compact('categories', 'settings', 'books', 'subTotal', 'cartTotalQuantity'));
    }

    public function viewBook($slug){
        $book = Book::where('slug',$slug)->first();
        return view('front.book.index', compact('book'));
    }

    public function login(){
        return view('front.auth.login');
    }

    public function register(){
        return view('front.auth.register');
    }

    public function dashboard(){
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.index');
        }else if(auth()->user()->isPublisher()){
            return redirect()->route('publisher.index');
        }
        $districts = DB::table('districts')->orderBy('name')->get();
//        $orders = Order::where()
        return view('front.dashboard.dashboard', compact('districts'));
    }

    public function publisher_reg(){
        return view('front.auth.publisher_reg');
    }

    public function add_publisher(Request $request){
        if(Publisher::where('email', '=', $request->email)->exists() || Publisher::where('slug', '=', $request->slug)->exists()){
            return redirect()->back();
        }
        Publisher::create([
            'title' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => 2,
            'password' => $request->password,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('welcome');
    }

    public function authorIndex(){
        $authors = Author::all();
        return view('front.authors', compact('authors'));
    }
    public function publisherIndex(){
        $publishers = Publisher::where('is_active', 1)->get();
        return view('front.publisher', compact('publishers'));
    }
    public function categoryIndex(){
        $categories = Category::all();
        return view('front.categories', compact('categories'));
    }

    public function bookList(){
        $books = Book::where('status', 1)->paginate(30);
        return view('front.books', compact('books'));
    }

    public function search(Request $request){
        $books = Book::where('title', 'LIKE', '%'.$request->name.'%')->get();
        $authors = Author::where('name', 'LIKE', '%'.$request->name.'%')->get();
        $compact = compact('books', 'authors');
        return view('front.book.search', $compact);
    }

    public function updateUserInfo(Request $request){
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'alt_phone' => $request->alt_phone,
            'address' => $request->address,
            'postal_code' => $request->post_code,
            'district' => $request->district,
        ]);
        return redirect()->route('dashboard');
    }
}
