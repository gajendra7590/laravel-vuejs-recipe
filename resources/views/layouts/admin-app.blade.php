<!DOCTYPE html>
<html>
<head> 
    <title>Recipe Admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Recipe Portal" />
    <meta name="keywords" content="Recipe Portal" />
    <meta name="MobileOptimized" content="320" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/favicon.ico') }}" />
    <link rel="icon" href="{{ URL::asset('images/fav_icn.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/jqvmap/jqvmap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/dist/css/adminlte.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/daterangepicker/daterangepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/html/plugins/summernote/summernote-bs4.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/vue_dt.css') }}"> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<noscript>
    <strong></strong>
</noscript>
<div class="wrapper">
    <div id="app"></div>
    @yield('content')
</div>
<!-- ./wrapper -->
<script type="text/javascript" src="{{ URL::asset('js/app-admin.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/daterangepicker/daterangepicker.js') }}"></script> 
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/html/dist/js/adminlte.js') }}"></script> 
</body>

</html>