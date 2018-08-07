
<div id="site">
    <div id="container">
        <div id="header-wp">
            <div class="wp-inner clearfix">
                <a href="{{route('home')}}" title="ZENZEN Vietnam™" id="logo" class="fl-left" style="font-size: 18px;">ZENZEN Vietnam™</a>
                <ul id="main-menu" class="fl-left" style="margin-left: 10px;">
                    <li>
                        <a href="{{route('page.list')}}" title="Trang">Trang</a>
                    </li>
                    <li>
                        <a href="{{route('post.index')}}" title="Bài viết">Bài viết</a>
                        <ul class="sub-menu">
                            {{--<li>--}}
                                {{--<a href="{{route('post.create')}}" title="">Thêm bài viết</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('post.cat.create')}}" title="">Thêm danh mục</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{route('post.index')}}" title="Danh sách bài viết">Danh sách bài viết</a>
                            </li>
                            <li>
                                <a href="{{route('post.cat.index')}}" title="Danh mục bài viết">Danh mục bài viết</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('product')}}" title="Sản phẩm">Sản phẩm</a>
                        <ul class="sub-menu">
                            {{--<li>--}}
                                {{--<a href="{{route('product.create')}}" title="">Thêm Sản Phẩm</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('product.cat.create')}}" title="">Thêm Danh Mục</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{route('product')}}" title="Danh sách sản phẩm">Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('product.cat')}}" title="Danh mục sản phẩm">Danh mục sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('order')}}" title="Bán hàng">Bán hàng</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('order')}}" title="Danh sách đơn hàng">Danh sách đơn hàng</a>
                            </li>
                            <li>
                                <a href="{{route('customer')}}" title="Danh sách khách hàng">Danh sách khách hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('slider')}}" title="Slider">Slider</a>
                        {{--<ul class="sub-menu">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('slider.create')}}" title="Thêm Slider">Thêm Slider</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('slider')}}" title="">Danh sách slider</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </li>
                    <li>
                        <a href="{{route('delivery')}}" title="Phương thức vận chuyển">Vận Chuyển</a>
                        {{--<ul class="sub-menu">--}}
                            {{--<li>--}}
                                {{--<a href="{{route('delivery.create')}}" title="Thêm delivery">Thêm Vận Chuyển</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="{{route('delivery')}}" title="Phương thức vận chuyển">Danh sách vận chuyển</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </li>
                    {{--<li>--}}
{{--                        <a href="{{route('account')}}" title="Slider">Tài Khoản</a>--}}
                        {{--<ul class="sub-menu">--}}
                            <li>
                                <a href="{{route('account')}}" title="Tài Khoản">Tài Khoản</a>
                            </li>
                            <li>
                                <a href="{{route('email.store.list')}}" title="Email Khách Hàng">Email</a>
                            </li>
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li>
                        <a href="{{route('menu.type')}}" title="Menu">Menu</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{route('menu.type')}}" title="Loại Menu">Loại Menu</a>
                            </li>
                            <li>
                                <a href="{{route('menu.item')}}" title="Mục Menu">Mục Menu</a>
                            </li>
                        </ul>
                    </li>
                    {{--<li>--}}
                        <div id="app" style="display: inline;" title="Thông Báo">
                            <header-notification></header-notification>
                        </div>
                    {{--</li>--}}
                </ul>

                <div id="dropdown-user" class="dropdown dropdown-extended fl-right">

                    <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <h3 id="account" title="Chào {{ Auth::user()->name }}" class="fl-right">Xin Chào : {{ Auth::user()->name }} !</h3>
                        <div id="thumb-circle" style="background: none;" class="fl-left">
                            <img src="@if(isset(Auth::user()->image)) {{asset(Auth::user()->image)}} @else {{asset('admin/public/images/user4.jpg')}} @endif" style="max-width: 46px; max-height: 50%; border-radius:50%; ">
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="" title="Lịch Sử">Lịch Sử</a></li>
                        <li><a href="{{route('account.password')}}" title="Thay đổi mật khẩu">Thay đổi mật khẩu</a></li>
                        <li>
                            <a class="nav-link" title="Đăng Xuất" href="{{ route('logout') }}"
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