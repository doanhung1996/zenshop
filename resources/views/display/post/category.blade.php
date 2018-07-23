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
                                    <div class="col-xs-5"> <span><i class="fa fa-bookmark-o"></i> @php echo date('d/m/Y - H:i:s',strtotime($item_category_post->created_at)); @endphp </span> <span><i class="fa fa-comment-o"></i> 0 Comments</span> <a href="#." class="tittle">{{$item_category_post->title}} </a>
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
                                <form>
                                    <label>
                                        <input type="email" placeholder="Search here">
                                    </label>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- Categories -->
                            <h6>Categories</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    <li>
                                        <input id="cate1" class="styled" type="checkbox" >
                                        <label for="cate1"> Home Audio & Theater </label>
                                    </li>
                                    <li>
                                        <input id="cate2" class="styled" type="checkbox" >
                                        <label for="cate2"> TV & Video</label>
                                    </li>
                                    <li>
                                        <input id="cate3" class="styled" type="checkbox" >
                                        <label for="cate3"> Camera, Photo & Video</label>
                                    </li>
                                    <li>
                                        <input id="cate4" class="styled" type="checkbox" >
                                        <label for="cate4"> Cell Phones & Accessories</label>
                                    </li>
                                    <li>
                                        <input id="cate5" class="styled" type="checkbox" >
                                        <label for="cate5"> Headphones</label>
                                    </li>
                                    <li>
                                        <input id="cate6" class="styled" type="checkbox" >
                                        <label for="cate6"> Video Games</label>
                                    </li>
                                    <li>
                                        <input id="cate7" class="styled" type="checkbox" >
                                        <label for="cate7"> Bluetooth & Wireless Speakers</label>
                                    </li>
                                    <li>
                                        <input id="cate8" class="styled" type="checkbox" >
                                        <label for="cate8"> Gaming Console</label>
                                    </li>
                                    <li>
                                        <input id="cate9" class="styled" type="checkbox" >
                                        <label for="cate9"> Computers & Tablets</label>
                                    </li>
                                    <li>
                                        <input id="cate10" class="styled" type="checkbox" >
                                        <label for="cate10"> Monitors</label>
                                    </li>
                                    <li>
                                        <input id="cate11" class="styled" type="checkbox" >
                                        <label for="cate11"> Home Appliances</label>
                                    </li>
                                    <li>
                                        <input id="cate12" class="styled" type="checkbox" >
                                        <label for="cate12">Office Supplies </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Recent Posts -->
                            <h6>Recent Posts</h6>
                            <div class="recent-post">
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="images/blog-img-2.jpg" alt=""> </a> </div>
                                    <div class="media-body"> <a href="#.">It’s why there’s
                                            nothing else like Mac. </a> <span>25 Dec, 2017 </span><span> 86 Comments</span> </div>
                                </div>
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="images/blog-img-3.jpg" alt=""> </a> </div>
                                    <div class="media-body"> <a href="#.">It’s why there’s
                                            nothing else like Mac. </a> <span>25 Dec, 2017 </span><span> 86 Comments</span> </div>
                                </div>
                                <!-- Recent Posts -->
                                <div class="media">
                                    <div class="media-left"> <a href="#."><img class="img-responsive" src="images/blog-img-4.jpg" alt=""> </a> </div>
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