@if(count($data_cart)>0)
<div class="container" id="content_cart">
    <table class="table list-table-wp">
        <thead>
        <tr>
            <th>@lang('display_lang.order')</th>
            <th>@lang('display_lang.product_name')</th>
            <th class="text-center">@lang('display_lang.price')</th>
            <th class="text-center">@lang('display_lang.quantity')</th>
            <th class="text-center">@lang('display_lang.total_price')</th>
            <th>@lang('display_lang.action')</th>
        </tr>
        </thead>
        <tbody>
        @php $count=0; @endphp
        @foreach($data_cart as $item_cart)
            @php $count++; @endphp
            <tr>
                <td class="text-center padding-top-60" style="padding-top: 60px !important;">{{$count}}</td>
                <td><div class="media">
                        <div class="media-left"> <a href="#."> <img class="img-responsive" src="{{asset($item_cart->model->image)}}" alt="{{$item_cart->name}}" > </a> </div>
                        <div class="media-body">
                            <p>{{$item_cart->name}}</p>
                        </div>
                    </div>
                </td>
                <td class="text-center padding-top-60" style="padding-top: 30px !important;">@php echo number_format($item_cart->price) @endphp đ</td>
                <td>
                    <div class="quinty padding-top-20 padding-left-40">
                        <input type="number"  product_id="{{$item_cart->id}}" rowId="{{$item_cart->rowId}}" value="{{$item_cart->qty}}" onchange="update(this)" id="qty" name="qty" max="5" min="1">
                    </div>
                </td>
                <td class="text-center padding-top-60" style="padding-top: 30px !important;">@php echo number_format($item_cart->subtotal) @endphp đ</td>
                <td class="text-center padding-top-60" style="padding-top: 30px !important;">
                    {{--<button type="submit"  name="submit" style="background: none; border: none;"><i style="color: #27bdb1 !important;" title="@lang('display_lang.update')" class="fa fa-pencil"></i></button>--}}
                    {{--<a href="{{route('cart.delete',"$item_cart->rowId")}}" title="@lang('display_lang.delete')" class="remove"><i class="fa fa-pencil"></i></a>--}}
                    <a href="javascript:void(0)" title="@lang('display_lang.delete')" class="remove" style="cursor:pointer; margin-left: 5px;"><i class="fa fa-trash" onclick="delete_cart('@php echo $item_cart->rowId @endphp')" ></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- Promotion -->
    <div class="promo">
        <div class="coupen">
            <label> @lang('display_lang.promotion_code')
                <input type="text" placeholder="Nhập Mã">
                <button type="submit"><i class="fa fa-arrow-circle-right"></i></button>
            </label>
        </div>
        <!-- Grand total -->
        <div class="g-totel">
            <h5>@lang('display_lang.grand_total'):<span>{{$total}} đ</span></h5>
        </div>
    </div>
    <!-- Button -->
    <div class="pro-btn">
        <a href="{{route('home')}}" class="btn-round btn-light">@lang('display_lang.continue_shopping')</a>
        <a href="{{route('cart.delivery')}}" class="btn-round">@lang('display_lang.delivery_methods')</a>
    </div>
</div>
    @else
    <div class="pro-btn">
        <h6>@lang('display_lang.cart_no_value')</h6>
        <a href="{{route('home')}}" class="btn-round btn-light">@lang('display_lang.continue_shopping')</a>
    </div>
    @endif