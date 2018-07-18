@extends('admin.index')
@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('account')}}" title="" id="add-new" class="fl-left">Tài Khoản</a>
                <h3 id="index" class="fl-left">Cập nhật thông tin</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('account.change.password',$account['id'])}}">
                            @csrf
                            <label for="content">Nhập Mật Khẩu Cũ</label>
                            <input type="text" name="old_passsword" id="title">
                            <label for="content">Mật khẩu mới</label>
                            <input type="text" name="password" id="title" required value="{{old('pass_new')}}">
                            <label for="tel">Nhập lại mật khẩu</label>
                            <input type="text" name="password_confirmation" required value="{{old('pass_new_2')}}"><br>
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

