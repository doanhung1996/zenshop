@extends('display.index')
@section('content')
    <div id="content">
        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">@lang('display_lang.home')</a></li>
{{--                    <li><a href="{{route('post.category',$check_category->slug)}}">{{$check_category->title}}</a></li>--}}
{{--                    <li><a href="{{route('post.display',[$check_category->slug,$check_parent->slug])}}">{{$check_parent->title}}</a></li>--}}
                </ol>
                <ul style="list-style: none;">
                    @if($post_count <1)
                        <li>
                            <p>Không tìm thấy bài viết nào cho từ khóa  "<a>@php if (isset($search)) echo $search; @endphp</a>" . Mời bạn quay về <a href="{{route('home')}}" style="color: #27bdb1;">Trang Chủ</a>!</p>
                        </li>
                    @else
                        <li>
                            <p>Hiển thị {{$post_count}} trong {{$post_count_search}} bài viết tìm thấy .</p>
                        </li>
                    @endif
                </ul>
            </div>
        </div>


        <!-- Blog -->
        <section class="blog-page padding-top-30 padding-bottom-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    @foreach($post as $item)
                        <!-- Blog Post -->
                            <div class="blog-post">
                                <article class="row">
                                    <div class="col-xs-7"><a href="{{route('post.display.show',[$item->category->slug,$item->post_cat->slug,$item->slug])}}"><img class="img-responsive" src="{{asset($item->image)}}" alt="" ></a> </div>
                                    <div class="col-xs-5"> <span><i class="fa fa-bookmark-o"></i> @php echo date('d/m/Y - H:i:s',strtotime($item->created_at)); @endphp </span> <span><i class="fa fa-eye"></i>{{$item->viewer}} Views</span> <a href="{{route('post.display.show',[$item->category->slug,$item->post_cat->slug,$item->slug])}}" class="tittle">{{$item->title}} </a>
                                        <p>{!!$item->description !!}</p>
                                        <a href="{{route('post.display.show',[$item->category->slug,$item->post_cat->slug,$item->slug])}}">Đọc thêm</a></div>
                                </article>
                            </div>
                    @endforeach
                    <!-- pagination -->
                        {{$post->links('vendor.pagination.pagination')}}
                    </div>

                    <!-- Side Bar -->
                    <div class="col-md-3">
                        <div class="shop-side-bar">
                            <!-- Search -->
                            <div class="search">
                                <form action="{{route('search.post')}}" method="GET">
                                    <label>
                                        <input type="text" name="search" value="@if(isset($search)) {{$search}} @endif" placeholder="Tìm kiếm ...">
                                    </label>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Categories -->
                            <h6>Danh Mục Bài Viết</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    @foreach($category_category as $item_category_category)
                                    <li>
                                        {{--<input id="cate1" class="styled" type="checkbox" >--}}
                                        <a href="{{route('post.category',$item_category_category->slug)}}">{{$item_category_category->title}}</a>
                                    </li>
                                    @endforeach()
                                </ul>
                            </div>

                            <!-- Recent Posts -->
                            <h6>Recent Posts</h6>
                            <div class="recent-post">
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="{{asset('public/images/blog-img-2.jpg')}}" alt=""> </a> </div>
                                    <div class="media-body"> <a href="#.">It’s why there’s
                                            nothing else like Mac. </a> <span>25 Dec, 2017 </span><span> 86 Comments</span> </div>
                                </div>
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="{{asset('public/images/blog-img-3.jpg')}}" alt=""> </a> </div>
                                    <div class="media-body"> <a href="#.">It’s why there’s
                                            nothing else like Mac. </a> <span>25 Dec, 2017 </span><span> 86 Comments</span> </div>
                                </div>
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="{{asset('public/images/blog-img-4.jpg')}}" alt=""> </a> </div>
                                    <div class="media-body"> <a href="#.">It’s why there’s
                                            nothing else like Mac. </a> <span>25 Dec, 2017 </span><span> 86 Comments</span> </div>
                                </div>
                            </div>
                            <!-- Quote of the Day -->
                            <h6>Quote of the Day</h6>
                            <div class="quote-day"> <i class="fa fa-quote-left"></i>
                                <p>Suspendisse sodales cursus lorem vel
                                    efficitur. Donec tincidunt aliquet lacus. Maecenas pulvinar egestas ex eget eleifend. Aenean eget tempus urna [...]</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection()