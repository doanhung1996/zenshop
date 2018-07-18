@extends('admin.index')
@section('content')

    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('slider.create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Thêm mới Slider</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('slider.update',$slider['id'])}}" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Tên slider</label>
                            <input type="text" name="name" id="name" value="{{ $slider['name']  }}">
                            <label for="name">Tiêu Đề ( Title)</label>
                            <input type="text" name="title" id="title" value="{{ $slider['title'] }}">
                            <label for="name">Giá (Price)</label>
                            <input type="text" name="price" id="price" value="{{ $slider['price'] }}">
                            <label for="name">Link (Link)</label>
                            <input type="text" name="link" id="link" value="{{ $slider['link'] }}">
                            <label>Ảnh Slider</label>
                            <div id="uploadFile">
                                <img id="blah"  style="cursor: pointer;" src="{{asset($slider['image']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                                <input type="file" style="cursor: pointer;" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label>Ảnh Nền Slider</label>
                            <div id="uploadFile">
                                <img id="bla"  style="cursor: pointer;" src="{{asset($slider['background']) ?? asset('admin/public/images/img-thumb.png')}}" alt="your image" width="400" height="400" />
                                <input style="cursor: pointer;" class="btn--rose" type="file" name="background" onchange="document.getElementById('bla').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <button type="submit" id="btn-submit">Cập Nhật</button>
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