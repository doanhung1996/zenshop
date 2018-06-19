<div id="site">
    <div id="container">
        <div id="header-wp">
            <div class="wp-inner clearfix">
                <a href="{{route('page.list')}}" title="" id="logo" class="fl-left">Admin</a>
                <ul id="main-menu" class="fl-left"style="margin-left: 300px;">
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
                        <div id="thumb-circle" class="fl-left">
                            <img src="{{asset('admin/public/images/user4.jpg')}}" style="width: 46px; height: 50%;">
                        </div>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="" title="Lịch Sử">Lịch Sử</a></li>
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