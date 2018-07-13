<section class="padding-top-0 padding-bottom-60">
    <div class="container">

        <!-- heading -->
        <div class="heading">
            <h2>@lang('display_lang.news')</h2>
            <hr>
        </div>
        <div id="blog-slide" class="with-nav">
            <!-- Blog Post -->
            @foreach($post_home as $item_post_home)
            <div class="blog-post">
                <article><a href="{{$item_post_home->path()}}"><img class="img-responsive" src="{{$item_post_home->image}}" alt="" ></a>
                    <span><i class="fa fa-bookmark-o"></i>@php echo date('d/m/Y - H:i:s',strtotime($item_post_home->created_at)); @endphp</span>
                    <span><i class="fa fa-comment-o"></i> 86 Comments</span>
                    <a href="{{$item_post_home->path()}}" class="tittle">{{$item_post_home->title}} </a>
                        <p>@php echo substr($item_post_home->description,0,75) @endphp</p>
                    <a href="{{$item_post_home->path()}}">@lang('display_lang.readmore')</a>
                </article>
            </div>
            @endforeach
            <!-- Blog Post -->
        </div>
    </div>
</section>