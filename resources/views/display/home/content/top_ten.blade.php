
<section class="padding-top-60 padding-bottom-60">
    <div class="container">
        <!-- heading -->
        <div class="heading">
            <h2>@lang('display_lang.top_selling')</h2>
            <hr>
        </div>
        <!-- Items Slider -->
        <div class="item-slide-5 with-nav">
            <!-- Product -->
            @foreach($top_ten as $item_top_ten)
                <div class="product">
                    <article><a href="{{$item_top_ten->path()}}"> <img class="img-responsive" style="max-width: 184px; max-height: 167.08px;" src="{{$item_top_ten->image}}" alt="" ></a>
                        <!-- Content -->
                        <span class="sale-tag">{{$item_top_ten->product_discount}}%</span>
                        <span class="tag">{{$item_top_ten->product_cat->title}}</span> <a href="{{$item_top_ten->path()}}" class="tittle">@php echo substr($item_top_ten->product_name,0,40) @endphp</a>
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <div class="price">{{number_format($item_top_ten->price).'đ'}}</div>
                        <a href="javascript:void(0)" onclick="addtocart({{$item_top_ten->id}})" id = "item-{{$item_top_ten->id}}" data_cart="{{$item_top_ten->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
        @endforeach
        <!-- Product -->
        </div>
    </div>
</section>