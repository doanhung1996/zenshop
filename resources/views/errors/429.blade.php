@extends('display.index')
@section('content')
    <!-- Content -->
    <div id="content">

        <!-- Error Page -->
        <section>
            <div class="container">
                <div class="order-success error-page"> <img src="{{asset('public/images/error-img.jpg')}}" alt="" >
                    <h3>Ồ !... đã có lỗi sảy ra !</h3>
                    <p>Bạn đã nhập sai quá nhiều lần , vui lòng đợi trong vài phút !<br></p>
                    <h4>Trở về <a href="{{route('home')}}">Trang Chủ</a></h4>
                </div>
            </div>
        </section>
    </div>
    <!-- End Content -->
@endsection('content')