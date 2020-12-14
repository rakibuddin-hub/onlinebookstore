@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron" style="height: 300px;background-image: url({{url('frontComponents/images/libraries_vnpqsr.jpg')}});background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;">
            <h1 align="center" class="mt-5 pt-3" style="color: white; text-shadow: 4px 4px green;">Become a partner!</h1>
        </div>

        <div class="card">
            <div class="card-header"><b>Registration for Publishers!</b></div>

            <div class="card-body">
                <form method="POST" action="{{ route('publisher.add') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Enter Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control" name="phone">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn red">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
                <hr>
                <p align="center" class="pt-3"><b>After registration, our agent will contact you within 24h and confirm your account!</b></p>
            </div>
        </div>
    </div>

@endsection