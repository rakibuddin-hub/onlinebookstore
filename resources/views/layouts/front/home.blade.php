<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kureghor</title>
    <link rel="stylesheet" href="{{asset('frontComponents/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontComponents/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('frontComponents/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontComponents/css/responsive-combined.css')}}">
    <link rel="stylesheet" href="{{asset('frontComponents/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontComponents/css/owl.theme.default.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a1d3e51d60.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- navbar starts here -->
@include('layouts.front.components.navbar')
<!-- navbar ends here -->


@yield('content')

<!-- book-slider-section ends here -->


<!-- pre-footer starts here -->

@include('layouts.front.components.footer')

<!-- footer endss here -->

@stack('scripts')
<script src="{{asset('frontComponents/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('frontComponents/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontComponents/js/aos.js')}}"></script>
<script src="{{asset('frontComponents/js/owl.carousel.min.js')}}"></script>
<script>
    AOS.init({
        duration: 1000
    });
    //  AOS.init({
    //      disable: function() {
    //      var maxWidth = 575;
    //      return window.innerWidth < maxWidth;
    //      }
    //  });
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
</body>
</html>