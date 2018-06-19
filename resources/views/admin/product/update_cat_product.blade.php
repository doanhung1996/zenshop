@extends('admin.index')
@section('content')
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
                        <form method="POST" action="{{route('product.cat.update',"$product_cat->id")}}">
                            @csrf
                            <label for="title">Tiêu đề</label>
                            <input type="text" value="{{$product_cat->title}}" name="title" id="title">
                            <label>Danh mục cha</label>
                            <select name="parent_id">
                                <option value="0">-- Danh mục cha --</option>
                                @foreach($parent_id as $parent)
                                    <option value="{{$parent->id}}" {{$product_cat->id == $parent->id ? 'selected' :''}}>{{$parent->title}}</option>
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
        @if(session()->get('update_success'))
        toastr.success( "{{ session()->get('update_success') }}",{timeOut: 5000});
        @endif
    </script>
@endsection('content')