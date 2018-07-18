@extends('admin.index')
@section('content')
<div id="main-content-wp" class="add-cat-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Tiêu đề (Title)</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}">
                        <label for="desc">Mô tả (Description)</label>
                        <textarea name="description">{{ old('description') }}</textarea>
                        <label for="desc">Nội Dung (Content)</label>
                        <textarea name="content" id="editor1">{{ old('content') }}</textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <img id="blah" src="{{asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                            <input type="file" name="fileUpload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <label>Danh mục cha</label>
                        <select name="post_cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach($parent_cat as $cat)
                            <option value="{{$cat->id}}" {{old('post_cat_id')==$cat->id ? 'selected':""}}>{{$cat->title}}</option>
                            @endforeach
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
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
    @if(session()->get('success'))
    toastr.success( "{{ session()->get('success') }}",{timeOut: 5000});
    @endif
</script>
@endsection('content')