@extends('admin.index')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{route('account')}}" title="" id="add-new" class="fl-left">Tài khoản</a>
                <h3 id="index" class="fl-left">Danh sách tài khoản</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            @include('admin.siderbar')
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                               @if(isset($account_count))
                                    <li class="publish"><a href="">Tìm Thấy <span class="count">{{$account_count}}</span></a> |</li>
                                    <li class="all"><a href="{{route('account')}}">Tất cả <span class="count">{{$account_all}}</span></a> </li>
                                @else
                                    <li class="all"><a href="{{route('account')}}">Tất cả <span class="count">{{$account_all}}</span></a> |</li>
                                    <li class="publish"><a href="{{url('admin/account?account=admin')}}">Admin <span class="count">{{$account_admin}}</span></a> |</li>
                                    <li class="pending"><a href="{{url('admin/account?account=customer')}}">Customer <span class="count">{{$account_customer}}</span></a></li>
                                   @endif
                            </ul>
                            <form method="GET" action="{{route('account.search')}}" class="form-s fl-right">
                                <input type="text" name="value" value="{{old('value') ?? isset($value)}}" id="s">
                                <input type="submit" name="search" value="search">
                            </form>
                        </div>
                        <form action="{{route('account.status')}}" method="post" class="form-actions">
                            @csrf
                            <div class="actions">
                                <select name="actions">
                                    <option value="admin">Admin</option>
                                    <option value="customer">Customer</option>
                                    <option value="delete">Xóa</option>
                                </select>
                                <input type="submit">
                            </div>
                            <div class="table-responsive">
                                <table class="table list-table-wp">
                                    <thead>
                                    <tr>
                                        <td><input style="cursor: pointer;" type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên</span></td>
                                        <td><span class="thead-text">Email</span></td>
                                        <td><span class="thead-text">Avatar</span></td>
                                        <td><span class="thead-text">Số Điện Thoại</span></td>
                                        <td><span class="thead-text">Giới Tính</span></td>
                                        <td><span class="thead-text">Địa chỉ</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Quyền</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count=0 ?>
                                    @foreach($account as $item_account)
                                        <?php $count++ ?>
                                        <tr>
                                            <td><input style="cursor: pointer;" type="checkbox" name="checkItem[]" value="{{ $item_account->id }}" class="checkItem"></td>
                                            <td><span class="tbody-text"><h3>{{ $count }}</h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="{{route('account.edit',$item_account->id)}}" title="{{ $item_account->name }}">{{ $item_account->name }}</a>
                                                </div>
                                                <ul class="list-operation fl-right">
                                                    <li><a href="{{route('account.edit',$item_account->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>
                                            <td><span class="tbody-text">{{$item_account->email}}</span></td>
                                            <td>
                                                <div class="tbody-thumb">
                                                    <a href="{{asset($item_account->image)}}" data-lightbox="image"><img src="{{asset($item_account->image)}}" alt=""></a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{$item_account->phone}}</span></td>
                                            <td><span class="tbody-text">{{$item_account->gender}}</span></td>
                                            <td><span class="tbody-text">{{$item_account->address}}</span></td>
                                            <td><span class="tbody-text">{{$item_account->verified}}</span></td>
                                            <td>
                                                    <span class="tbody-text" style="color: #00b59c;">{{$item_account->account}}</span>
                                            </td>
                                            <td><span class="tbody-text">@php echo date('d/m/Y - H:i:s',strtotime($item_account->created_at)); @endphp</span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên</span></td>
                                        <td><span class="thead-text">Email</span></td>
                                        <td><span class="thead-text">Avatar</span></td>
                                        <td><span class="thead-text">Số Điện Thoại</span></td>
                                        <td><span class="thead-text">Giới Tính</span></td>
                                        <td><span class="thead-text">Địa chỉ</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>
                                        <td><span class="thead-text">Quyền</span></td>
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
                        {{ $account->links() }}
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