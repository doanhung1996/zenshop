<div role="tabpanel" class="tab-pane fade" id="on-sal">
    <!-- Items Slider -->
    <div class="item-col-4">
        @foreach($hot_sale as $item_hot_sale)
        <!-- Product -->
        <div class="product">
            <article><a href="{{$item_hot_sale->path()}}"><img class="img-responsive" style="max-width: 243px; min-width: 243px; min-height: 243px; max-height: 220px;" src="{{$item_hot_sale->image}}" alt="" ></a>
                <!-- Content -->
                <span class="sale-tag">{{$item_hot_sale->product_discount}}%</span>
                <span class="tag">{{$item_hot_sale->product_cat->title}}</span> <a href="{{$item_hot_sale->path()}}" class="tittle">@php echo substr($item_hot_sale->product_name,0,50) @endphp</a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                <div class="price">{{number_format($item_hot_sale->price).'đ'}}</div>
                <a href="javascript:void(0)" onclick="addtocart({{$item_hot_sale->id}})" id = "item-{{$item_hot_sale->id}}" data_cart="{{$item_hot_sale->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
        </div>
        @endforeach
        <!-- Product -->

    </div>
</div>