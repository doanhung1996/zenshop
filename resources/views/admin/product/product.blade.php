@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{{route('product.create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            @if(isset($product_count))
                                <li class="all"><a href="">Tìm thấy : <span class="count">{{$product_count}}</span></a> |</li>
                                <li class="all"><a href="{{route('product')}}">Tất cả : <span class="count">{{$product_all}}</span></a> |</li>
                            @else
                                <li class="all"><a href="{{route('product')}}">Tất cả : <span class="count">{{$product_all}}</span></a> |</li>
                                <li class="publish"><a href="{{url('admin/product?status=1')}}">Đã đăng : <span class="count">{{$product_active}}</span></a> |</li>
                                <li class="pending"><a href="{{url('admin/product?status=-1')}}">Chờ xét duyệt : <span class="count">{{$product_pending}}</span></a></li>
                            @endif
                        </ul>
                        <form method="GET" action="{{route('product.search')}}" class="form-s fl-right">
                            <input type="text" name="value" value="{{$value ?? NULL}}" id="s">
                            <input type="submit" name="search" value="search">
                        </form>
                    </div>
                    <form method="Post" action="{{route('product.status')}}" class="form-actions">
                        @csrf
                    <div class="actions">
                            <select name="actions">
                                <option value="1" @if(old('actions')==1) selected @endif>Đăng</option>
                                <option value="-1" @if(old('actions')==-1) selected @endif>Chờ Duyệt</option>
                                <option value="delete" @if(old('actions')=='delete') selected @endif>Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tên Sản Phẩm</span></td>
                                <td><span class="thead-text">Mã Code</span></td>
                                <td><span class="thead-text">Ảnh</span></td>
                                <td><span class="thead-text">Giá Nhập</span></td>
                                <td><span class="thead-text">Giá Bán</span></td>
                                <td><span class="thead-text">Số Lượng</span></td>
                                <td><span class="thead-text">Danh Mục</span></td>
                                <td><span class="thead-text">Danh Mục Gốc</span></td>
                                <td><span class="thead-text">Trạng Thái</span></td>
                                <td><span class="thead-text">Tài Khoản</span></td>
                                <td><span class="thead-text">Thời Gian</span></td>
                            </tr>
                            </thead>
                            @php $count=0; @endphp
                            @foreach($product as $item)
                            @php $count++; @endphp
                                <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item->id}}" class="checkItem"></td>
                                <td><span class="tbody-text"><h3>{{$count}}</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="{{route('product.edit',$item->id)}}" title="{{$item->product_name}}">{{$item->product_name}}</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="{{route('product.edit',$item->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                <td><span class="tbody-text"><h3>{{$item->product_code}}</h3></span>
                                <td>
                                    <div class="tbody-thumb">
                                        <a href="{{asset($item->image)}}" data-lightbox="image"><img src="{{asset($item->image)}}" alt=""></a>
                                    </div>
                                </td>
                                <td><span class="tbody-text" title="@php echo number_format($item->product_purchase); @endphp.đ"><h3>@php echo number_format($item->product_purchase); @endphp.đ</h3></span>
                                <td><span class="tbody-text" title="@php echo number_format($item->price_sale); @endphp.đ"><h3>@php echo number_format($item->price_sale); @endphp.đ</h3></span>
                                <td><span class="tbody-text">{{$item->qty}}</span></td>
                                <td><span class="tbody-text">{{$item->product_cat->title}}</span></td>
                                <td><span class="tbody-text">{{$item->category->title}}</span></td>
                                <td>@if ($item->status == '1')
                                        <span class="tbody-text" style="color:red;">Đã Đăng</span>
                                    @else
                                        <span class="tbody-text" style="color: #0f9a87;">Đang Chờ</span>
                                    @endif
                                </td>
                                <td><span class="tbody-text">{{$item->user->name}}</span></td>
                                <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($item->created_at)); @endphp</span></td>
                            </tr>
                            @endforeach
                            <thead>
                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Tên Sản Phẩm</span></td>
                            <td><span class="thead-text">Mã Code</span></td>
                            <td><span class="thead-text">Ảnh</span></td>
                            <td><span class="thead-text">Giá Nhập</span></td>
                            <td><span class="thead-text">Giá Bán</span></td>
                            <td><span class="thead-text">Số Lượng</span></td>
                            <td><span class="thead-text">Danh Mục</span></td>
                            <td><span class="thead-text">Danh Mục Gốc</span></td>
                            <td><span class="thead-text">Trạng Thái</span></td>
                            <td><span class="thead-text">Tài Khoản</span></td>
                            <td><span class="thead-text">Thời Gian</span></td>
                            </thead>
                            </tbody>
                        </table>
                    </div>
                 </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    {{ $product->links() }}
                </div>
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
    @if(session()->get('success_status'))
    toastr.success( "{{ session()->get('success_status') }}",{timeOut: 5000});
    @endif
</script>
    @endsection('content')