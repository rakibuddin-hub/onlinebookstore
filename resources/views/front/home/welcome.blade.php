@extends('layouts.front.home')

@section('content')
    <!-- page-slider starts here -->

    @include('front.home.components.slider')

    <!-- page-slider ends here -->


    <!-- service-section starts here -->

{{--    @include('front.home.components.service_banner_1')--}}

    <!-- service-section ends here -->


    <!-- main-section starts here -->

    @include('front.home.components.popular_categories')

    <!-- main-section ends here -->


    <!-- fav-section starts here -->

    @include('front.home.components.popular_books')

    <!-- fav-section ends here -->


    <!-- service-section-2 starts here -->

    @include('front.home.components.service_banner_2')

    <!-- service-section-2 ends here -->


    <!-- product-slider-section starts here -->

    @include('front.home.components.category_slider')

    <!-- product-slider-section ends here -->
@endsection