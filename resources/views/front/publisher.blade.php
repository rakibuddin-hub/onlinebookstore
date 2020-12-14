@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 align="center" class="mt-5 pt-3" style="">All Publishers </h1>
        </div>

        <div class="row">
            @if($publishers->count() != 0)
                @foreach ($publishers as $publisher)
                    <div class="col-md-4 col-sm-6">
                        <div class="category">
                            <a href="#">
                                <div class="book-counter">{{count($publisher->books)}}</div>

                                <div class="category-name">{{\Illuminate\Support\Str::limit($publisher->title, 18, '...')}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection