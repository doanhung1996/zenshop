@extends('admin.index')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('page.list')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
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
                                <li class="all"><a href="">Tìm thấy : <span class="count">{{$pages_all}}</span></a> Trang</li>
                                {{--<li class="publish"><a href="">Đã đăng <span class="count">{{$pages_active}}</span></a> |</li>--}}
                                {{--<li class="pending"><a href="">Đang Chờ <span class="count">{{$pages_pending}}</span></a></li>--}}
                            </ul>
                            <form method="GET" action="{{route('page.search')}}" class="form-s fl-right">
                                <input type="text" name="value" id="s">
                                <input type="submit" name="search" value="Tìm kiếm">
                            </form>
                        </div>
                        <form action="{{route('page.status')}}" method="post" class="form-actions">
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
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Slug</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=0 ?>
                                    @foreach($pages as $page)
                                        <?php $count++ ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[]" value="{{ $page->id }}" class="checkItem"></td>
                                            <td><span class="tbody-text"><h3>{{ $count }}</h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $page->title }}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="{{url("admin/page/update/$page->id.html" )}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">@php echo substr($page->slug,0,15); @endphp</span></td>
                                            <td><span class="tbody-text">
                                            @if ($page->status == '1')
                                                        Đã Đăng
                                                    @else
                                                        Đang Chờ
                                                    @endif
                                        </span>
                                            </td>
                                            <td><span class="tbody-text">{{ $page->name }}</span></td>
                                            <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($page->created_at)); @endphp</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Slug</span></td>
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
                        {{ $pages->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--{{dd($errors)}}--}}
    {{--@if (count($errors) > 0)--}}
        {{--<div>--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<script>--}}
                        {{--$( document ).ready(function() {--}}
                            {{--toastr.error("{{$error}}");--}}
                        {{--});--}}
                    {{--</script>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--<script>--}}
        {{--@if(session()->get('success_status'))--}}
        {{--toastr.success( "{{ session()->get('success_status') }}",{timeOut: 5000});--}}
        {{--@endif--}}
    {{--</script>--}}
@endsection