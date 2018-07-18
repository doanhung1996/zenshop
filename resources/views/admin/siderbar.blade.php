<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="{{route('page.list') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-map icon"></span>
                <span class="title">Trang</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('page.create') }}" title="" class="nav-link">Thêm trang</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('page.list') }}" title="" class="nav-link">Danh sách các trang</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('post.index') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-pencil-square-o icon"></span>
                <span class="title">Bài viết</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('post.create') }}" title="" class="nav-link">Thêm bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.cat.create') }}" title="" class="nav-link">Thêm danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.index') }}" title="" class="nav-link">Danh sách bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.cat.index') }}" title="" class="nav-link">Danh mục bài viết</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-shopping-cartwe"></span>
                <span class="title">Sản phẩm</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('product.create') }}" title="" class="nav-link">Thêm sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.cat.create') }}" title="" class="nav-link">Thêm danh mục</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product') }}" title="" class="nav-link">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.cat') }}" title="" class="nav-link">Danh mục sản phẩm</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('order')}}" title="" class="nav-link nav-toggle">
                <span class="fa fa-shopping-basket"></span>
                <span class="title">Bán hàng</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('order')}}" title="" class="nav-link">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customer')}}" title="" class="nav-link">Danh sách khách hàng</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('slider') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-picture-o"></span>
                <span class="title">Slider</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('slider.create') }}" title="" class="nav-link">Thêm slider</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('slider') }}" title="" class="nav-link">Danh sách slider</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('delivery') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-rocket"></span>
                <span class="title">Vận Chuyển</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('delivery.create') }}" title="" class="nav-link">Thêm Vận Chuyển</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('delivery') }}" title="" class="nav-link">Danh sách Vận Chuyển</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('account') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-user circle"></span>
                <span class="title">Quản lý tài khoản</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('account') }}" title="" class="nav-link">Danh sách tài khoản</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('menu.type')}}" title="" class="nav-link nav-toggle">
                <span class="fa fa-cubes icon"></span>
                <span class="title">Khối Menu</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('menu.type')}}" title="" class="nav-link">Loại Menu</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('menu.item')}}" title="" class="nav-link">Mục Menu</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
