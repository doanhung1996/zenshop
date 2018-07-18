@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-product-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="http://localhost/zenshop/public" title="Zenshop" id="add-new" class="fl-left">Zenshop</a>
            <h3 id="index" class="fl-left">Chi Tiết Đơn Hàng</h3>
        </div>
    </div>
    {{--{{dd($order)}}--}}
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail" style="color: #930ce4;">{{$order->order_code}}</span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail" style="color: #177eea;">{{$order->address}}, {{$order->city}} , Tỉnh {{$order->province}}</span>
                    </li>
                    <li>
                        <h3 class="title">Họ Tên ----- Số điện thoại liên hệ</h3>
                        <span class="detail" style="color: #0f9a87;">{{$order->fullname}} -------</span>
                        <span class="detail" style="color: #0f9a87;">{{$order->phone}}</span>
                    </li>
                    <li>
                        <h3 class="title">Phương thức vận chuyển ------ Thời gian giao hàng</h3>
                        <span class="detail" style="color: red;">{{$order->delivery}} ------</span>
                        <span class="detail" style="color: red;">Từ {{$order->order_date}} đến {{$order->date_transport}}</span>
                    </li>
                    <form method="POST" action="{{route('status.order')}}">
                        @csrf
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="actions">
                                <option  value='-1' @if($order->status=='-1') selected @endif @if(old('actions')=='-1') selected @endif>Chờ duyệt</option>
                                <option  value='1' @if($order->status=='1') selected @endif @if(old('actions')=='1') selected @endif>Đang chuyển</option>
                                <option  value='2' @if($order->status=='2') selected @endif @if(old('actions')=='2') selected @endif>Thành Công</option>
                                <option  value='3' @if($order->status=='3') selected @endif @if(old('actions')=='3') selected @endif>Thùng Rác</option>
                            </select>
                            <input type="hidden" name="checkItem" value="{{$order->id}}">
                            <input type="submit" name="sm_action" value="Cập nhật trạng thái">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                        <tr>
                            <td class="thead-text">STT</td>
                            <td class="thead-text">Ảnh sản phẩm</td>
                            <td class="thead-text">Tên sản phẩm</td>
                            <td class="thead-text">Đơn giá</td>
                            <td class="thead-text">Số lượng</td>
                            <td class="thead-text">Thành tiền</td>
                            <td class="thead-text">Tiền Lãi</td>
                            <td class="thead-text">Xóa</td>
                        </tr>
                        </thead>
                        <tbody>
                        @php $count=0; @endphp
                        @foreach($order_detail as $item_order_detail)
                        @php $count++; @endphp
                        <tr>
                            <td class="thead-text">{{$count}}</td>
                            <td class="thead-text">
                                <div class="thumb">
                                    <a href="{{asset($item_order_detail->image)}}" data-lightbox="image" ><img src="{{asset($item_order_detail->image)}}" alt="{{$item_order_detail->name}}"></a>
                                </div>
                            </td>
                            <td class="thead-text">{{$item_order_detail->name}}</td>
                            <td class="thead-text">@php echo number_format($item_order_detail->price,0) .' đ' @endphp</td>
                            <td class="thead-text">{{$item_order_detail->quantity}}</td>
                            <td class="thead-text">@php echo number_format($item_order_detail->subtotal,0) .' đ' @endphp</td>
                            <td class="thead-text">@php echo number_format($item_order_detail->profit,0) .' đ' @endphp</td>
                            <td class="thead-text">
                                <a href="{{route('delete.order_cart',$item_order_detail->id)}}" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total-fee">Tổng giá trị đơn hàng</span>
                            <span class="total-fee">Tổng lợi nhuận đơn hàng</span>
                        </li>
                        <li>
                            <span class="total" style="margin-bottom: 5px;">{{$order->total_qty}} sản phẩm</span>
                            <span class="total" style="margin-bottom: 5px;">@php echo number_format($order->total_sale,0) .' đ' @endphp</span>
                            <span class="total" style="margin-bottom: 5px;">@php echo number_format($total_profit,0) .' đ' @endphp</span>
                        </li>
                    </ul>
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