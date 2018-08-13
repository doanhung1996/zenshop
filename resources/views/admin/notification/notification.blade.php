@extends('admin.index')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('page.create')}}" title="Thêm Mới" id="add-new" class="fl-left">Thêm Mới</a>
                <h3 id="index" class="fl-left">Danh sách trang</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                    <li class="all"><a href="{{route('notification.list')}}">Tất cả <span class="count"> ({{$notification_all}})</span></a> </li>
                            </ul>
                            {{--<form method="GET" action="{{route('page.search')}}" class="form-s fl-right">--}}
                                {{--<input type="text" name="value" value="{{old('value')}}" id="s">--}}
                                {{--<input type="submit" name="search" value="Tìm kiếm">--}}
                            {{--</form>--}}
                        </div>
                        <form action="{{route('notification.delete')}}" method="get" class="form-actions">
                            {{--@csrf--}}
                            <div class="actions">
                                <select name="actions">
                                    <option value="delete">Xóa</option>
                                </select>
                                <input type="submit">
                            </div>
                            <div class="table-responsive">
                                <table class="table list-table-wp">
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Số điện thoại</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=0 ?>
                                    @foreach($notifications as $item_notifications)
                                        <?php $count++ ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[]" value="{{ $item_notifications->id}}" class="checkItem"></td>
                                            <td><span class="tbody-text"><h3>{{ $count }}</h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="{{ $item_notifications->data['link']}}" title="{{ $item_notifications->data['message']}}">{{ $item_notifications->data['message']}}</a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{$item_notifications->data['phone']}}</span></td>
                                            <td><span class="tbody-text">{{$item_notifications->data['date']}}</span></td>
{{--                                            <td><span class="tbody-text">{{ $item_notifications->created_at }}</span></td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Số điện thoại</span></td>
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
                        {{ $notifications->links() }}
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
        @if(session()->get('delete_success'))
        toastr.success( "{{ session()->get('delete_success') }}",{timeOut: 5000});
        @endif
    </script>
@endsection