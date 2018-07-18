@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="http://localhost/zenshop/public" title="Zenshop" id="add-new" class="fl-left">Zenshop</a>
            <h3 id="index" class="fl-left">Thông Tin Khách Hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            @if(isset($customer_count))
                                <li class="all"><a href="">Tìm thấy<span class="count">({{$customer_count}})</span></a></li>
                            @endif
                            <li class="all"><a href="{{route('customer')}}">Tất cả <span class="count">({{$customer_all}})</span></a></li>
                        </ul>
                        <form method="GET" action="{{route('customer.search')}}" class="form-s fl-right">
                            @csrf
                            <input type="text" name="value" id="s">
                            <input type="submit" name="search" value="search">
                        </form>
                    </div>
                    <form method="POST" action="{{route('customer.delete')}}" class="form-actions">
                        @csrf
                    <div class="actions">
                            <select name="actions">
                                <option value="">Tác vụ</option>
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
                                <td><span class="thead-text">Họ và tên</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td><span class="thead-text">Số điện thoại</span></td>
                                <td><span class="thead-text">Địa Chỉ</span></td>
                                <td><span class="thead-text">Quận Huyện/TP</span></td>
                                <td><span class="thead-text">Tỉnh</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=0; @endphp
                            @foreach($customer as $item_customer)
                                @php $count++; @endphp
                                <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item_customer->id}}" class="checkItem"></td>
                                <td><span class="tbody-text"><h3>{{$count}}</h3></span>
                                <td><span class="tbody-text"><h3>{{$item_customer->fullname}}</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="" title="{{$item_customer->email}}">{{$item_customer->email}}</a>
                                    </div>
                                    {{--<ul class="list-operation fl-right">--}}
                                        {{--<li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>--}}
                                        {{--<li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>--}}
                                    {{--</ul>--}}
                                </td>
                                <td><span class="tbody-text">{{$item_customer->phone}}</span></td>
                                <td><span class="tbody-text">{{$item_customer->address}}</span></td>
                                <td><span class="tbody-text">{{$item_customer->city}}</span></td>
                                <td><span class="tbody-text">{{$item_customer->province}}</span></td>
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Họ và tên</span></td>
                                <td><span class="thead-text">Email</span></td>
                                <td><span class="thead-text">Số điện thoại</span></td>
                                <td><span class="thead-text">Địa Chỉ</span></td>
                                <td><span class="thead-text">Quận Huyện/TP</span></td>
                                <td><span class="thead-text">Tỉnh</span></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    {{ $customer->links() }}
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