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
                        <form method="POST" action="{{route('product.update',$product['0']->id)}}" enctype="multipart/form-data">
                            @csrf
                            <label for="product-name">Tên sản phẩm (Product Name)</label>
                            <input type="text" name="product_name" value="{{$product['0']['product_name']}}" id="product-name">
                            <label for="product-code">Mã sản phẩm (Product Code)</label>
                            <input type="text" name="product_code" value="{{$product['0']['product_code']}}" id="product-code">
                            <label for="price">Giá sản phẩm</label>
                            <input type="text" value="{{$product['0']['price']}}" name="price" id="price">
                            <label for="price">Giảm giá</label>
                            <input type="text" value="{{$product['0']['product_discount']}}" name="product_discount" id="price">
                            <label for="desc">Mô tả ngắn</label>
                            <textarea name="description" id="editor">{{$product['0']['description']}}</textarea>
                            <label for="desc">Chi tiết</label>
                            <textarea name="detail" id="editor1">{{$product['0']['detail']}}</textarea>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <img id="blah" src="{{asset($product['0']['image']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                                <input type="file" name="fileUpload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label>Danh mục sản phẩm</label>
                            <select name="product_cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($parent_id as $item)
                                    <option value="{{$item->parent_id}}" {{$item->parent_id == $product['0']->product_cat_id ? "selected":""}}>{{$item->title}}</option>
                                @endforeach

                            </select>
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="-1">Chờ duyệt</option>
                                <option value="1">Đã đăng</option>
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
        @if(session()->get('success_update'))
        toastr.success( "{{ session()->get('success_update') }}",{timeOut: 5000});
        @endif
    </script>
@endsection('content')