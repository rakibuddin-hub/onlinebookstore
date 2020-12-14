@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Shopping Cart</h1>
        </div>
        <hr>
        <div>
            @if(Cart::isEmpty())
                <div class="alert alert-danger text-center" role="alert">
                    Your cart is currently empty!
                </div>
            @else
            <section>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card wish-list mb-3">
                            <div class="card-body">

                                <h5 class="mb-4">Cart (<span>{{Cart::getTotalQuantity()}}</span> items)</h5>
                                @foreach($items as $item)
                                <div class="row mb-4">
                                    <div class="col-md-5 col-lg-3 col-xl-3">
                                        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                            <img class="img-fluid w-100"
                                                 src="{{url('/storage/'.$item['attributes']['image_path'])}}" alt="Sample">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                        <form action="{{route('cart.update')}}" method="POST">
                                        @csrf
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <h5>{{\Illuminate\Support\Str::limit($item['name'], $limit = 15, $end = '...')}}</h5>
                                                    <p class="mb-3 text-uppercase small">By <span><b>{{$item['attributes']['author']}}</b></span></p>
                                                    <p style="color: green" class="mb-2 text-uppercase small">Unit Price: {{$item['price']}} BDT</p>
                                                </div>
                                                <div>
                                                    <div class="def-number-input number-input safari_only mb-0 w-100">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                class="minus"><i class="fas fa-minus"></i></button>
                                                        <input type="text" value="{{$item['id']}}" name="id" hidden>
                                                        <input class="quantity" min="0" name="quantity" value="{{$item['quantity']}}" type="number">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                class="plus"><i class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="{{route('cart.remove', $item['id'])}}" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                                                                class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                    {{--<a href="#!" type="submit" class="card-link-secondary small text-uppercase"><i--}}
                                                                {{--class="fa fa-refresh mr-1"></i> Update Quantity </a>--}}
                                                </div>
                                                <p class="mb-0"><span><strong>Total: {{$item['quantity']*$item['price']}}</strong></span></p>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <hr class="mb-4">
                                <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                                    items to your cart does not mean booking them.</p>

                            </div>
                        </div>
                        <!-- Card -->




                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-4">

                        <!-- Card -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <h5 class="mb-3">Checkout Summary</h5>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        Total
                                        <span>৳{{Cart::getSubTotal()}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                        Delivery Charge
                                        <span>৳{{$dev_crg}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                        <div>
                                            <strong>Subtotal</strong>
                                        </div>
                                        <span><strong>৳{{Cart::getSubTotal()+$dev_crg}}</strong></span>
                                    </li>
                                </ul>

                                <a href="{{route('cart.checkout')}}" type="button" class="btn red">Proceed to checkout</a>

                            </div>
                        </div>
                        <!-- Card -->

                        <!-- Card -->
                    {{--<div class="card mb-3">--}}
                    {{--<div class="card-body">--}}

                    {{--<a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample1"--}}
                    {{--aria-expanded="false" aria-controls="collapseExample1">--}}
                    {{--Add a discount code (optional)--}}
                    {{--<span><i class="fas fa-chevron-down pt-1"></i></span>--}}
                    {{--</a>--}}

                    {{--<div class="collapse" id="collapseExample1">--}}
                    {{--<div class="mt-3">--}}
                    {{--<div class="md-form md-outline mb-0">--}}
                    {{--<input type="text" id="discount-code1" class="form-control font-weight-light"--}}
                    {{--placeholder="Enter discount code">--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <!-- Card -->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            @endif
        </div>
    </div>
@endsection