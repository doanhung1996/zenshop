    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">{{ $data_cart_count }}</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
            <span>{{ $qty }} item(s) - {{ $total}} đ</span></a>
        <ul class="dropdown-menu">
            @if(count($data_cart) > 0)
                @foreach($data_cart as $item)
            <li>
                <div class="media-left"> <a href="{{route('cart.detail')}}" class="thumb"> <img src="{{asset($item->model->image)}}" class="img-responsive" alt="" > </a> </div>
                <div class="media-body"> <a href="{{route('cart.detail')}}" class="tittle">{{$item->name}}</a> <span>@php echo number_format($item->price) @endphp đ</span> </div>
            </li>
                @endforeach
            @endif
            <li class="btn-cart"> <a href="{{route('cart.detail')}}" class="btn-round">@lang('display_lang.view_cart')</a> </li>
        </ul>
    </li>
