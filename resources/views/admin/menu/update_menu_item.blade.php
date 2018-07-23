@extends('admin.index')
@section('content')
    <div id="main-content-wp" class="add-cat-page menu-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Menu</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section-detail clearfix">
                    <div id="list-menu" class="fl-left">
                        <form  method="POST" action="{{route('menu.item.update',$menu_item_old['id'])}}">
                            @csrf()
                            <div class="form-group">
                                <label for="title">Tên menu</label>
                                <input type="text" name="title" value="{{old('title') ?? $menu_item_old['title']}}" id="title">
                            </div>
                            <p class='mess_error'></p>
                            <div class="form-group">
                                <label for="url-static">Đường dẫn tĩnh</label>
                                <input type="text" name="static_slug" value="@if($menu_item_old['type']=='static') {{$menu_item_old['slug']}} @endif" id="url-static">
                                <p>Chuỗi đường dẫn tĩnh cho menu</p>
                            </div>
                            <div class="form-group clearfix">
                                <label>Trang</label>
                                <select name="page_slug">
                                    <option value="">-- Chọn --</option>
                                    @foreach($page as $item_page)
                                        <option value="{{$item_page->slug}}" @if(old('page_slug')==$item_page->slug) selected @endif @if($menu_item_old['type']=='page' && $menu_item_old['slug']==$item_page->slug ) selected @endif>{{$item_page->title}}</option>
                                    @endforeach
                                </select>
                                <p>Trang liên kết đến menu</p>
                            </div>
                            <div class="form-group clearfix">
                                <label>Danh mục sản phẩm</label>
                                <select name="product_slug">
                                    <option value="">-- Chọn --</option>
                                    @foreach($product_cat as $item_product)
                                        <option value="{{$item_product->slug}}" @if($menu_item_old['type']=='product' && $menu_item_old['slug']==$item_product->slug ) selected @endif @if(old('product_slug')==$item_product->slug ) selected @endif>{{$item_product->title}}</option>
                                        @if(count($item_product->childs)>0)
                                            @foreach($item_product->childs as $item_childs_product)
                                                <option value="{{$item_childs_product->slug}}" @if($menu_item_old['type']=='product' && $menu_item_old['slug']==$item_childs_product->slug ) selected @endif @if(old('product_slug')==$item_childs_product->slug) selected @endif >-- {{$item_childs_product->title}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                <p>Danh mục sản phẩm liên kết đến menu</p>
                            </div>
                            <div class="form-group clearfix">
                                <label>Danh mục bài viết</label>
                                <select name="post_slug">
                                    <option value="">-- Chọn --</option>
                                    @foreach($post_cat as $item_post_cat)
                                        <option value="{{$item_post_cat->slug}}" @if(old('post_slug')==$item_post_cat->slug) selected @endif  @if($menu_item_old['type']=='post' && $menu_item_old['slug']==$item_post_cat->slug) selected @endif>{{$item_post_cat->title}}</option>
                                        @if(count($item_post_cat->childs)>0)
                                            @foreach($item_post_cat->childs as $item_childs_post_cat)
                                                <option value="{{$item_childs_post_cat->slug}}" @if(old('post_slug')==$item_childs_post_cat->slug) selected @endif  @if($menu_item_old['type']=='post' && $menu_item_old['slug']==$item_childs_post_cat->slug) selected @endif>-- {{$item_childs_post_cat->title}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                <p>Danh mục bài viết liên kết đến menu</p>
                            </div>
                            <div class="form-group clearfix">
                                <label>Loại Menu</label>
                                <select onchange="change_cat(this)" name="menu_type_id">
                                    <option value="">-- Chọn --</option>
                                    @foreach($menu_type as $item_menu_type)
                                        <option value="{{$item_menu_type->id}}" @if(old('menu_type_id')==$item_menu_type->id) selected @endif @if($menu_item_old['menu_type_id']==$item_menu_type->id) selected @endif >{{$item_menu_type->name}}</option>
                                    @endforeach
                                </select>
                                <p>Mục Menu này liên kết đến loại menu nào</p>
                            </div>
                            <div class="form-group clearfix">
                                <label>Danh mục cha</label>
                                <select name="parent_id" id="parent_id">
                                    <option value="0">-- Chọn --</option>
                                    @foreach($menu_parent as $item_menu_parent)
                                        <option value="{{$item_menu_parent->id}}" @if(old('parent_id')==$item_menu_parent->id) selected @endif @if($menu_item_old['parent_id']==$item_menu_parent->id) selected @endif >{{$item_menu_parent->title}}</option>
                                    @endforeach
                                </select>
                                <p>Danh mục sản phẩm liên kết đến menu</p>
                            </div>
                            <div class="form-group">
                                <label for="menu-order">Thứ tự</label>
                                <input type="text" name="order" value="{{old('order') ?? $menu_item_old['order']}}" id="menu-order">
                            </div>
                            <p class='mess_error'></p>
                            <div class="form-group">
                                <button type="submit" name="sm_add" id="btn-save-list">Lưu danh mục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <script>
                        $( document ).ready(function() {
                            toastr.error("{{$error}}");
                        });
                    </script>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        @if(session()->get('success'))
        toastr.success( "{{ session()->get('success') }}",{timeOut: 5000});
        @endif
    </script>
    <script>
        @if(session()->get('fail'))
        toastr.warning( "{{ session()->get('fail') }}",{timeOut:4000});
        @endif
    </script>
    <script>
        function change_cat(obj) {
            var menu_type_id = $(obj).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('menu.item.cat')}}',
                method: 'get',
                data: {menu_type_id:menu_type_id},
                processData: true,
                dataType: 'html',
                success: function (data) {
                    $("#parent_id")
                        .html(data);
                },
            });
        }
    </script>
@endsection('content')