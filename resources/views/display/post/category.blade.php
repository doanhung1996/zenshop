@extends('display.index')
@section('content')
    <div id="content">
        <!-- Linking -->
        <div class="linking">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">@lang('display_lang.home')</a></li>
                    <li><a href="{{route('post.category',$category_id['slug'])}}">{{$category_id['title']}}</a></li>
                </ol>
            </div>
        </div>
        <!-- Blog -->
        <section class="blog-page padding-top-30 padding-bottom-60">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    @foreach($category_post as $item_category_post)
                        <!-- Blog Post -->
                            <div class="blog-post">
                                <article class="row">
                                    <div class="col-xs-7"><a href="{{route('post.display.show',[$item_category_post->category->slug,$item_category_post->post_cat->slug,$item_category_post->slug])}}"><img class="img-responsive" src="{{asset($item_category_post->image)}}" alt="" > </a> </div>
                                    <div class="col-xs-5"> <span><i class="fa fa-bookmark-o"></i> @php echo date('d/m/Y - H:i:s',strtotime($item_category_post->created_at)); @endphp </span> <span><i class="fa fa-comment-o"></i> 0 Comments</span> <a href="{{route('post.display.show',[$item_category_post->category->slug,$item_category_post->post_cat->slug,$item_category_post->slug])}}" class="tittle">{{$item_category_post->title}} </a>
                                        <p>{!!$item_category_post->description !!}</p>
                                        <a href="{{route('post.display.show',[$item_category_post->category->slug,$item_category_post->post_cat->slug,$item_category_post->slug])}}">Đọc thêm</a></div>
                                </article>
                            </div>
                    @endforeach()
                    <!-- pagination -->
                        {{$category_post->links('vendor.pagination.pagination')}}
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