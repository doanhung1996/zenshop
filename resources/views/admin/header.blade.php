<div id="site">
    <div id="container">
        <div id="header-wp">
            <div class="wp-inner clearfix">
                <a href="{{route('page.list')}}" title="" id="logo" class="fl-left">Admin</a>
                <ul id="main-menu" class="fl-left" style="margin-left: 100px;">
                    <li>
                        <a href="{{route('page.create')}}" title="">Trang</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('page.create')}}" title="">Thêm trang</a>
                            </li>
                            <li>
                                <a href="{{route('page.list')}}" title="">Danh sách trang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('post.index')}}" title="">Bài viết</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('post.create')}}" title="">Thêm bài viết</a>
                            </li>
                            <li>
                                <a href="{{route('post.cat.create')}}" title="">Thêm danh mục</a>
                            </li>
                            <li>
                                <a href="{{route('post.index')}}" title="">Danh sách bài viết</a>
                            </li>
                            <li>
                                <a href="{{route('post.cat.index')}}" title="">Danh mục bài viết</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('product')}}" title="">Sản phẩm</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('product.create')}}" title="">Thêm Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('product.cat.create')}}" title="">Thêm Danh Mục</a>
                            </li>
                            <li>
                                <a href="{{route('product')}}" title="">Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('product.cat')}}" title="">Danh mục sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('order')}}" title="">Bán hàng</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('order')}}" title="">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{{route('customer')}}" title="">Danh sách khách hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('slider')}}" title="Slider">Slider</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('slider.create')}}" title="Thêm Slider">Thêm Slider</a>
                            </li>
                            <li>
                                <a href="{{route('slider')}}" title="">Danh sách slider</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('delivery')}}" title="Phương thức vận chuyển">Vận Chuyển</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('delivery.create')}}" title="Thêm delivery">Thêm Vận Chuyển</a>
                            </li>
                            <li>
                                <a href="{{route('delivery')}}" title="Phương thức vận chuyển">Danh sách vận chuyển</a>
                            </li>
                        </ul>
                    </li>
                    {{--<li>--}}
{{--                        <a href="{{route('account')}}" title="Slider">Tài Khoản</a>--}}
                        {{--<ul class="sub-menu">--}}
                            <li>
                                <a href="{{route('account')}}" title="">Tài Khoản</a>
                            </li>
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li>
                        <a href="{{route('menu.type')}}" title="">Menu</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('menu.type')}}" title="">Loại Menu</a>
                            </li>
                            <li>
                                <a href="{{route('menu.item')}}" title="">Mục Menu</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div id="dropdown-user" class="dropdown dropdown-extended fl-right">

                    <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <h3 id="account" class="fl-right">Xin Chào : {{ Auth::user()->name }} !</h3>
                        <div id="thumb-circle" style="background: none;" class="fl-left">
                            <img src="@if(isset(Auth::user()->image)) {{asset(Auth::user()->image)}} @else {{asset('admin/public/images/user4.jpg')}} @endif" style="max-width: 46px; max-height: 50%; border-radius:50%; ">
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="" title="Lịch Sử">Lịch Sử</a></li>
                        <li><a href="{{route('account.password')}}" title="Lịch Sử">Thay đổi mật khẩu</a></li>
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
                    </ul>
                </div>
            </div>
        </div>