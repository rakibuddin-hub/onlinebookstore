<div class="pre-header">
    <div class="container">
        <div class="row">
            <div class="col-6 left-section">
                <ul>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <span>+88-01918-889-116</span>
                    </li>
                    {{--<li>--}}
                    {{--<a href="#">অর্ডার দেয়ার নিয়ম</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="#">রিফান্ড পলিসি</a>--}}
                    {{--</li>--}}
                </ul>
            </div>

            <div class="col-6 right-section">
                <ul>
                    @if(Auth::check())
                        <li>
                            <a href="#">Welcome! {{Auth::user()->name}}</a>
                        </li>
                        <li>
                            <a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}"><i class="fas fa-user"></i> Login</a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{route('register')}}">Registration</a>--}}
                        {{--</li>--}}
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="logo-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <a href="{{route('welcome')}}"><img class="logo" src="{{asset('frontComponents/images/logo11.jpeg')}}" alt="logo"></a>
            </div>

            <div class="col-12 col-lg-7 search-box">
                <form action="{{route('book.search')}}" method="POST">
                    @csrf
                    <div style="display:none;">
                        <input type="hidden" name="_method" value="POST">
                    </div>
                    <div class="input-group">
                        <input type="text" placeholder="Search For Books" name="name" class="form-control" id="search_book">
                        <span class="input-group-btn">
                                <button class="btn red" type="submit">Search</button>
                            </span>
                    </div>
                    <div id="search_items_container" class="search-products clearfix"></div>
                </form>
            </div>

            <div class="col-12 col-lg-2 cart-block">
                @php
                    $subTotal = Cart::getSubTotal();
                    $cartTotalQuantity = Cart::getTotalQuantity();
                @endphp
                <div class="cart-info">
                    <a href="#" style="border-right: solid 1px #d8d8d8;" class="cart-info-count">{{$cartTotalQuantity}} Book</a>
                    <a href="#" class="cart-info-value" style="border-right:0px;">৳&nbsp;{{$subTotal}}</a>
                    <a href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- logo-header ends here -->


<!-- navbar starts here -->

<div class="navbar">
    <div class="container">
        <nav class="navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-bar">
                <i class="fas fa-bars"></i>&nbsp; Menu
            </button>

            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{route('welcome')}}" class="nav-link" id="nav-item1"><i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.grid')}}" class="nav-link" id="nav-item2">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('publisher.grid')}}" class="nav-link" id="nav-item3">Publishers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('author.grid')}}" class="nav-link" id="nav-item4">Authors</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('book.grid')}}" class="nav-link" id="nav-item5">All Books</a>
                    </li>
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" href="#" id="nav-item6" data-toggle="dropdown">কওমী পাঠ্য কিতাব</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">দাওরায়ে হাদীস</a></li>--}}
                            {{--<li><a href="#">জামাতে মেশকাত</a></li>--}}
                            {{--<li><a href="#">জামাতে হেদায়া-জালালাইন</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a href="{{route('publisher.reg')}}" class="nav-link" id="nav-item7">Publisher Corner</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a href="" class="nav-link" id="nav-item8"> যোগাযোগ</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="" class="nav-link" id="nav-item9">অভিযোগ ও পরামর্শ</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a href="" class="nav-link" id="nav-item10"> আমাদের কথা</a>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </nav>
    </div>
</div>