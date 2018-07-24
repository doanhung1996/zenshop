@extends('admin.index')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('page.list')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách trang</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                @if(isset($email_count_search))
                                    <li class="all"><a href="">Tìm thấy <span class="count"> ({{$email_count_search}})</span></a> |</li>
                                    <li class="all"><a href="{{route('email.store.list')}}">Tất cả <span class="count"> ({{$email_count}})</span></a> </li>
                                @else
                                    <li class="all"><a href="{{route('email.store.list')}}">Tất cả <span class="count">{{$email_count}}</span></a></li>
                                @endif

                            </ul>
                            <form method="GET" action="{{route('email.search')}}" class="form-s fl-right">
                                <input type="text" name="value" value="{{old('value')}}" id="s">
                                <input type="submit" name="search" value="Tìm kiếm">
                            </form>
                        </div>
                        <form action="{{route('email.status')}}" method="post" class="form-actions">
                            @csrf
                            <div class="actions">
                                <select name="actions">
                                    <option value="delete">Xóa</option>
                                </select>
                                <input type="submit">
                            </div>
                            <div class="table-responsive">
                                <table class="table list-table-wp">
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Email Customer</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=0 ?>
                                    @foreach($email_customer as $item_email_customer)
                                        <?php $count++ ?>
                                        <tr>
                                            <td><input type="checkbox" name="checkItem[]" value="{{ $item_email_customer->id }}" class="checkItem"></td>
                                            <td><span class="tbody-text"><h3>{{ $count }}</h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $item_email_customer->email}}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="{{route('page.edit',$item_email_customer->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($item_email_customer->created_at)); @endphp</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Email Customer</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        {{ $email_customer->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--{{dd($errors)}}--}}
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
@endsection