<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Đoàn Văn Hùng" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Document Title -->
    <title>ZENZEN Vietnam™ - Mua Hàng Trực Tuyến Giá Tốt</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/images/logozen1.png')}}" />
    <link rel="icon" href="{{asset('public/images/favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/rs-plugin/css/settings.css')}}" media="screen" />

    <!-- StyleSheets -->
    <link rel="stylesheet" href="{{asset('public/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/rs-plugin/css/test.css')}}"  type="text/css"/>
    <link rel="stylesheet" href="{{asset('public/css/toastr.min.css')}}"  type="text/css"/>

    <link rel="stylesheet" href="{{asset('public/fancybox/fb/jquery.fancybox.css')}}"  type="text/css"/>
    <link rel="stylesheet" href="{{asset('public/fancybox/fb/jquery.fancybox-buttons.css')}}"  type="text/css"/>
    <link rel="stylesheet" href="{{asset('public/fancybox/fb/jquery.fancybox-thumbs.css')}}"  type="text/css"/>

    <link href="{{asset('public/lightbox-css/lightbox.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('public/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Fonts Online -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100i,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;subset=vietnamese" rel="stylesheet">
    <!-- JavaScripts -->
    <script src="{{asset('public/rs-plugin/js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('public/lightbox-js/lightbox.js')}}"></script>
    <script src="{{asset('public/js/vendors/modernizr.js')}}"></script>
    <!-- SELECT2 -->
    <script src="{{asset('public/select2/select2.min.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <script src="{{asset('public/rs-plugin/js/html5shiv.min.js')}}"></script>
    <!--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <script src="{{asset('public/js/toastr.min.js')}}"></script>
    <!-- Optionally add helpers - button, thumbnail and/or media -->
    {{--<link rel="stylesheet" href="{{asset('public/fancybox-css/jquery.fancybox.min.css')}}" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="{{asset('public/fancybox-css/fancybox-thumbs.css')}}" type="text/css" media="screen" />--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.css" />--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.js"></script>--}}
    {{--<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>--}}
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>
<body>
{{--<script>--}}
    {{--$( document ).ready(function() {--}}
        {{--$( document ).ready(function() {--}}
            {{--toastr.warning('Chào mừng đã dến trang web!', 'Hùng Says');--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
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
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=476258462814364&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    document.addEventListener('touchmove', function (event) {
        event.preventDefault();
    }, {
        passive: false
    });
</script>
<script>
    function addtocart(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('cart.add')}}",//TRANG XỬ LÝ .MẶC ĐỊNH LÀ TRANG HIỆN TẠI
            method: 'get', //Post hoặc Get , Mặc định GET
            data: {id: id},//DỮ LIỆU KIỂU ĐỐI TƯỢNG TRONG Javascript
            // processData: true,//Giá Trị TRUE or FALSE . Mặc Định TRUE
            dataType: 'html',//HTML,TEXT,SCRIPT HOẶC JSON,
            success: function (data) {
                if(data == ''){
                    toastr.error('Số lượng hàng đã hết');
                }else {
                    $('#home-cart').html(data);
                    toastr.success('Thêm Thành Công');
                }
            },
        });
    }
</script>

