@extends('admin.index')
@section('content')
    <div id="main-content-wp" class="add-cat-page menu-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('menu.type')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Menu Type</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section-detail clearfix">
                    <div id="list-menu" class="fl-left">
                        <span id="insert_menu_sc"></span>
                        <form  method="POST" action="{{route('menu.store')}}" id="menu-insert">
                            @csrf()
                            <div class="form-group">
                                <label for="title">Tên menu</label>
                                <input type="text" name="name" id="title_menu_type">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="sm_add" id="btn-save-list" class="menu_type">Thêm Menu</button>
                            </div>
                        </form>
                        {{--<span id="check_update_menu_type"></span>--}}
                        {{--<form  method="POST" id="menu-type">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="title">Tên menu cập nhật</label>--}}
                                {{--<input type="text" name="update_menu_type" id="update_menu_type">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<button type="submit" name="sm_add" id="btn-save-list" class="update_menu_type">Cập Nhật Menu</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                    <div id="category-menu" class="fl-right">
                        <!-- form -->
                        <form method="post" action="{{route('menu.status')}}">
                            @csrf()
                            <div class="actions">
                                <select name="actions">
                                    <option value="delete">Xóa</option>
                                </select>
                                <button type="submit" name="sm_block_status" id="sm-block-status">Áp dụng</button>
                            </div>
                            <span id="result_delete"></span>
                            <div class="table-responsive">
                                <table class="table list-table-wp" id="result_data">
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên menu</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian tạo</span></td>
                                    </tr>
                                    </thead>
                                    <tbody id="menu" >
                                    @php $count =0; @endphp
                                    @foreach($menu_type as $item_menu_type)
                                        @php $count++; @endphp
                                        <tr>
                                        <td><input type='checkbox' name='checkItem[]' value='{{$item_menu_type->id}}'></td>
                                            <td><span class='tbody-text'>{{$count}}</span></td>
                                            <td>
                                                <div class='tb-title fl-left'>
                                                    <a href='{{route('menu.edit',$item_menu_type->id)}}' title=''>{{$item_menu_type->name}}</a>
                                                </div>
                                                <ul  class='list-operation fl-right'>
                                                    <li><a href="{{route('menu.edit',$item_menu_type->id)}}" title='Sửa' ><i class='fa fa-pencil' aria-hidden='true'></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class='tbody-text'>{{$item_menu_type->user->name}}</span></td>
                                            <td><span class='tbody-text'>@php echo date('d/m/Y - H:i:s',strtotime($item_menu_type->created_at))@endphp</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên menu</span></td>
                                        <td><span class="thead-text">Người tạo</span></td>
                                        <td><span class="thead-text">Thời gian tạo</span></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
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