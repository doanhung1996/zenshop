@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{{route('customer')}}" title="Khách Hàng" id="add-new" class="fl-left">Khách Hàng</a>
            <h3 id="index" class="fl-left">Danh sách Đơn Hàng</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            @if(isset($order_count))
                                <li class="all"><a href="{{route('order')}}">Tìm thấy <span class="count">({{$order_count}})</span></a> |</li>
                                <li class="all"><a href="{{route('order')}}">Tất cả <span class="count">({{$order_all}})</span></a> </li>
                            @else
                                <li class="all"><a href="{{route('order')}}">Tất cả <span class="count">({{$order_all}})</span></a> |</li>
                                <li class="publish"><a href="{{url('admin/order?status=-1')}}" style="color: #0f9a87;">Đang chờ <span class="count">({{$order_pending}})</span></a> |</li>
                                <li class="publish"><a href="{{url('admin/order?status=1')}}" style="color: #ec2e2e;">Đang chuyển <span class="count" >({{$order_delivery}})</span></a> |</li>
                                <li class="pending"><a href="{{url('admin/order?status=2')}}" style="color: #008a98;">Thành Công<span class="count">({{$order_success}})</span></a></li>
                                <li class="pending"><a href="{{url('admin/order?status=3')}}" style="color: #333;">Thùng rác<span class="count">({{$order_recycle}})</span></a></li>
                                @endif
                        </ul>
                        <form method="GET" action="{{route('order.search')}}" class="form-s fl-right">
                            <input type="text" name="value" value="{{old('value')}}" id="s">
                            <input type="submit" name="search" value="search">
                        </form>
                    </div>
                    <form method="POST" action="{{route('status.order')}}" class="form-actions">
                    <div class="actions">
                           @csrf
                            <select name="actions">
                                <option value="-1" @if(old('actions')=='-1') selected @endif>Đang Chờ</option>
                                <option value="1" @if(old('actions')=='1') selected @endif>Đang Chuyển</option>
                                <option value="2" @if(old('actions')=='2') selected @endif>Thành Công</option>
                                @if(!empty($id==3))<option value="delete" @if(old('actions')=='delete') selected @endif>Xóa</option>@else
                                <option value="3" @if(old('actions')=='3') selected @endif>Thùng Rác</option>
                                @endif
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Mã đơn hàng</span></td>
                                <td><span class="thead-text">Họ tên</span></td>
                                <td><span class="thead-text">Tài Khoản</span></td>
                                <td><span class="thead-text">Số Lượng</span></td>
                                <td><span class="thead-text">Tổng Chi Phí</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                                <td><span class="thead-text">Thời gian tạo</span></td>
                                <td><span class="thead-text">Hạn giao hàng</span></td>
                                <td><span class="thead-text">Chi Tiết</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=0; @endphp
                            @foreach($order as $item_order)
                            @php $count++; @endphp
                            <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item_order->id}}" class="checkItem"></td>
                                <td><span class="tbody-text"><h3>{{$count}}</h3></span>
                                <td><span class="tbody-text"><h3>{{$item_order->order_code}}</h3></span>
                                <td>
                                    <div class="tb-title fl-left">
                                        <a href="{{route('order.detail',$item_order->id)}}" title="{{$item_order->fullname}}">{{$item_order->fullname}}</a>
                                    </div>
                                    {{--<ul class="list-operation fl-right">--}}
                                        {{--<li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>--}}
                                        {{--<li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>--}}
                                    {{--</ul>--}}
                                </td>
                                <td><span class="tbody-text">{{optional($item_order->user)->name}}</span></td>
                                <td><span class="tbody-text">{{$item_order->total_qty}}</span></td>
                                <td><span class="tbody-text">@php echo number_format($item_order->total_sale,0).'đ'@endphp</span></td>
                                <td>
                                        @if($item_order->status=='-1')
                                        <span class="tbody-text" style="color: #0f9a87;">
                                            Đang Chờ
                                        </span>
                                            @elseif($item_order->status=='1')
                                        <span class="tbody-text" style="color: #ec2e2e;">
                                            Đã Chuyển
                                        </span>
                                            @elseif($item_order->status=='2')
                                        <span class="tbody-text" style="color: #008a98;">
                                              Thành Công
                                        </span>
                                            @elseif($item_order->status=='3')
                                        <span class="tbody-text" style="color: #333;">
                                              Thùng Rác
                                        </span>
                                        @endif
                                </td>
                                <td><a href="{{route('order.detail',$item_order->id)}}" title="" class="tbody-text">{{$item_order->order_date}}</a></td>
                                <td><a href="{{route('order.detail',$item_order->id)}}" title="" style="color: red;" class="tbody-text">{{$item_order->date_transport}}</a></td>
                                <td><a href="{{route('order.detail',$item_order->id)}}" title="" class="tbody-text">Đơn Hàng</a></td>
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Mã đơn hàng</span></td>
                                <td><span class="thead-text">Họ Tên</span></td>
                                <td><span class="thead-text">Tài Khoản</span></td>
                                <td><span class="thead-text">Số Lượng</span></td>
                                <td><span class="thead-text">Tổng Chi Phí</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                                <td><span class="thead-text">Thời gian tạo</span></td>
                                <td><span class="thead-text">Hạn giao hàng</span></td>
                                <td><span class="thead-text">Chi Tiết</span></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    {{ $order->links() }}
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
<script>
    @if(session()->get('success_delete'))
    toastr.success( "{{ session()->get('success_delete') }}",{timeOut: 5000});
    @endif
</script>
@endsection('content')