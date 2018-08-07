@extends('display.index')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Error Page -->
        <section>
            <div class="container">
                <div class="order-success error-page"> <img src="{{asset('public/images/error-img.jpg')}}" alt="" >
                    <h4 style="font-size: 18px;">Ồ .... Email đã tồn tại...</h4>
                    <p>Bạn vui lòng nhập email khác !<br></p>
                    <h4>Trở về <a href="{{route('home')}}">Trang Chủ</a></h4>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->
@endsection('content')