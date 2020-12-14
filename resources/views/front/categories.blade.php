@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 align="center" class="mt-5 pt-3" style="">All Categories</h1>
        </div>

        <div class="row">
            @if($categories->count() != 0)
                @foreach ($categories as $category)
                    <div class="col-md-4 col-sm-6">
                        <div class="category">
                            <a href="#">
                                <div class="book-counter">{{count($category->books)}}</div>

                                <div class="category-name">{{\Illuminate\Support\Str::limit($category->title, 15, '...')}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection