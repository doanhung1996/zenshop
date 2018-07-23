@extends('admin.index')
@section('content')
    <div id="main-content-wp" class="add-cat-page menu-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="?mod=menu&controller=menuType&action=menuType" title="" id="add-new" class="fl-left">Thêm mới menu</a>
                <h3 id="index" class="fl-left">Menu Type</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section-detail clearfix">
                    <div id="list-menu" class="fl-left">
                        <form  method="POST" action="{{route('menu.update',$menu_type['id'])}}" id="menu-insert">
                            @csrf()
                            <div class="form-group">
                                <label for="title">Tên menu</label>
                                <input type="text" name="name" value="{{$menu_type['name']}}" id="title_menu_type">
                            </div>
                            <div class="form-group" style="margin-top: 20px;">
                                <button type="submit" name="sm_add" id="btn-save-list" class="menu_type">Cập Nhật</button>
                            </div>
                        </form>
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