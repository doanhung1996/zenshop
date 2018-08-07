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
                        <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <label for="product-name">Tên sản phẩm (Product Name)</label>
                            <input type="text" name="product_name" value="{{$product['product_name']}}" id="product-name">
                            <label for="product-code">Mã sản phẩm (Product Code)</label>
                            <input type="text" name="product_code" value="{{$product['product_code']}}" id="product-code">
                            <label for="price">Giá nhập (Product Purchase)</label>
                            <input type="number" min="0" value="{{$product['product_purchase']}}" name="product_purchase" id="product_purchase">
                            <label for="price">Giá Bán Thực (Price)</label>
                            <input type="number" min="0" value="{{$product['price']}}" name="price" id="price">
                            <label for="price">Giảm giá (Product Discount)</label>
                            <input type="number" min="0" value="{{$product['product_discount']}}" name="product_discount" id="price">
                            <label for="qty">Số Lượng (qty)</label>
                            <input type="number" min="0" value="{{$product['qty']}}" name="qty" id="price">
                            <label for="desc">Mô tả ngắn</label>
                            <textarea name="description" id="editor">{{$product['description']}}</textarea>
                            <label for="desc">Chi tiết</label>
                            <textarea name="detail" id="editor1">{{$product['detail']}}</textarea>
                            <label>Hình ảnh 1</label>
                            <div id="uploadFile" style="cursor: pointer;">
                                <a href="{{asset($product['image']) ?? asset('admin/public/images/img-thumb.png')}}" data-lightbox="image" ><img id="blah" style="cursor: pointer;" src="{{asset($product['image']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" /></a>
                                <input type="file" style="cursor: pointer;" name="fileUpload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label>Hình ảnh 2</label>
                            <div id="uploadFile" style="cursor: pointer;">
                                <a href="{{asset($product['images']) ?? asset('admin/public/images/img-thumb.png')}}" data-lightbox="image"><img id="bla" style="cursor: pointer;" src="{{asset($product['images']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" /></a>
                                <input type="file" style="cursor: pointer;" name="images" onchange="document.getElementById('bla').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label>Hình ảnh 3</label>
                            <div id="uploadFile" style="cursor: pointer;">
                                <a href="{{asset($product['images_s']) ?? asset('admin/public/images/img-thumb.png')}}" data-lightbox="image"><img id="blahh" style="cursor: pointer;" src="{{asset($product['images_s']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" /></a>
                                <input type="file" style="cursor: pointer;" name="images_s" onchange="document.getElementById('blahh').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label for="link_video">Link Video</label>
                            <input type="text" value="{{$product['link_video']}}" name="link_video" id="link_video">
                            <label>Danh mục sản phẩm</label>
                            <select name="product_cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($parent_id as $item)
                                    <option value="{{$item->id}}" {{$item->id == $product['product_cat_id'] ? "selected":""}}>{{$item->title}}</option>
                                @endforeach
                            </select>
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="-1" @if(old('status')=='-1') selected @endif {{$product['status']=='-1' ? 'selected' : ""}}>Chờ duyệt</option>
                                <option value="1" @if(old('status')=='1') selected @endif  {{$product['status']=='1' ? 'selected' : ""}}>Đã đăng</option>
                            </select>
                            <button type="submit" name="btn-submit" id="btn-submit">Cập Nhật</button>
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