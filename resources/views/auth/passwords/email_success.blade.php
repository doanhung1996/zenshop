@extends('display.index')
@section('content')
    <!-- Content -->
    <div id="content">
        <div class="ship-process padding-top-30 padding-bottom-30">
            <div class="container">
                <hr style="margin-bottom: 0px !important;">
            </div>
        </div>
        <!-- Oder-success -->
        <section>
            <div class="container" style="margin-bottom: 60px !important;">
                <!-- Payout Method -->
                <div class="order-success"> <i class="fa fa-check"></i>
                    <h6>@lang('display_lang.email_check1')</h6>
                    <p>@lang('display_lang.email_check2')</p>
                    <p>@lang('display_lang.email_check3')</p>
                    <a href="{{route('home')}}" class="btn-round" style="margin-top: 30px !important;">@lang('display_lang.return_to_shop')</a> </div>
            </div>
        </section>
    </div>
@endsection()