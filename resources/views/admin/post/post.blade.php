@extends('admin.index')
@section('content')
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Danh sách bài viết</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">{{$post_all}}</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">{{$post_active}}</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">{{$post_pending}}</span></a></li>
                        </ul>
                        <form method="GET" action="{{route('post.search')}}" class="form-s fl-right">
                            <input type="text" name="value" id="s">
                            <input type="submit" name="search" value="search">
                        </form>
                    </div>
                    <form method="POST" action="{{route('post.status')}}" class="form-actions">
                        @csrf
                    <div class="actions">
                            <select name="actions">
                                <option value="1">Đăng</option>
                                <option value="-1">Đang Chờ</option>
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
                                <td><span class="thead-text">Tiêu đề</span></td>
                                <td><span class="thead-text">Danh mục</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                                <td><span class="thead-text">Người tạo</span></td>
                                <td><span class="thead-text">Thời gian</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count=0  @endphp
                            @foreach($post as $item)
                                @php $count++ @endphp
                            <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item->id}}" class="checkItem"></td>
                                <td><span class="tbody-text"><h3>{{$count}}</h3></span>
                                <td class="clearfix">
                                    <div class="tb-title fl-left">
                                        <a href="" title="">{{$item ->title}}</a>
                                    </div>
                                    <ul class="list-operation fl-right">
                                        <li><a href="{{route('post.edit',"$item->id")}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                                <td><span class="tbody-text">{{$item->post_cat->title}}</span></td>
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
                            </tbody>
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tiêu đề</span></td>
                                <td><span class="thead-text">Danh mục</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
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
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
</div>@if (count($errors) > 0)
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