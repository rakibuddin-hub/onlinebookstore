@extends('layouts.front.home')


@section('content')
    <div class="container">
        <div class="jumbotron text-center">
            <h1>User Dashboard</h1>
        </div>
        <div class="container mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User Profile</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Order</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <form action="{{route('user.info.update')}}" method="POST">
                                @csrf
                                <div>
                                    <div style="padding:20px">
                                        <div class="row">
                                            <div class="col">
                                                <h3>Update User Info</h3>
                                                <div class="form-group">
                                                    <label>Full name</label>
                                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Phone No</label>
                                                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Alternate Phone No</label>
                                                    <input type="text" class="form-control" name="alt_phone" value="{{Auth::user()->alt_phone}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="text" class="form-control" name="post_code" value="{{Auth::user()->postal_code}}" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Select District</label>
                                                    <select class="form-control" name="district" required>
                                                        @foreach ($districts as $district)
                                                            <option value="{{$district->name}}">{{$district->name}}</option>
                                                        @endforeach
                                                        <option value="{{Auth::user()->district}}" selected>{{Auth::user()->district}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea type="text" class="form-control" name="address" rows="4" placeholder="Example: 11/1 Islami Tower, Banglabazar, Dhaka - 1100" required>{{Auth::user()->address}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        <button type="submit" class="btn btn-block btn-info">Update Information</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection