@extends('layouts.front.home')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 align="center" class="mt-5 pt-3" style="">All Authors</h1>
        </div>

        <div class="row">
            @if($authors->count() != 0)
                @foreach ($authors as $author)
                    <div class="col-md-4 col-sm-6">
                        <div class="category">
                            <a href="#">
                                <div class="book-counter">{{count($author->books)}}</div>

                                <div class="category-name">{{$author->name}}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection