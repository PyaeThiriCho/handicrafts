<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shopping</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/bootstrap/css/bootstrap.min.css')}}">

    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/css/style.css')}}">

    {{-- Slide --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--icon-->
    <link rel="stylesheet" href="{{ asset('frontend_assets/font/css/all.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>
<body>
    
{{-- Navigation --}}
@include('frontend.parts.navbar')


@yield('content')

    <!-- footer -->
    @include('frontend.parts.footer')
    



     <!--jquery-->
     <script src="{{ asset('frontend_assets/js/jquery.min.js')}}" type="text/javascript"></script>

     {{-- slick --}}
    <script src="{{ asset('frontend_assets/js/slick.js')}}"></script>

    <!--custom js-->
    <script src="{{ asset('frontend_assets/js/custom.js')}}"></script>

    {{-- Slide --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
   
   

     <!--bootstrap-->
    <script src="{{ asset('frontend_assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!--icon-->
    <script src="{{ asset('frontend_assets/font/js/all.min.js') }}"></script>
</body>
</html>

