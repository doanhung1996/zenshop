@extends('admin.index')
@section('content')

    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{env('admin/page/create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Thêm trang</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{url("admin/page/update/$pages->id.html" )}}">
                            @csrf
                            <label for="title">Tiêu Đề ( Title)</label>
                            <input type="text" name="title" id="title" value="{{$pages->title}}">
                            <label for="content">Nội Dung (Content Page)</label>
                            <textarea name="content_page" class="ckeditor" id="editor">
                                {{$pages->content_page}}
                            </textarea>
                            <button type="submit" id="btn-submit">Cập nhật</button>
                        </form>
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
        @if(session()->get('success_update'))
        toastr.success( "{{ session()->get('success_update') }}",{timeOut: 5000});
        @endif
    </script>
@endsection('content')

