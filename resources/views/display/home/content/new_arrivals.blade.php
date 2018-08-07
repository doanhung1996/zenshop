<div role="tabpanel" class="tab-pane fade" id="special">
    <!-- Items Slider -->
    <div class="item-col-4">
        @foreach($new_arrival as $item_new_arrival)
        <!-- Product -->
        <div class="product">
            <article><a href="{{$item_new_arrival->path()}}"><img class="img-responsive"  style="max-width: 243px; max-height: 220px;" src="{{$item_new_arrival->image}}" alt="{{$item_new_arrival->title}}" ></a>
                <!-- Content -->
                <span class="sale-tag">-{{$item_new_arrival->product_discount}}%</span>
                <span class="tag">{{$item_new_arrival->product_cat->title}}</span> <a href="{{$item_new_arrival->path()}}" class="tittle">@php echo substr($item_new_arrival->product_name,0,70) @endphp</a>
                <!-- Reviews -->
                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">{{$item_new_arrival->viewer}} @lang('display_lang.view')</span></p>
                <div class="price">{{number_format($item_new_arrival->price_sale)}} đ</div>
                <br>
                <div class="price" style="font-size: 13px; color: #00000061;"><strike>{{number_format($item_new_arrival->price).' đ'}}</strike> -{{$item_new_arrival->product_discount}}%</div>
                <a href="javascript:void(0)" onclick="addtocart({{$item_new_arrival->id}})" id = "item-{{$item_new_arrival->id}}" data_cart="{{$item_new_arrival->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
        </div>
        @endforeach
        <!-- Product -->

    </div>
</div>
