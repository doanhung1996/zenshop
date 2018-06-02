@extends('admin.index')
@section('content')
<div id="main-content-wp" class="add-cat-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{{env('admin/page/create')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Thêm trang</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.siderbar')
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <span style="color:#00b8fff2;"><?php if (isset($insert)) echo $insert; ?></span>
                    <form method="POST">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title">
                        <span style="color:red;"><?php if (isset($error['title'])) echo $error['title']; ?></span>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <span style="color:red;"><?php if (isset($error['slug'])) echo $error['slug']; ?></span>
                        <label for="content">Nội Dung</label>
                        <textarea name="content" class="ckeditor" id="editor"></textarea>
                        <span style="color:red;"><?php if (isset($error['content'])) echo $error['content']; ?></span>
                        <button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

