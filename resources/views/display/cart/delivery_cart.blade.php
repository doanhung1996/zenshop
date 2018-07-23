@extends('display.index')
@section('content')
    <div id="content">
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <ul class="row">
                    <!-- Step 1 -->
                    <li class="col-sm-3">
                        <a href="{{route('cart.detail')}}"><div class="media-left"> <i class="flaticon-shopping"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_1')</span>
                            <h6>@lang('display_lang.shopping_cart')</h6>
                        </div>
                        </a>
                    </li>
                    <!-- Step 2-->
                    <li class="col-sm-3 current">
                        <div class="media-left"> <i class="flaticon-delivery-truck"></i> </div>
                        <div class="media-body"> <span>@lang('display_lang.step_2')</span>
                            <h6>@lang('display_lang.delivery_methods')</h6>
                        </div>
                    </li>
                    <!-- Step 3 -->
                    <li class="col-sm-3">
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
            <form action="{{route('cart.delivery.add')}}" method="post">
                @csrf()
            <div class="container">
                <!-- Payout Method -->
                <div class="pay-method">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Your information -->
                            <div class="heading" style="margin-bottom: 25px;">
                                <h2>@lang('display_lang.your_information')</h2>
                                <hr>
                            </div>
                            <form>
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-sm-6">
                                        <label>  @lang('display_lang.name')
                                            <input class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="Họ và Tên">
                                            <span style="color: red;">@php if($errors->has('name'))echo $errors->first('name');@endphp</span>
                                        </label>
                                    </div>

                                    <!-- Number -->
                                    <div class="col-sm-6">
                                        <label> @lang('display_lang.phone')
                                            <input class="form-control" name="phone" value="{{ old('phone') }}" min="0" type="number">
                                            <span style="color: red;">@php if($errors->has('phone'))echo $errors->first('phone');@endphp</span>
                                        </label>
                                    </div>

                                    <!-- Card Number -->
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6" style="margin-top: 20px;">
                                                <label> @lang('display_lang.provincial') </label>
                                                <select onchange="get_city(this)" class="selectpicker" name="provincial">
                                                    <option value="">@lang('display_lang.select_provincial')</option>
                                                    @foreach($provincial as $k_provincial => $v_provincial)
                                                    <option value="{{$v_provincial['name']}}" @if(old('provincial')==$v_provincial['name']) selected @endif>{{$v_provincial['name']}}</option>
                                                    @endforeach
                                                </select>
                                                <span style="color: red;">@php if($errors->has('provincial'))echo $errors->first('provincial');@endphp</span>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 20px;" >
                                                <label> @lang('display_lang.country') </label>
                                                    <select class="selectpicker" name="city" id="cities">
                                                        <option value="">@lang('display_lang.select_city')</option>
                                                    </select>
                                                <span style="color: red;">@php if($errors->has('city'))echo $errors->first('city');@endphp</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<!-- Zip code -->--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--<label> Zip code--}}
                                            {{--<input class="form-control" type="text">--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                    <!-- Address -->
                                    <div class="col-sm-6" style="margin-top: 20px; !important;">
                                        <label> @lang('display_lang.address')
                                            <input class="form-control" name="address"  value="{{ old('address') }}" type="text">
                                            <span style="color: red;">@php if($errors->has('address'))echo $errors->first('address');@endphp</span>
                                        </label>
                                    </div>

                                    <!-- Number -->
                                    <div class="col-sm-6" style="margin-top: 20px; !important;">
                                        <label> @lang('display_lang.email')
                                            <input class="form-control" name="email"  value="{{ old('email') }}" type="email">
                                            <span style="color: red;">@php if($errors->has('email'))echo $errors->first('email');@endphp</span>
                                        </label>
                                    </div>

                                    <div class="col-sm-6"style=" margin-top: 20px; !important;">
                                            <label> @lang('display_lang.select_your_transportation') </label>
                                            <select class="selectpicker" id="delivery_2" name="delivery">
                                                @foreach($delivery as $item_delivery_cart)
                                                <option value="{{$item_delivery_cart->id}}" @if(old('delivery')==$item_delivery_cart->id) selected @endif>{{$item_delivery_cart->title}}</option>
                                                @endforeach
                                            </select>
                                        <span style="color: red;">@php if($errors->has('delivery'))echo $errors->first('delivery');@endphp</span>
                                    </div>
                                    <div class="col-sm-6"style=" margin-top: 20px; !important;">
                                        <label> @lang('display_lang.payment_methods') </label>
                                        <select class="selectpicker" name="pay" id="pay">
                                            <option value="Thanh toán tại nhà" @if(old('pay')=='Thanh toán tại nhà') selected @endif>@lang('display_lang.home_payment')</option>
                                            <option value="Thông qua chuyển khoản" @if(old('pay')=='Thông qua chuyển khoản') selected @endif>@lang('display_lang.payment_card')</option>
                                        </select>
                                        <span style="color: red;">@php if($errors->has('pay'))echo $errors->first('pay');@endphp</span>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Select Your Transportation -->
                        <div class="col-md-6">
                            <div class="heading">
                                <h2>@lang('display_lang.select_your_transportation')</h2>
                                <hr>
                            </div>
                            <div class="transportation">
                                <div class="row">
                                    @foreach($delivery as $i_delivery)
                                        <div class="col-sm-6">
                                            <div class="charges">
                                                <h6>{{$i_delivery->title}}</h6>
                                                <br>
                                                <span>{{$i_delivery->date_info}}</span> |
                                                <span> +@php echo number_format($i_delivery->price,0); @endphp đ</span></div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button -->
                <div class="pro-btn" style="margin-top:15px; !important;"> <a href="{{route('cart.detail')}}" class="btn-round btn-light">@lang('display_lang.shopping_cart')</a> <button class="btn-round" style=" border: 0px; !important;">@lang('display_lang.confirm')</button></div>
            </div>
            </form>
        </section>
        <!-- Clients img -->
        <section class="light-gry-bg clients-img">
            <div class="container">
                <ul>
                    <li><img src="" alt="" ></li>
                    <li><img src="" alt="" ></li>
                    <li><img src="" alt="" ></li>
                    <li><img src="" alt="" ></li>
                    <li><img src="" alt="" ></li>
                </ul>
            </div>
        </section>
    </div>
    <script>
        function get_city(obj) {
            var provincial = $(obj).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('cart.delivery.get_city')}}',
                method: 'POST',
                data: {provincial:provincial},
                processData: true,
                dataType: 'html',
                success: function (data) {
                    if(data){
                        // $('.city').prop('disabled', false);
                        $("#cities")
                            .html(data)
                            .selectpicker('refresh');
                    }else {
                        // $('.city').prop('disabled', true);
                        $("#cities")
                            .html('<option>@lang('display_lang.select_city')</option>')
                            .selectpicker('refresh');
                    }
                },
            });
        }
    </script>
    @endsection