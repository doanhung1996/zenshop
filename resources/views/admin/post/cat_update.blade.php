@extends('admin.index')
@section('content')
    {{--{{dd($parent_cat)}}--}}
    {{--{{dd($cat)}}--}}
    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('post.cat.update', $cat->id)}}">
                            @csrf
                            @method('PUT')
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" value="{{ $cat->title ?? old('title') }}">
                            <label>Danh mục cha</label>
                            <select name="parent_id">
                                <option value="0">-- Chọn Cấp Cha --</option>
                                @foreach($parent_cat as $cate)
                                    <option value="{{ $cate->id }}" {{ $cate->id == $cat->parent_id ? 'selected' : '' }}>{{ $cate->title }}</option>
                                @endforeach
                            </select>
                            <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
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
