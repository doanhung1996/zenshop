@extends('display.index')
@section('content')
    <!-- Content -->
    <div id="content">
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                {{--<ul class="row">--}}
                    {{--<!-- Step 1 -->--}}
                    {{--<li class="col-sm-3">--}}
                        {{--<div class="media-left"> <i class="flaticon-shopping"></i> </div>--}}
                        {{--<div class="media-body"> <span>@lang('display_lang.step_1')</span>--}}
                            {{--<h6>@lang('display_lang.shopping_cart')</h6>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<!-- Step 2-->--}}
                    {{--<li class="col-sm-3">--}}
                        {{--<div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>--}}
                        {{--<div class="media-body"> <span>@lang('display_lang.step_2')</span>--}}
                            {{--<h6>@lang('display_lang.delivery_methods')</h6>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<!-- Step 3 -->--}}
                    {{--<li class="col-sm-3">--}}
                        {{--<div class="media-left"> <i class="flaticon-business"></i> </div>--}}
                        {{--<div class="media-body"> <span>@lang('display_lang.step_3')</span>--}}
                            {{--<h6>@lang('display_lang.confirmation')</h6>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<!-- Step 4 -->--}}
                    {{--<li class="col-sm-3 current">--}}
                        {{--<div class="media-left"> <i class="fa fa-check"></i> </div>--}}
                        {{--<div class="media-body"> <span>@lang('display_lang.step_4')</span>--}}
                            {{--<h6>@lang('display_lang.success')</h6>--}}
                        {{--</div>--}}
                    {{--</li>--}}

                {{--</ul>--}}
                <hr style="margin-bottom: 0px !important;">
            </div>
        </div>
        <!-- Oder-success -->
        <section>
            <div class="container" style="margin-bottom: 60px !important;">
                <!-- Payout Method -->
                <div class="order-success"> <i class="fa fa-check"></i>
                    <h6>{{ __('display_lang.update_success') }}</h6>
                    <p>{{ __('display_lang.update_info') }}</p>
                    <a href="{{route('home')}}" class="btn-round">@lang('display_lang.return_to_shop')</a> </div>
            </div>
        </section>
        <!-- Clients img -->
        {{--<section class="light-gry-bg clients-img">--}}
        {{--<div class="container">--}}
        {{--<ul>--}}
        {{--<li><img src="images/c-img-1.png" alt="" ></li>--}}
        {{--<li><img src="images/c-img-2.png" alt="" ></li>--}}
        {{--<li><img src="images/c-img-3.png" alt="" ></li>--}}
        {{--<li><img src="images/c-img-4.png" alt="" ></li>--}}
        {{--<li><img src="images/c-img-5.png" alt="" ></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</section>--}}
    </div>
    <!-- End Content -->

@endsection()