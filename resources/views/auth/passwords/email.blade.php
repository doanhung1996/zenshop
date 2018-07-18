@extends('display.index')

@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <hr style="background: #27bdb1;">
            <div class="row">
                <!-- Don’t have an Account? Register now -->
                <h3 class="col-md-4 col-md-offset-4 col-xs-12" id="register_h3" style="color: #27bdb1;">@lang('display_lang.forget_password')</h3>
                <!-- FORM -->
                <form class="col-md-4 col-md-offset-4 col-xs-12" action="{{ route('password.email') }}" method="POST">
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
                        <li class="col-sm-12 text-left">
                            <button style="width: 150px; margin-left: 20px !important;" type="submit" class="btn-round">@lang('display_lang.send_email')</button>
                            <div  class="btn-round" style="margin-left: 0px !important;    ">
                                <a style="color: #ffffff;" href="{{ route('login.account') }}">
                                    {{ __('display_lang.come_back') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection
