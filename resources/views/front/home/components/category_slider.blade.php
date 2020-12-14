<div class="product-slider-section">
    <div class="container">
        <div class="row">

            @if(count($categories) != 0)
                @foreach($categories as $category)
                    @if(count($category->books) != 0)
                        <div class="col-12">
                            <div class="product-category-title">
                                <h1>{{$category->title}}</h1>
                                <a href="#">More Books <i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="owl-carousel owl-theme">
                                @foreach ($category->books as $book)
                                    <div class="item">
                                        <div class="product-item">
                                            <div class="product-image">
                                                <img src="{{url('/storage/'.$book->image_path)}}" alt="">

                                                <div>
                                                    <a href="#" class="btn btn-default">Details</a>
                                                </div>
                                            </div>

                                            <div class="product-details">
                                                <h3>
                                                    <a href="#">{{$book->title}}</a>
                                                </h3>

                                                @foreach($book->authors as $author)
                                                    <h6>{{$author->name}}</h6>
                                                    @break
                                                @endforeach

                                                <div class="product-price">
                                                    @if($book->discount_price == 0)
                                                        <span>৳{{$book->price}}</span>
                                                    @else
                                                        <span style="color: red;"><s>৳{{$book->price}}</s></span>
                                                        <span>৳{{$book->discount_price}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <a href="{{route('cart.add', $book->id)}}" class="btn red clearfix large">Add to cart&nbsp;<i
                                                        class="fa fa-cart-arrow-down"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>