<div class="fav-section">

    <h1 class="fav-section-title">Popular Books</h1>

    <div class="container">
        <div class="row">
            @if($books->count() != 0)
                @foreach($books as $book)
                    <div class="col-6 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                        <div class="product-item">
                            <div class="product-image">
                                <img src="{{url('/storage/'.$book->image_path)}}" alt="">

                                <div>
                                    <a href="{{route('view.book', $book->slug)}}" class="btn btn-default">Details</a>
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
                                    @if($book->discount_price == 0)
                                        <span>৳{{$book->price}}</span>
                                    @else
                                    <span style="color: black;"><s>৳{{$book->price}}</s></span>
                                    <span>৳{{$book->discount_price}}</span>
                                    @endif
                                </div>
                            </div>

                            <a href="{{route('cart.add', $book->id)}}" class="btn red clearfix large">Add to cart <i class="fa fa-cart-arrow-down"></i></a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="category-more-btn">
            <a href="#">All Books <i class="fa fa-arrow-circle-o-right"></i></a>
        </div>
    </div>
</div>