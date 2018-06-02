@extends('display.index')

@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <hr style="background: #27bdb1;">
            <div class="row">
                <!-- Don’t have an Account? Register now -->
                <h3 class="col-md-4 col-md-offset-4 col-xs-12" id="register_h3">{{ __('Reset Password') }}</h3>
                <!-- FORM -->
                <form class="col-md-4 col-md-offset-4 col-xs-12" action="{{ route('request.password') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <ul class="row">
                        <li class="col-sm-12">
                            <label>{{ __('EMail') }}
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus  placeholder="Mời Nhập Email.." >
                            </label>
                            @if ($errors->has('email'))
                                <span style="color: red;">
                                        {{ $errors->first('email') }}
                                    </span>
                            @endif
                        </li>

                        <li class="col-sm-12">
                            <label>{{ __('Password') }}
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Mời Nhập Mật Khẩu..">
                            </label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('password') }}
                                </span>
                            @endif
                        </li>
                        <li class="col-sm-12">
                            <label>{{ __('Confirm Password') }}
                                <input type="password" class="form-control" name="password_confirmation" required  placeholder="Mời Nhập Mật Khẩu..">
                            </label>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('password') }}
                                </span>
                            @endif
                        </li>
                        <li class="col-sm-12 text-left">
                            <button type="submit" class="btn-round">{{ __('Reset Password') }}</button>
                            <br>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection
