@extends('display.index')
@section('content')
    {{--<div class="big-nsv">--}}
        {{--<div class="container">--}}
            {{--<ul class="nav" role="tablist">--}}
                {{--<li><a href="#"><i class="flaticon-computer"></i> TV & Audios </a></li>--}}
                {{--<li><a href="#"><i class="flaticon-smartphone"></i>Smartphones </a></li>--}}
                {{--<li><a href="#"><i class="flaticon-laptop"></i>Desk & Laptop </a></li>--}}
                {{--<li><a href="#"><i class="flaticon-gamepad-1"></i>Game Console </a></li>--}}
                {{--<li><a href="#"><i class="flaticon-computer-1"></i>Watches </a></li>--}}
                {{--<li><a href="#"><i class="flaticon-keyboard"></i>Accessories </a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
<!-- Slid Sec -->
@include('display.home.section.slider')
@include('display.home.section.baner')
<!-- Content -->
<div id="content">

    <!-- HOT DEAL -->

    <!-- Tab Section -->
    <section class="featur-tabs padding-top-60 padding-bottom-30">
        <div class="container">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bars margin-bottom-40" role="tablist">
                <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab" data-toggle="tab">@lang('display_lang.featured')</a></li>
                <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">@lang('display_lang.new_arrivals')</a></li>
                <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">@lang('display_lang.hot_sale')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Featured -->
            @include('display.home.content.featured')
                <!-- Special -->
            @include('display.home.content.new_arrivals')
                <!-- on sale -->
            @include('display.home.content.hot_sale')
            </div>
        </div>
    </section>

    <!-- Clients img -->
    {{--<section class="light-gry-bg clients-img">--}}
        {{--<div class="container">--}}
            {{--<ul>--}}
                {{--<li><img src="{{asset('public/images/c-img-1.png')}}" alt="" ></li>--}}
                {{--<li><img src="{{asset('public/images/c-img-2.png')}}" alt="" ></li>--}}
                {{--<li><img src="{{asset('public/images/c-img-3.png')}}" alt="" ></li>--}}
                {{--<li><img src="{{asset('public/images/c-img-4.png')}}" alt="" ></li>--}}
                {{--<li><img src="{{asset('public/images/c-img-5.png')}}" alt="" ></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</section>--}}

    <!-- Weekly Featured -->
    @include('display.home.content.top_ten')
    @include('display.home.content.post')


<!-- Top Selling Week -->

</div>

<!-- End Content -->
@endsection('content')
