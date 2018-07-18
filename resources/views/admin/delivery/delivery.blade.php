@extends('admin.index')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('delivery.create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách phương thức vận chuyển</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                @if(isset($method_delivery_count))
                                    <li class="all"><a href="">Tìm thấy<span class="count">{{$method_delivery_count}}</span></a> |</li>
                                    <li class="all"><a href="{{route('delivery')}}">Tất cả <span class="count">{{$delivery_all}}</span></a> </li>

                                @else
                                    <li class="all"><a href="{{route('delivery')}}">Tất cả <span class="count">{{$delivery_all}}</span></a> |</li>
                                    <li class="publish"><a href="{{url('admin/delivery?status=1')}}">Đã đăng <span class="count">{{$delivery_active}}</span></a> |</li>
                                    <li class="pending"><a href="{{url('admin/delivery?status=-1')}}">Đang Chờ <span class="count">{{$delivery_pendding}}</span></a></li>
                                @endif

                            </ul>
                            <form method="GET" action="{{route('delivery.search')}}" class="form-s fl-right">
                                <input type="text" name="value"  value="{{old('value')}}" id="s">
                                <input type="submit" name="search" value="search">
                            </form>
                        </div>
                        <form action="{{route('delivery.status')}}" method="post" class="form-actions">
                            @csrf
                            <div class="actions">
                                <select name="actions">
                                    <option value="1">Đăng</option>
                                    <option value="-1">Chờ</option>
                                    <option value="delete">Xóa</option>
                                </select>
                                <input type="submit">
                            </div>
                            <div class="table-responsive">
                                <table class="table list-table-wp">
                                    <thead>
                                    <tr>
                                        <td><input style="cursor: pointer;" type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Thông tin giao hàng</span></td>
                                        <td><span class="thead-text">Số lượng ngày</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Giá</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=0 ?>
                                    @foreach($method_delivery as $item_method_delivery)
                                        <?php $count++ ?>
                                        <tr>
                                            <td><input style="cursor: pointer;" type="checkbox" name="checkItem[]" value="{{ $item_method_delivery->id }}" class="checkItem"></td>
                                            <td><span class="tbody-text"><h3>{{ $count }}</h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $item_method_delivery->title }}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="{{route('delivery.edit',$item_method_delivery->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{$item_method_delivery->date_info}}</span></td>
                                            <td><span class="tbody-text">{{$item_method_delivery->date}}</span></td>
                                            <td>
                                                @if ($item_method_delivery->status == '1')
                                                    <span class="tbody-text" style="color: red;">Đã Đăng</span>
                                                @else
                                                    <span class="tbody-text" style="color: #0f9a87;"> Đang Chờ</span>
                                                @endif
                                            </td>
                                            <td><span class="tbody-text">@php echo number_format($item_method_delivery->price,0). ' đ' @endphp  </span></td>
                                            <td><span class="tbody-text">{{$item_method_delivery->user->name}}  </span></td>
                                            <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($item_method_delivery->created_at)); @endphp</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Thông tin giao hàng</span></td>
                                        <td><span class="thead-text">Số lượng ngày</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Giá</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        {{ $method_delivery->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--{{dd($errors)}}--}}
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
@endsection