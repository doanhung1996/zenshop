@extends('display.index')
@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <hr style="background: #27bdb1;">
            <div class="row">
                <!-- Don’t have an Account? Register now -->
                    <h3 id="register_h3" class="col-md-4 col-md-offset-4 col-xs-12">Tạo Tài Khoản !</h3>
                    <!-- FORM -->
                    <form method="POST" class="col-md-4 col-md-offset-4 col-xs-12" action="{{ route('register.account') }}">
                        @csrf
                    <ul class="row">
                        <li class="col-sm-12">
                            <label>Họ Và Tên
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Mời Nhập Họ Và Tên..">
                            </label>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="color: red;">
                                        {{ $errors->first('name') }}
                                </span>
                            @endif
                        </li>

                        <li class="col-sm-12">
                            <label>Email
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            </label>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback"  style="color: red;">
                                    {{ $errors->first('email') }}
                                    </span>
                            @endif
                        </li>
                        <li class="col-sm-12">
                            <label>Password
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mời Nhập Mật Khẩu.." required>
                            </label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="color: red;">
                                       {{ $errors->first('password') }}
                                    </span>
                            @endif
                        </li>
                        <li class="col-sm-12">
                            <label>Nhập Lại Mật Khẩu
                                <input type="password" class="form-control" name="password_confirmation"  placeholder="Mời Nhập Lại Mật Khẩu.." required>
                            </label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('password') }}
                                    </span>
                            @endif
                        </li>
                        <p style="margin-left: 16px; color: #323131ad;">Bạn đã là thành viên ? <a href="{{ route('login.account') }}" style="color: #2193b5;">Đăng nhập</a> tại đây !</p>
                        <li class="col-sm-12 text-left">
                            <button type="submit" class="btn-round">Đăng Ký</button>
                        </li>
                    </ul>
                    </form>
                </div>
            </div>
    </section>
@endsection
