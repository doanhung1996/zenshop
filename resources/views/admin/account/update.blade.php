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
                        <form method="POST" action="{{route('account.update',$account['id'])}}" enctype="multipart/form-data">
                            @csrf
                            <label for="title">Username</label>
                            <input type="text" name="name" id="title" value="{{$account['name'] ?? old('name')}}">
                            <label for="content">Email</label>
                            <input type="text" name="email" id="title" value="{{$account['email'] ?? old('email')}}">
                            <label for="tel">Số điện thoại</label>
                            <input type="number" name="phone" required id="phone" value="{{$account['phone']}}"><br>
                            <label for="address">Địa chỉ</label>
                            <textarea name="address" required id="address">{{$account['address']}}</textarea>
                            <label for="content">Giới Tính</label>
                            <select name="gender">
                                <option value="">-- Giới Tính --</option>
                                <option value="nam" {{'nam' == $account['gender'] ? "selected":""}}>Nam</option>
                                <option value="nữ" {{'nữ' == $account['gender'] ? "selected":""}}>Nữ</option>
                            </select>
                            <label>Hình ảnh</label>
                            <div id="uploadFile">
                                <img id="blah" src="@if(isset($account['image'])){{asset($account['image'])}} @else {{asset('admin/public/images/img-thumb.png')}} @endif" alt="your image" width="400" height="400" />
                                <input type="file" name="fileUpload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <label for="content">Trang Thái Đăng Nhập</label>
                            <select name="verified">
                                <option value="">-- Chọn Trạng Thái --</option>
                                <option value="active" {{'active' == $account['verified'] ? "selected":""}}>Active</option>
                                <option value="pending" {{'pending' == $account['verified'] ? "selected":""}}>Pending</option>
                            </select>
                            <label for="content">Quyền</label>
                            <select name="account">
                                <option value="">-- Quền Đăng Nhập --</option>
                                <option value="admin" {{'admin' == $account['account'] ? "selected":""}}>Admin</option>
                                <option value="customer" {{'customer' == $account['account'] ? "selected":""}}>Customer</option>
                            </select>
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

