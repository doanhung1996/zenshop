{{--{{dd($header_home)}}--}}
<!-- Page Wrapper -->
<div id="wrap" class="layout-4 red">

    <!-- Top bar -->
    <div class="top-bar">
        <div class="container">
            <ul class="pull-left right-sec">
                <li><a href="https://www.facebook.com/zenzen1996">{{ __('Blog') }}</a></li>
                <li><a href="{{route('home')}}">{{ __('Trang Chủ') }}</a></li>
            </ul>

            <div class="right-sec">
                <ul style="margin-right: 10px;">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login.account') }}">{{ __('Đăng Nhập') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a></li>
                    @else
                        <li class="nav-link ">
                            <a style="text-transform: none;">
                                Chào {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li><a href="{{route('information.account')}}">@lang('display_lang.account_update')</a></li>
                    <li>
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Đăng Xuất') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endguest
                    <li><a href="https://www.facebook.com/zenzen9696/">Địa Chỉ Cửa Hàng </a></li>
                    <li><a href="https://www.facebook.com/zenzen9696/">Tin Hot </a></li>
                </ul>
                <div class="social-top">
                    <a href="https://www.facebook.com/zenzen1996">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCCIDojzAKozmsk0h9aoh0QQ?disable_polymer=true">
                        <i class="fa fa-youtube"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <a href="https://www.facebook.com/zenzen1996">
                        <i class="fa fa-address-book"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header class="header-style-4">
        <div class="container">
            <div class="logo"> <a href="{{route('home')}}"><img src="{{asset('public/images/logo.png')}}" alt="Trang Chủ" ></a> </div>
            <div class="go-right">
                <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hotline:</strong><br>096.126.5896</span>
                <!-- search -->
                <div class="search-cate">
                    <select class="selectpicker">
                        <option> Danh Mục Sản Phẩm</option>
                        <option> Home Audio & Theater</option>
                    </select>
                    <input type="search" placeholder="Search here...">
                    <button class="submit" type="submit"><i class="icon-magnifier"></i></button>
                </div>
                <!-- Cart Part -->
                <ul class="nav navbar-right cart-pop" id="home-cart">
                    @if(Cart::count() == 0)
                    <li class="dropdown"> <a href="{{route('cart.detail')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">0</span> <i class="flaticon-shopping-bag"></i> <strong>@lang('display_lang.my_cart')</strong> <br>
                            <span>0 item(s) - 0 đ</span></a>
                    </li>
                        @else
                        <li class="dropdown"> <a href="{{route('cart.detail')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">{{ $data_cart_count }}</span> <i class="flaticon-shopping-bag"></i> <strong>@lang('display_lang.my_cart')</strong> <br>
                                <span>{{ $qty }} item(s) - {{$total}} đ</span></a>
                            <ul class="dropdown-menu">
                                {{--{{dd(data_cart)}}--}}
                                @if(count($data_cart) > 0)
                                    @foreach($data_cart as $item)
                                        <li>
                                            <div class="media-left"> <a href="{{route('cart.detail')}}" class="thumb"> <img src="{{asset($item->model->image)}}" class="img-responsive" alt="{{$item->name}}" > </a> </div>
                                            <div class="media-body"> <a href="{{route('cart.detail')}}" class="tittle">{{$item->name}}</a> <span>@php echo number_format($item->price); @endphp đ</span> </div>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="btn-cart"> <a href="{{route('cart.detail')}}" class="btn-round">@lang('display_lang.view_cart')</a> </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Nav -->
        {{--@php--}}
                {{--echo '<pre>';--}}
                {{--print_r($header_home);--}}
                {{--@endphp--}}
        <nav class="navbar ownmenu">
            <div class="container">
                <!-- Categories -->
                <div class="cate-lst"> <a style="font-weight: normal;"  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Danh Mục Sản Phẩm </a>
                    <div class="cate-bar-in">
                        <div id="cater" class="collapse">
                            <ul>
                            @foreach($category_product_header as $item_category_product_header)
                                    <li class="sub-menu"><a href="{{route('product.category',$item_category_product_header->slug)}}"> {{$item_category_product_header->title}}</a>
                                        <ul>
                                            @if(count($item_category_product_header->childs)>0)
                                                @foreach($item_category_product_header->childs as $item_category_product_header_childs)
                                                    <li><a href="{{route('product.display',[$item_category_product_header->slug,$item_category_product_header_childs->slug])}}"> {{$item_category_product_header_childs->title}}</a></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
                </div>
                <!-- NAV -->
                <div class="collapse navbar-collapse" id="nav-open-btn" style="margin-left: 33px;">
                    <ul class="nav">
                        <li> <a href="{{route('home')}}">Trang Chủ</a></li>
                        <!-- Mega Menu Nav -->
                        <li class="dropdown megamenu"> <a href="index-2.html" class="dropdown-toggle" data-toggle="dropdown">Sản Phẩm </a>
                            <div class="dropdown-menu animated-2s fadeInUpHalf">
                                <div class="mega-inside">
                                    <div class="top-lins">
                                        @foreach($category_product_header as $item2_category_product_header)
                                        <ul>
                                            <li><a href="{{route('product.category',$item2_category_product_header->slug)}}"> {{$item2_category_product_header->title}} </a></li>
                                        </ul>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        @foreach($category_product_header as $item3_category_product_header)
                                        <div class="col-sm-3">
                                            <h6>{{$item3_category_product_header->title}}</h6>
                                            @if(count($item3_category_product_header->childs)>0)
                                                @foreach($item3_category_product_header->childs as $item3_category_product_header_childs)
                                            <ul>
                                                <li><a href="{{route('product.display',[$item3_category_product_header->slug,$item3_category_product_header_childs->slug])}}"> {{$item3_category_product_header_childs->title}} </a></li>
                                            </ul>
                                                @endforeach
                                                @endif
                                        </div>
                                        @endforeach
                                        <div class="col-sm-4"> <img class=" nav-img" src="{{asset('public/images/navi-img.png')}}" alt="" > </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="dropdown"> <a  class="dropdown-toggle" data-toggle="dropdown">Đời Sống</a>
                            <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                                @foreach($category_post_header as $item_category_post_header)
                                <li class="dropdown-submenu"><a>{{$item_category_post_header->title}}</a>
                                    @if(count($item_category_post_header->childs)>0)
                                    <ul class="dropdown-menu animated-2s fadeInRight">
                                        @foreach($item_category_post_header->childs as $item_category_post_header_childs)
                                        <li><a href="{{route('post.display',[$item_category_post_header->slug,$item_category_post_header_childs->slug])}}">{{$item_category_post_header_childs->title}}</a></li>
                                        @endforeach
                                    </ul>
                                        @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @foreach($category_page_header as $item_category_page_header)
                            <li> <a href="{{route('page',$item_category_page_header->slug)}}">{{$item_category_page_header->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- NAV RIGHT -->
                <div class="nav-right"> </div>
            </div>
        </nav>
        <!-- Nav Header -->

    </header>
    <!-- Nav    Header -->
