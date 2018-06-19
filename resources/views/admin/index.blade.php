<!DOCTYPE html>
<html>
<head>
    <title>Shop Bán Hàng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('admin/public/images/download.png')}}" />
    <link href="{{asset('admin/public/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/reset.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/responsive.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin/public/test.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('public/css/toastr.min.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset('admin/public/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/public/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/public/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/public/js/jquery-3.3.1.js')}}"></script>
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>
    <script src="{{asset('public/js/toastr.min.js')}}"></script>
    @yield('extra-css')
</head>
<body class=" ">
<div id="voyager-loader">
    <img src="{{asset('admin/public/images/logo-icon.png')}}" alt="">
</div>
@include('admin.header')
@yield('content')
@include('admin.footer')
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}">

</script>
<script> CKEDITOR.replace('editor',{
        filebrowserBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    });
</script>
<script> CKEDITOR.replace('editor1',{
        filebrowserBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('plugins/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    });
</script>
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

