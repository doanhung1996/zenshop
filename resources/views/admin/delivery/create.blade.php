@extends('admin.index')
@section('content')

    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('delivery.store')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Phương thức vận chuyển</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST" action="{{route('delivery.store')}}">
                            @csrf
                            <label for="name">Tên phương thức</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}">
                            <label for="name">Thông tin ngày đến giao hàng (Nội dung)</label>
                            <input type="text" name="date_info" id="date_info" value="{{ old('date_info') }}">
                            <label for="name">Số ngày giao hàng</label>
                            <input type="number" min="1" max="10" name="date" id="date" value="{{ old('date') }}">
                            <label for="name">Phí giao hàng</label>
                            <input type="number" min="0" name="price" id="price" value="{{ old('price') }}">
                            <button type="submit" style="margin-top: 15px;" id="btn-submit">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <script>
                        $( document ).ready(function() {
                            toastr.error("{{$error}}");
                        });
                    </script>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        @if(session()->get('success')) //sao ko ra nhi
        toastr.success( "{{ session()->get('success') }}",{timeOut: 5000});
        @endif
    </script>
@endsection('content')