@extends('display.index')

@section('content')
    <section class="login-sec padding-top-30 padding-bottom-100">
        <div class="container">
            <hr style="background: #27bdb1;">
            <div class="row">
                <!-- Don’t have an Account? Register now -->
                <h3 class="col-md-4 col-md-offset-4 col-xs-12" id="register_h3" style="text-align: center;">{{ __('Thông Tin Tài Khoản') }}</h3>
                <!-- FORM -->
                <form class="col-md-4 col-md-offset-4 col-xs-12" action="{{ route('information.update',auth()->user()->id) }}" method="POST">
                    @csrf
                    {{--<input type="hidden" name="token" value="{{ $token }}">--}}
                    <ul class="row">
                        <li class="col-sm-12">
                            <label>{{ __('display_lang.fullname') }}
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus  placeholder="Mời Nhập Họ Tên.." >
                            </label>
                            @if ($errors->has('name'))
                                <span style="color: red;">
                                        {{ $errors->first('name') }}
                                </span>
                            @endif
                        </li>

                        <li class="col-sm-12">
                            <label>{{ __('display_lang.phone') }}
                                <input type="text"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{old('phone')}}" name="phone" required  placeholder="Mời Nhập Số Điện Thoại..">
                            </label>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('phone') }}
                                </span>
                            @endif
                        </li>
                        <li class="col-sm-12">
                            <label>{{ __('display_lang.address') }}
                                <input type="text" class="form-control" name="address" required  placeholder="Mời Nhập Địa Chỉ..">
                            </label>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('address') }}
                                </span>
                            @endif
                        </li>
                        <li class="col-sm-12">
                            <label>{{ __('display_lang.gender') }}
                                <select class="form-control"  name="gender">
                                    <option value="">-- Chọn Giới Tính --</option>
                                    <option value="nam">Nam</option>
                                    <option value="nữ">Nữ</option>
                                </select>
                            </label>
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback"  style="color: red;">
                                        {{ $errors->first('gender') }}
                                </span>
                            @endif
                        </li>
                        <li class="col-sm-12 text-left">
                            <button type="submit" class="btn-round">{{ __('Cập Nhật Thông Tin') }}</button>
                            <br>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection