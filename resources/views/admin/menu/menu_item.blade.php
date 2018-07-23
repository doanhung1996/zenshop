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
                    <form  method="POST" action="{{route('menu.item.store')}}">
                        @csrf()
                        <div class="form-group">
                            <label for="title">Tên menu</label>
                            <input type="text" name="title" value="{{old('title')}}" id="title">
                        </div>
                        <p class='mess_error'></p>
                        <div class="form-group">
                            <label for="url-static">Đường dẫn tĩnh</label>
                            <input type="text" name="static_slug" value="{{old('static_slug')}}" id="url-static">
                            <p>Chuỗi đường dẫn tĩnh cho menu</p>
                        </div>
                        <div class="form-group clearfix">
                            <label>Trang</label>
                            <select name="page_slug">
                                <option value="">-- Chọn --</option>
                                @foreach($page as $item_page)
                                    <option value="{{$item_page->slug}}" @if(old('page_slug')==$item_page->slug) selected @endif>{{$item_page->title}}</option>
                                @endforeach
                            </select>
                            <p>Trang liên kết đến menu</p>
                        </div>
                        <div class="form-group clearfix">
                            <label>Danh mục sản phẩm</label>
                            <select name="product_slug">
                                <option value="">-- Chọn --</option>
                                @foreach($product_cat as $item_product)
                                <option value="{{$item_product->slug}}">{{$item_product->title}}</option>
                                    @if(count($item_product->childs)>0)
                                        @foreach($item_product->childs as $item_childs_product)
                                            <option value="{{$item_childs_product->slug}}" @if(old('product_slug')==$item_childs_product->slug) selected @endif>-- {{$item_childs_product->title}}</option>
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
                                    <option value="{{$item_post_cat->slug}}">{{$item_post_cat->title}}</option>
                                    @if(count($item_post_cat->childs)>0)
                                        @foreach($item_post_cat->childs as $item_childs_post_cat)
                                            <option value="{{$item_childs_post_cat->slug}}" @if(old('post_slug')==$item_childs_post_cat->slug) selected @endif>-- {{$item_childs_post_cat->title}}</option>
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
                                <option value="{{$item_menu_type->id}}" @if(old('menu_type_id')==$item_menu_type->id) selected @endif>{{$item_menu_type->name}}</option>
                                @endforeach
                            </select>
                            <p>Mục Menu này liên kết đến loại menu nào</p>
                        </div>
                        <div class="form-group clearfix">
                            <label>Danh mục cha</label>
                            <select id="parent_id" name="parent_id">
                                <option value="0">-- Chọn --</option>
                            </select>
                            <p>Danh mục sản phẩm liên kết đến menu</p>
                        </div>
                        <div class="form-group">
                            <label for="menu-order">Thứ tự</label>
                            <input type="text" name="order" value="{{old('order')}}" id="menu-order">
                        </div>
                        <p class='mess_error'></p>
                        <div class="form-group">
                            <button type="submit" name="sm_add" id="btn-save-list">Lưu danh mục</button>
                        </div>
                    </form>
                </div>
                <form action="{{route('menu.item.status')}}" method="POST">
                    @csrf()
                <div id="category-menu" class="fl-right">
                    <div class="actions">
                        <select name="status">
                            <option value="">Tác vụ</option>
                            <option value="delete">Xóa</option>
                        </select>
                        <button type="submit" name="sm_block_status" id="sm-block-status">Áp dụng</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tên menu</span></td>
                                <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                <td style="text-align: center;"><span class="thead-text">Loại</span></td>
                                <td style="text-align: center;"><span class="thead-text">Tài Khoản</span></td>
                                <td style="text-align: center;"><span class="thead-text">Loại Menu</span></td>
                                <td style="text-align: center;"><span class="thead-text">Thứ Tự</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count =0; @endphp
                            @foreach($menu_item as $item_menu_item)
                                @php $count++; @endphp
                                <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item_menu_item->id}}" class="checkItem" value="1"></td>
                                <td><span class="tbody-text">{{$count}}</span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="{{route('menu.item.edit',$item_menu_item->id)}}" title="">{{str_repeat('--- ',$item_menu_item->level).$item_menu_item->title}}</a>
                                    </div>
                                    <ul class="list-operation fl-right">
                                        <li><a href="{{route('menu.item.edit',$item_menu_item->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                                <td style="text-align: center;"><span class="tbody-text">{{$item_menu_item->slug}}</span></td>
                                <td style="text-align: center;"><span class="tbody-text">{{$item_menu_item->type}}</span></td>
                                <td style="text-align: center;"><span class="tbody-text">{{$item_menu_item->user->name}}</span></td>
                                <td style="text-align: center;"><span class="tbody-text">{{$item_menu_item->menu_type->name}}</span></td>
                                <td style="text-align: center;"><span class="tbody-text">{{$item_menu_item->order}}</span></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tên menu</span></td>
                                <td style="text-align: center;"><span class="thead-text">Slug</span></td>
                                <td style="text-align: center;"><span class="thead-text">Loại</span></td>
                                <td style="text-align: center;"><span class="thead-text">Tài Khoản</span></td>
                                <td style="text-align: center;"><span class="thead-text">Loại Menu</span></td>
                                <td style="text-align: center;"><span class="thead-text">Thứ tự</span></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                </form>
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