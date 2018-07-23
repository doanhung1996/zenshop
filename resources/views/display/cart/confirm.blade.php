@extends('display.index')
@section('content')
    <div id="content">
        <!-- Ship Process -->
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <ul class="row">
                    <!-- Step 1 -->
                    <li class="col-sm-3">
                        <a href="{{route('cart.detail')}}">
                        <div class="media-left"> <i class="flaticon-shopping"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_1')</span>
                            <h6>@lang('display_lang.shopping_cart')</h6>
                        </div>
                        </a>
                    </li>
                    <!-- Step 2-->
                    <li class="col-sm-3">
                        <a href="{{route('cart.delivery')}}">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_2')</span>
                            <h6>@lang('display_lang.delivery_methods')</h6>
                        </div>
                        </a>
                    </li>
                    <!-- Step 3 -->
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-business"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_3')</span>
                            <h6>@lang('display_lang.confirmation')</h6>
                        </div>
                    </li>
                    <!-- Step 4 -->
                    <li class="col-sm-3">
                        <div class="media-left"> <i class="fa fa-check"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_4')</span>
                            <h6>@lang('display_lang.success')</h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Payout Method -->
        <section class="padding-bottom-60">
            <form action="{{route('cart.confirm_success')}}" method="POST">
                @csrf()
            <div class="container">
                <!-- Payout Method -->
                <div class="pay-method check-out">

                    <!-- Shopping Cart -->
                    <div class="heading">
                        <h2>Shopping Cart</h2>
                        <hr>
                    </div>
                    <ul class="row check-item" style="padding-bottom: 0px; margin-bottom: 20px;">
                        <li class="col-xs-4">
                            <p>Sản Phẩm</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>Ảnh</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>Giá</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>Số Lượng</p>
                        </li>
                        <li class="col-xs-2 text-center">
                            <p>Tổng</p>
                        </li>
                    </ul>
                @foreach($cart as $item_cart)
                    <!-- Check Item List -->
                        <ul class="row check-item" style="padding-bottom: 0px; margin-bottom: 15px;">
                            <li class="col-xs-4">
                                <p>{{$item_cart->name}}</p>
                            </li>
                            <li class="col-xs-2 text-center">
                            <p><a href="{{asset($item_cart->model->image)}}" data-lightbox="image"><img class="img-responsive" style="max-height: 96px;" src="{{asset($item_cart->model->image)}}" alt="" ></a></p>
                            </li>
                            <li class="col-xs-2 text-center">
                                <p>@php echo number_format($item_cart->price)@endphp .đ</p>
                            </li>
                            <li class="col-xs-2 text-center">
                                <p>{{$item_cart->qty}}</p>
                            </li>
                            <li class="col-xs-2 text-center">
                                <p>@php echo number_format($item_cart->subtotal)@endphp .đ</p>
                            </li>
                        </ul>
                @endforeach
                    <!-- Check Item List -->
                   <p>@lang('display_lang.total_quantity') : {{$qty}}</p>
                   <p>@lang('display_lang.grand_total') : {{$total}} .đ</p>

                    <!-- Payment information -->
                    <div class="heading margin-top-50">
                        <h2>@lang('display_lang.payment_methods')</h2>
                        <hr>
                    </div>

                    <!-- Check Item List -->
                    <ul class="row check-item">
                        {{--<li class="col-xs-6">--}}
                            {{--<p><img class="margin-right-20" src="images/visa-card.jpg" alt=""> @lang('display_lang.payment_methods')</p>--}}
                        {{--</li>--}}
                        <li class="col-xs-6">
                            <p>{{$data_delivery['pay']}}</p>
                        </li>

                    </ul>

                    <!-- Delivery infomation -->
                    <div class="heading margin-top-50">
                        <h2>@lang('display_lang.delivery_infomation')</h2>
                        <hr>
                    </div>

                    <!-- Information -->
                    <ul class="row check-item infoma">
                        <li class="col-sm-3">
                            <h6>Họ Tên</h6>
                            <span>@if(isset($data_delivery)){{$data_delivery['name']}}@endif</span> </li>
                        <li class="col-sm-3">
                            <h6>Số Điện Thoại</h6>
                            <span>@if(isset($data_delivery)){{$data_delivery['phone']}}@endif</span> </li>
                        <li class="col-sm-3">
                            <h6>Địa Chỉ</h6>
                            <span>@if(isset($data_delivery)){{$data_delivery['address']}},{{$data_delivery['city']}}, Tỉnh {{$data_delivery['provincial']}}@endif</span></span> </li>
                        <li class="col-sm-3">
                            <h6>Email</h6>
                            <span>@if(isset($data_delivery)){{$data_delivery['email']}}@endif</span> </li>
                    </ul>

                    <!-- Information -->
                    <ul class="row check-item infoma exp">
                        @if(isset($delivery))
                            <li class="col-sm-3"> <span>@lang('display_lang.select_your_transportation')</span> </li>
                            <li class="col-sm-6"> <span>{{$delivery['title']}} : {{$delivery['date_info']}} (+ @php echo number_format($delivery['price'],0) @endphp đ )</span> </li>
                        @endif
                    </ul>

                    <!-- Totel Price -->
                    <div class="totel-price">
                        <h6><strong> @lang('display_lang.total_cost') : </strong>{{$total_all}} .đ</h6>
                    </div>
                </div>
                @if(isset($data_delivery))
                <input type="hidden" value="{{$data_delivery['name']}}" name="name">
                <input type="hidden" value="{{$data_delivery['phone']}}" name="phone">
                <input type="hidden" value="{{$data_delivery['provincial']}}" name="province">
                <input type="hidden" value="{{$data_delivery['city']}}" name="city">
                <input type="hidden" value="{{$data_delivery['address']}}" name="address">
                <input type="hidden" value="{{$data_delivery['email']}}" name="email">
                <input type="hidden" value="{{$data_delivery['pay']}}" name="pay">
                <input type="hidden" value="{{$data_delivery['delivery']}}" name="delivery">
                @endif
                <!-- Button -->
                <div class="pro-btn"> <a href="{{route('cart.delivery')}}" class="btn-round btn-light">@lang('display_lang.confirm')</a> <button class="btn-round" style=" border: 0px; !important;">@lang('display_lang.confirm')</button> </div>
            </div>
            </form>
        </section>

        <!-- Clients img -->
        <section class="light-gry-bg clients-img">
            <div class="container">
                {{--<ul>--}}
                    {{--<li><img src="images/c-img-1.png" alt="" ></li>--}}
                    {{--<li><img src="images/c-img-2.png" alt="" ></li>--}}
                    {{--<li><img src="images/c-img-3.png" alt="" ></li>--}}
                    {{--<li><img src="images/c-img-4.png" alt="" ></li>--}}
                    {{--<li><img src="images/c-img-5.png" alt="" ></li>--}}
                {{--</ul>--}}
            </div>
        </section>

    </div>
    <!-- End Content -->

@endsection()