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
                            <a style="text-transform: uppercase;">
                                Tài Khoản: {{ Auth::user()->name }} !
                            </a>
                        </li>
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
                <ul class="nav navbar-right cart-pop">
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="itm-cont">3</span> <i class="flaticon-shopping-bag"></i> <strong>My Cart</strong> <br>
                            <span>3 item(s) - $500.00</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="media-left"> <a href="#." class="thumb"> <img src="{{asset('public/images/item-img-1-1.jpg')}}" class="img-responsive" alt="" > </a> </div>
                                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a> <span>250 x 1</span> </div>
                            </li>
                            <li>
                                <div class="media-left"> <a href="#." class="thumb"> <img src="{{asset('public/images/item-img-1-2.jpg')}}" class="img-responsive" alt="" > </a> </div>
                                <div class="media-body"> <a href="#." class="tittle">Funda Para Ebook 7" full HD</a> <span>250 x 1</span> </div>
                            </li>
                            <li class="btn-cart"> <a href="#." class="btn-round">View Cart</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Nav -->
        <nav class="navbar ownmenu">
            <div class="container">
                <!-- Categories -->
                <div class="cate-lst"> <a style="font-weight: normal;"  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Danh Mục Sản Phẩm </a>
                    <div class="cate-bar-in">
                        <div id="cater" class="collapse">
                            <ul>
                                <li><a href="#"> Camera, Photo & Video</a></li>
                                <li class="sub-menu"><a href="#"> Cell Phones & Accessories</a>
                                    <ul>
                                        <li><a href="#"> TV & Video</a></li>
                                    </ul>
                                </li>
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
                                        <ul>
                                            <li><a href="#."> Cell Phones & Accessories </a></li>
                                            <li><a href="#."> Carrier Phones </a></li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6>Electronics</h6>
                                            <ul>
                                                <li><a href="#."> Cell Phones & Accessories </a></li>
                                                <li><a href="#."> Carrier Phones </a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <h6>Computers</h6>
                                            <ul>
                                                <li><a href="#."> Computers & Tablets</a></li>
                                                <li><a href="#."> Monitors</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-2">
                                            <h6>Home Appliances</h6>
                                            <ul>
                                                <li><a href="#."> Refrigerators</a></li>
                                                <li><a href="#."> Wall Ovens</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4"> <img class=" nav-img" src="{{asset('public/images/navi-img.png')}}" alt="" > </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li> <a href="{{route('home')}}">Xu Hướng</a></li>
                        <li> <a href="{{route('home')}}">Bán Chạy</a></li>
                        <li> <a href="{{route('home')}}">Khuyến Mại</a></li>
                        <li class="dropdown"> <a href="blog.html" class="dropdown-toggle" data-toggle="dropdown">Đời Sống</a>
                            <ul class="dropdown-menu multi-level animated-2s fadeInUpHalf">
                                <li class="dropdown-submenu"><a>Phong Cách Sống</a>
                                    <ul class="dropdown-menu animated-2s fadeInRight">
                                        <li><a href="{{route('post.display',['phong-cach-song','tinh-yeu'])}}">Tình Yêu</a></li>
                                    </ul>
                                </li>
                                <li><a href="Blog_details.html"> Thời Trang </a></li>
                                <li><a href="Blog_details.html"> Giới Trẻ </a></li>
                                <li><a href="Blog_details.html"> Tâm Linh </a></li>
                                <li><a href="Blog_details.html"> Tử Vi </a></li>
                            </ul>



                        </li>
                        <li><a href="{{route('page','ve-chung-toi')}}">Về Chúng Tôi </a></li>
                    </ul>
                </div>
                <!-- NAV RIGHT -->
                <div class="nav-right"> </div>
            </div>
        </nav>
        <!-- Nav Header -->

    </header>
    <!-- Nav    Header -->
