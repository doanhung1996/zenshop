<div role="tabpanel" class="tab-pane active fade in" id="featur">
    <!-- Items Slider -->

    <div class="singl-slide with-nav">
        <div class="item-col-4">
            <!-- Product -->
            @foreach($featured as $item_featured)
                <div class="product">
                    <article><a href="{{$item_featured->path()}}"><img class="img-responsive" style="max-width: 243px; min-width: 243px; min-height: 220px; max-height: 220px;" src="{{$item_featured->image}}" alt="" ></a>
                        <!-- Content -->
                        <span class="sale-tag">{{$item_featured->product_discount}}%</span>
                        <span class="tag">{{$item_featured->product_cat->title}}</span> <a href="{{$item_featured->path()}}" class="tittle">@php echo substr($item_featured->product_name,0,50) @endphp</a>
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <div class="price">{{number_format($item_featured->price).'đ'}}</div>
                        <a href="javascript:void(0)" onclick="addtocart({{$item_featured->id}})" id = "item-{{$item_featured->id}}" data_cart="{{$item_featured->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
                <!-- Product -->
            @endforeach
        </div>

        <div class="item-col-4">
            <!-- Product -->
            @foreach($featured as $item_featured)
                <div class="product">
                    <article><a href="{{$item_featured->path()}}"><img class="img-responsive" style="max-width: 243px; max-height: 220px;" src="{{$item_featured->image}}" alt="" ></a>
                        <!-- Content -->
                        <span class="sale-tag">{{$item_featured->product_discount}}%</span>
                        <span class="tag">{{$item_featured->product_cat->title}}</span> <a href="{{$item_featured->path()}}" class="tittle">{{$item_featured->product_name}}</a>
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <div class="price">{{number_format($item_featured->price).'đ'}}</div>
                        <a href="javascript:void(0)" onclick="addtocart({{$item_featured->id}})" id = "item-{{$item_featured->id}}" data_cart="{{$item_featured->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
                <!-- Product -->
            @endforeach
        </div>
    </div>
</div>
