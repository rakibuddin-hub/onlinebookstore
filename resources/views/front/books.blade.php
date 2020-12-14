@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 align="center" class="mt-5 pt-3" style="">All Books</h1>
        </div>

        <div class="row">
            @if($books->count() != 0)
                @foreach($books as $book)
                    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{url('/storage/'.$book->image_path)}}" alt="">

                                <div>
                                    <a href="#" class="btn btn-default">Details</a>
                                </div>
                            </div>

                            <div class="product-details">
                                <h3>
                                    <a href="#">{{ \Illuminate\Support\Str::limit($book->title, $limit = 20, $end = '...') }}</a>
                                </h3>

                                @foreach($book->authors as $author)
                                    <h6>{{$author->name}}</h6>
                                    @break
                                @endforeach

                                <div class="product-price">
                                    <span>৳</span>&nbsp;{{$book->price}}
                                </div>
                            </div>

                            <button class="btn red clearfix large">Add to cart <i class="fa fa-cart-arrow-down"></i></button>
                        </div>
                    </div>
                @endforeach
            @endif
                {{ $books->links() }}
        </div>
    </div>

@endsection