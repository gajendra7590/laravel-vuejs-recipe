<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Recipe Portal') }}</title>    
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="shortcut icon" href="{{ URL::asset('app//app/img/favicon.png') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/normalize.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/main.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/animate.min.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/fontawesome-all.min.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/fonts/flaticon.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('app/css/owl.theme.default.min.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('app/style.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('css/front-custom.css') }}"> 
    <script src="{{ URL::asset('app/js/modernizr-3.6.0.min.js') }}"></script>
</head> 
<body>
    {{-- <div id="preloader"></div> --}}
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <input type="hidden" value="{{ URL::asset('/') }}" name="asset_url">
     
        <div id="app"></div> 
        @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Jquery Js -->
    <script src="{{ URL::asset('app/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ URL::asset('app/js/popper.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ URL::asset('app/js/bootstrap.min.js') }}"></script>
    <!-- Plugins Js -->
    <script src="{{ URL::asset('app/js/plugins.js') }}"></script>
    <!-- Owl Carousel Js -->
    <script src="{{ URL::asset('app/js/owl.carousel.min.js') }}"></script>
    <!-- Smoothscroll Js -->
    <script src="{{ URL::asset('app/js/smoothscroll.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ URL::asset('app/js/main.js') }}"></script>
</body>
</html>