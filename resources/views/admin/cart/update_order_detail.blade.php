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
                <td class="thead-text">Tài Khoản</td>
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
                    <td class="thead-text"><input onchange="update(this);" name="qty" order_id="{{$order->id}}" product_id="{{$item_order_detail->product_id}}" order_detail_id="{{$item_order_detail->id}}" type="number" min="0" style="width: 50px;"  value="{{$item_order_detail->quantity}}"></td>
                    <td class="thead-text">@php echo number_format($item_order_detail->subtotal,0) .' đ' @endphp</td>
                    <td class="thead-text">@php echo number_format($item_order_detail->profit,0) .' đ' @endphp</td>
                    <td class="thead-text">{{optional($item_order_detail->user)->name}}</td>
                    <td class="thead-text">
                        <a href="{{route('delete.order_cart',$item_order_detail->id)}}" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
<script>
    @if(session()->get('success_status'))
    toastr.success( "{{ session()->get('success_status') }}",{timeOut: 5000});
    @endif
</script>
<script>
    @if(session()->get('fail_status'))
    toastr.error( "{{ session()->get('fail_status') }}",{timeOut: 5000});
    @endif
</script>