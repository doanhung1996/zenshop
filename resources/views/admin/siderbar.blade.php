<div id="sidebar" class="fl-left">
    <ul id="sidebar-menu">
        <li class="nav-item">
            <a href="{{route('page') }}" title="" class="nav-link nav-toggle">
                <span class="fa fa-map icon"></span>
                <span class="title">Trang</span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('page.create') }}" title="" class="nav-link">Thêm trang</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('page') }}" title="" class="nav-link">Danh sách các trang</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('post') }}" title="" class="nav-link nav-toggle">
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
                    <a href="{{route('post') }}" title="" class="nav-link">Danh sách bài viết</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('post.cat') }}" title="" class="nav-link">Danh mục bài viết</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" title="" class="nav-link nav-toggle">
                <span class="fa fa-product-hunt icon"></span>
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
                <span class="fa fa-database icon"></span>
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
