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

    <!-- Search Box Start Here -->
    <div id="search" class="search-wrap">
        <button type="button" class="close">×</button>
        <form class="search-form">
            <input type="search" id="ooooo" value="" placeholder="Type here........" />
            <button type="submit" class="search-btn"><i class="flaticon-search"></i></button>
        </form>
    </div>
    <!-- Search Box End Here -->
    <!-- Modal Start-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-default-bold mb-none">Login</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="login-form">
                        <input class="main-input-box" type="text" placeholder="User Name" />
                        <input class="main-input-box" type="password" placeholder="Password" />
                        <div class="inline-box mb-5 mt-4">
                            <div class="checkbox checkbox-primary">
                                <input id="modal-checkbox" type="checkbox">
                                <label for="modal-checkbox">Remember Me</label>
                            </div>
                            <label class="lost-password"><a href="#">Lost your password?</a></label>
                        </div>
                        <div class="inline-box mb-5 mt-4">
                            <button class="btn-fill" type="submit" value="Login">Login</button>
                            <a href="#" class="btn-register"><i class="fas fa-user"></i>Register Here!</a>
                        </div>
                    </form>
                    <label>Login connect with your Social Network</label>
                    <div class="login-box-social">
                        <ul>
                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End-->
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