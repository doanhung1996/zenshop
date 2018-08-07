@extends('admin.index')
@section('content')
    {{--{{dd($data)}}--}}
<div id="main-content-wp" class="list-cat-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{{route('product.cat.create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Danh sách danh mục</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">{{$product_count}}</span> danh mục</a></li>
                        </ul>
                    </div>
                    <form method="POST" action="{{route('product.cat.status')}}" class="form-actions">
                        @csrf
                        <div class="actions">
                            <select name="actions">
                                <option value="delete">Xóa</option>
                            </select>
                            <input type="submit" name="sm_dl" value="Áp dụng">
                        </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tiêu đề</span></td>
                                <td><span class="thead-text">Người tạo</span></td>
                                <td><span class="thead-text">Thời gian</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count =0 ; @endphp
                            @foreach($data as $item)
                                @php $count++; @endphp
                            <tr>
                                <td><input type="checkbox" name="checkItem[]" value="{{$item->id}}" class="checkItem"></td>
                                <td><span class="tbody-text"><h3>{{$count}}</h3></span>
                                <td class="clearfix">
                                    <div class="tb-title fl-left">
                                        <a href="" title="">{{str_repeat('--- ',$item->level).$item->title}}</a>
                                    </div>
                                    <ul class="list-operation fl-right">
                                        <li><a href="{{route('product.cat.edit',$item->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    </ul>
                                </td>
                                <td><span class="tbody-text">{{$item->user->name}}</span></td>
                                <td><span class="tbody-text">@php echo date("d/m/Y - H:i:s",strtotime($item->created_at)) @endphp</span></td>
                            </tr>
                            @endforeach
                            </tbody>
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tiêu đề</span></td>
                                <td><span class="thead-text">Người tạo</span></td>
                                <td><span class="thead-text">Thời gian</span></td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
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
        @if(session()->get('success_status'))
        toastr.success( "{{ session()->get('success_status') }}",{timeOut: 5000});
        @endif
    </script>
    <script>
        @if(session()->get('fail_status'))
        toastr.error( "{{ session()->get('fail_status') }}",{timeOut: 5000});
        @endif
    </script>
@endsection('content')