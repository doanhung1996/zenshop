@extends('display.index')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Oder-success -->
        <section>
            <div class="container">
                <!-- Payout Method -->

                <div class="order-success"> <i class="fa fa-check"></i>
                    <h6>@lang('display_lang.confirmation')</h6>
                    <p>@lang('display_lang.info')</p>
                    <a href="{{route('home')}}" class="btn-round">@lang('display_lang.return_to_shop')</a> </div>
            </div>
        </section>

        <!-- Clients img -->
        <section class="light-gry-bg clients-img">
            <div class="container">
                <ul>
                    <li><img src="images/c-img-1.png" alt="" ></li>
                    <li><img src="images/c-img-2.png" alt="" ></li>
                    <li><img src="images/c-img-3.png" alt="" ></li>
                    <li><img src="images/c-img-4.png" alt="" ></li>
                    <li><img src="images/c-img-5.png" alt="" ></li>
                </ul>
            </div>
        </section>
    </div>
    <!-- End Content -->

@endsection()