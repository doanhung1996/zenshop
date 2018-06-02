<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Hùng" />
    <!-- Document Title -->
    <title>Shop Bán Hàng</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/images/download.png')}}" />
    <link rel="icon" href="{{asset('public/images/favicon.ico')}}" type="image/x-icon">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/rs-plugin/css/settings.css')}}" media="screen" />

    <!-- StyleSheets -->
    <link rel="stylesheet" href="{{asset('public/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/rs-plugin/css/test.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('public/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Fonts Online -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100i,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=vietnamese" rel="stylesheet">
    <!-- JavaScripts -->
    <script src="{{asset('public/rs-plugin/js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('public/js/vendors/modernizr.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <script src="{{asset('public/rs-plugin/js/html5shiv.min.js')}}"></script>
    <!--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <script src="{{asset('public/rs-plugin/js/respond.min.js')}}"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <script src="{{asset('public/js/toastr.min.js')}}"></script>
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<script>
    // $( document ).ready(function() {
    //     $( document ).ready(function() {
    //         toastr.warning('Chào mày đã dến trang web của chúng tao !', 'Hùng Says');
    //     });
    // });
</script>
<div id="voyager-loader">
    <img src="{{asset('public/images/logo-icon.png')}}" alt="">
</div>
@include('display.header')
@yield('content')
@include('display.footer')
<script>
    $(window).on('load', function() {
        $("#voyager-loader").fadeOut();
        $('body').removeClass('preloader-site');
    });
    $(document).ready(function($) {
        var Body = $('#voyager-loader');
        Body.addClass('preloader-site');
    });
</script>
