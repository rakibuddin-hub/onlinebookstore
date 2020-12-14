@extends('layouts.front.home')




@section('content')
    <div class="container mb-3">
        <form action="{{route('order.submit')}}" method="POST">
         @csrf
        <div class="row">
            <div class="col-8">
                <div style="background-color: aliceblue; box-shadow: 2px 2px grey">
                    <h5 style="padding: 20px;">Please Fill out this form
                        @if(!Auth::check())<span class="pl-5">Already have an account? <a href="{{route('login')}}" class="btn btn-sm btn-success">Login</a></span>@endif
                    </h5>
                </div>
                <div style="background-color: aliceblue; box-shadow: 2px 2px grey">
                    <div style="padding:20px">
                        <div class="row">
                            <div class="col">
                                <h3>Order Information</h3>

                                <div class="form-group">
                                    <label>Full name</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                                    @else
                                        <input type="text" class="form-control" name="name" required>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Phone No</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" required>

                                    @else
                                        <input type="text" class="form-control" name="phone" required>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Alternate Phone No</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" name="alt_phone" value="{{Auth::user()->alt_phone}}" required>
                                    @else
                                        <input type="text" class="form-control" name="alt_phone" required>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    @if(Auth::check())
                                        <input type="text" class="form-control" name="post_code" value="{{Auth::user()->postal_code}}" required>
                                    @else
                                        <input type="text" class="form-control" name="post_code" required>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Select District</label>
                                    <select class="form-control" name="district" required>
                                        @if(Auth::check())
                                            @foreach ($districts as $district)
                                                <option value="{{$district->name}}">{{$district->name}}</option>
                                            @endforeach
                                                <option value="{{Auth::user()->district}}" selected>{{Auth::user()->district}}</option>
                                        @else
                                            @foreach ($districts as $district)
                                                <option value="{{$district->name}}">{{$district->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Address</label>
                                    @if(Auth::check())
                                        <textarea type="text" class="form-control" name="address" rows="4" placeholder="Example: 11/1 Islami Tower, Banglabazar, Dhaka - 1100" required>{{Auth::user()->address}}</textarea>
                                    @else
                                        <textarea type="text" class="form-control" name="address" rows="4" placeholder="Example: 11/1 Islami Tower, Banglabazar, Dhaka - 1100" required></textarea>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if(!Auth::check())
                            <div class="row">
                                <div class="col">
                                    <h3>Account Information</h3>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Auth::check())
                            <button type="submit" class="btn btn-block btn-info">Confirm Order</button>

                        @else
                            <button type="submit" class="btn btn-block btn-info">Confirm Order and Create Account</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="text-center" style="background-color: aliceblue; box-shadow: 2px 2px grey">
                    <h5 style="padding: 20px;">Payment</h5>
                </div>
                <div class="p-3" style="background-color: aliceblue; box-shadow: 2px 2px grey">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="mb-3">Checkout Summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Total
                                    <span>৳{{Cart::getSubTotal()}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Delivery Charge
                                    <span>৳{{$settings->delivery_charge}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    <div>
                                        <strong>Subtotal</strong>
                                    </div>
                                    <span><strong>৳{{Cart::getSubTotal()+$settings->delivery_charge}}</strong></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-2 p-3" style="background-color: white; border: 1px solid #d7d1d1">
                        <h5>Select Payment Method</h5>
                        <div class="input-group">
                            <div class="radio">
                                <label><input type="radio" onchange="$('#bkash_entry').css('display', 'none')" value="1" name="payment_method" checked>  Cash on delivery</label>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="radio">
                                <label><input type="radio" onchange="$('#bkash_entry').css('display', 'block')" value="2" name="payment_method">  Bkash</label>
                            </div>
                        </div>
                        <div id="bkash_entry" style="display: none">
                            <p>Please Send <b>৳{{Cart::getSubTotal()+$settings->delivery_charge}}</b> to this number:
                                    <b>{{$settings->bkash_num}}</b>(Personal) and enter Transaction ID here:</p>
                            <div class="form-group">
                                <input type="text" class="form-control" name="trx_id">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
