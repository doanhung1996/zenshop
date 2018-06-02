@extends('display.index')
@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <hr style="background: #27bdb1;">
            <div class="row">
                <!-- Don’t have an Account? Register now -->
                    <h3 class="col-md-4 col-md-offset-4 col-xs-12" id="register_h3">Đăng Nhập !</h3>
                    <!-- FORM -->
                    <form class="col-md-4 col-md-offset-4 col-xs-12" action="{{ route('login') }}" method="POST">
                        @csrf
                        <ul class="row">
                            <li class="col-sm-12">
                                <label>Email
                                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus  placeholder="Mời Nhập Email.." >
                                </label>
                                @if ($errors->has('email'))
                                    <span style="color: red;">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </li>

                            <li class="col-sm-12">
                                <label>Password
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Mời Nhập Mật Khẩu..">
                                </label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </li>
                            <p style="margin-left: 16px; color: #323131ad;">Bạn chưa là thành viên ? <a href="{{route('register') }}" style="color: #27bdb1;">Đăng ký</a> tại đây !</p>
                            <label style="margin-left: 15px; color: #27bdb1;font-weight: 100; cursor: pointer;">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Ghi Nhớ Mật Khẩu !') }}
                                <a style="color: #ff1010;" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu ?') }}
                                </a>
                            </label>
                            <li class="col-sm-12 text-left">
                                <button type="submit" class="btn-round">Đăng Nhập</button>
                                <br>

                            </li>
                        </ul>
                    </form>
                </div>
        </div>
    </section>
@endsection
