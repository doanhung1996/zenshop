@extends('admin.index')
@section('content')
<div id="main-content-wp" class="add-cat-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_product" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                        @csrf
                        <label for="product-name">Tên sản phẩm (Product Name)</label>
                        <input type="text" name="product_name" value="{{old('product_name')}}" id="product-name">
                        <label for="product-code">Mã sản phẩm (Product Code)</label>
                        <input type="text" name="product_code" value="{{old('product_code')}}" id="product-code">
                        <label for="product_purchase">Giá Nhập (Product Purchase)</label>
                        <input type="number" min="0" name="product_purchase" value="{{old('product_purchase')}}" id="product_purchase">
                        <label for="price">Giá Bán Thực (Price)</label>
                        <input type="number" min="0" name="price" value="{{old('price')}}" id="price">
                        <label for="price">Giảm giá (Product Discount %)</label>
                        <input type="number" min="0" name="product_discount" value="{{old('product_discount')}}" id="price">
                        <label for="qty">Số Lượng (qty)</label>
                        <input type="number" min="0" name="qty" value="{{old('qty')}}" id="qty">
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="description" id="editor" value="{{old('description')}}"></textarea>
                        <label for="desc">Chi tiết</label>
                        <textarea name="detail" id="editor1" value="{{old('description')}}"></textarea>
                        <label>Hình ảnh 1</label>
                        <div id="uploadFile">
                            <img id="blah" src="{{asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                            <input type="file" name="fileUpload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <label>Hình ảnh 2</label>
                        <div id="uploadFile">
                            <img id="bla" src="{{asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                            <input type="file" name="images" onchange="document.getElementById('bla').src = window.URL.createObjectURL(this.files[0])">
                        </div>

                        <label>Hình ảnh 3</label>
                        <div id="uploadFile">
                            <img id="blahh" src="{{asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                            <input type="file" name="images_s" onchange="document.getElementById('blahh').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <label for="link_video">Link Video</label>
                        <input type="text" name="link_video" value="{{old('link_video')}}" id="link_video">
                        <label>Danh mục sản phẩm</label>
                        <select name="product_cat_id">
                        <option value="">-- Chọn danh mục --</option>
                            @foreach($parent_id as $item)
                                <option value="{{$item->id}}" {{old('product_cat_id')==$item->id ? 'selected':""}}>{{$item->title}}</option>
                            @endforeach
                        </select>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="-1" @if(old('status')==-1) selected @endif>Chờ duyệt</option>
                            <option value="1" @if(old('status')==1) selected @endif>Đã đăng</option>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
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
@endsection('content')