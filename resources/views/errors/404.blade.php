@extends('display.index')
@section('content')
	<!-- Content -->
	<div id="content">

		<!-- Error Page -->
		<section>
			<div class="container">
				<div class="order-success error-page"> <img src="{{asset('public/images/error-img.jpg')}}" alt="" >
					<h3>Lỗi <span>404</span> Không Tìm Thấy</h3>
					<h4>Trở về <a href="{{route('home')}}">Trang Chủ</a></h4>
					<p>Trang bạn tìm không tồn tại !<br></p>
				</div>
			</div>
		</section>
	</div>
	<!-- End Content -->
	@endsection('content')