@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                            <li class="all"><a href="">Tất cả : <span class="count">{{$product_all}}</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng : <span class="count">{{$product_active}}</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt : <span class="count">{{$product_pending}}</span></a></li>
                        </ul>
                        <form method="GET" action="{{route('product.search')}}" class="form-s fl-right">
                            @csrf
                            <input type="text" name="value" id="s">
                            <input type="submit" name="search" value="search">
                        </form>
                    </div>
                    <form method="Post" action="{{route('product.status')}}" class="form-actions">
                        @csrf
                    <div class="actions">
                            <select name="actions">
                                <option value="1">Đăng</option>
                                <option value="-1">Chờ Duyệt</option>
                                <option value="delete">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Mã Code</span></td>
                                <td><span class="thead-text">Ảnh</span></td>
                                <td><span class="thead-text">Giá</span></td>
                                <td><span class="thead-text">Danh Mục</span></td>
                                <td><span class="thead-text">Trạng Thái</span></td>
                                <td><span class="thead-text">Hoạt Động</span></td>
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
                                <td><span class="tbody-text"><h3>{{$item->product_code}}</h3></span>
                                <td>
                                    <div class="tbody-thumb">
                                        <img src="{{asset($item->image)}}" alt="">
                                    </div>
                                </td>
                                <td class="clearfix">
                                    <div class="tb-title fl-left">
                                        <a href="" title="">{{$item->price}}</a>
                                    </div>
                                    <ul class="list-operation fl-right">
                                        <li><a href="{{route('product.edit',$item->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                                <td><span class="tbody-text">{{$item->product_name}}</span></td>
                                <td><span class="tbody-text">{{$item->product_cat->title}}</span></td>
                                <td><span class="tbody-text">
                                        @if ($item->status == '1')
                                            Đã Đăng
                                        @else
                                            Đang Chờ
                                        @endif
                                    </span></td>
                                <td><span class="tbody-text">{{$item->user->name}}</span></td>
                                <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($item->created_at)); @endphp</span></td>
                            </tr>
                            @endforeach
                            <thead>
                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Mã Code</span></td>
                            <td><span class="thead-text">Ảnh</span></td>
                            <td><span class="thead-text">Giá</span></td>
                            <td><span class="thead-text">Danh Mục</span></td>
                            <td><span class="thead-text">Trạng Thái</span></td>
                            <td><span class="thead-text">Hoạt Động</span></td>
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