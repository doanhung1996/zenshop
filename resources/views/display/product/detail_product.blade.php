@extends('display.index')
@section('content')
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('product.category',$check_category->slug)}}">{{$check_category->title}}</a></li>
                <li><a href="{{route('product.display',[$check_category->slug,$check_parent->slug])}}">{{$check_parent->title}}</a></li>
                <li><a href="{{route('product.display.show',[$check_category->slug,$check_parent->slug,$product->slug])}}">{{$product->product_name}}</a></li>
            </ol>
        </div>
    </div>
    <!-- Content -->
    <div id="content">
        <!-- Products -->
        <section class="padding-top-40 padding-bottom-60">
            <div class="container">
                <div class="row">
                    <!-- Shop Side Bar -->
                    <div class="col-md-3">
                        <div class="shop-side-bar">
                            <!-- Categories -->
                            <h6>@lang('display_lang.category')</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    @foreach($category_category as $item_category_category)
                                        <li>
                                            <a href="{{route('product.category',$item_category_category->slug)}}">{{$item_category_category->title}}</a>
                                        </li>
                                    @endforeach
                                    {{--<li>--}}
                                    {{--<input id="cate12" class="styled" type="checkbox" >--}}
                                    {{--<label for="cate12">Office Supplies </label>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>

                            <!-- Categories -->
                            <h6>Price</h6>
                            <!-- PRICE -->
                            <div class="cost-price-content">
                                <div id="price-range" class="price-range"></div>
                                <span id="price-min" class="price-min">20</span>
                                <span id="price-max" class="price-max">80</span>
                                <a href="#." class="btn-round" >Filter</a>
                            </div>
                            <!-- Featured Brands -->
                            <h6>Featured Brands</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    <li>
                                        <input id="brand1" class="styled" type="checkbox" >
                                        <label for="brand1"> Apple <span>(217)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand2" class="styled" type="checkbox" >
                                        <label for="brand2"> Acer <span>(79)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand3" class="styled" type="checkbox" >
                                        <label for="brand3"> Asus <span>(283)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand4" class="styled" type="checkbox" >
                                        <label for="brand4">Samsung <span>(116)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand5" class="styled" type="checkbox" >
                                        <label for="brand5"> LG <span>(29)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand6" class="styled" type="checkbox" >
                                        <label for="brand6"> Electrolux <span>(179)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand7" class="styled" type="checkbox" >
                                        <label for="brand7"> Toshiba <span>(38)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand8" class="styled" type="checkbox" >
                                        <label for="brand8"> Sharp <span>(205)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand9" class="styled" type="checkbox" >
                                        <label for="brand9"> Sony <span>(35)</span> </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Rating -->
                            <h6>Rating</h6>
                            <div class="rating">
                                <ul>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i> <span>(218)</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(178)</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(79)</span></a></li>
                                    <li><a href="#."><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <span>(188)</span></a></li>
                                </ul>
                            </div>

                            <!-- Colors -->
                            <h6>Size</h6>
                            <div class="sizes"> <a href="#.">S</a> <a href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a> </div>

                            <!-- Colors -->
                            <h6>Colors</h6>
                            <div class="checkbox checkbox-primary">
                                <ul>
                                    <li>
                                        <input id="colr1" class="styled" type="checkbox" >
                                        <label for="colr1"> Red <span>(217)</span> </label>
                                    </li>
                                    <li>
                                        <input id="colr2" class="styled" type="checkbox" >
                                        <label for="colr2"> Yellow <span> (179) </span> </label>
                                    </li>
                                    <li>
                                        <input id="colr3" class="styled" type="checkbox" >
                                        <label for="colr3"> Black <span>(79)</span> </label>
                                    </li>
                                    <li>
                                        <input id="colr4" class="styled" type="checkbox" >
                                        <label for="colr4">Blue <span>(283) </span></label>
                                    </li>
                                    <li>
                                        <input id="colr5" class="styled" type="checkbox" >
                                        <label for="colr5"> Grey <span> (116)</span> </label>
                                    </li>
                                    <li>
                                        <input id="colr6" class="styled" type="checkbox" >
                                        <label for="colr6"> Pink<span> (29) </span></label>
                                    </li>
                                    <li>
                                        <input id="colr7" class="styled" type="checkbox" >
                                        <label for="colr7"> White <span> (38)</span> </label>
                                    </li>
                                    <li>
                                        <input id="colr8" class="styled" type="checkbox" >
                                        <label for="colr8">Green <span>(205)</span></label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="col-md-9">
                        <div class="product-detail">
                            <div class="product">
                                <div class="row">
                                    <!-- Slider Thumb -->
                                    <div class="col-xs-5">
                                        <article class="slider-item on-nav">
                                            <div class="thumb-slider">
                                                <ul class="slides">
                                                    <li data-thumb="{{asset($product->image)}}"> <a href="{{asset($product->image)}}" data-lightbox="image"><img src="{{asset($product->image)}}" alt="{{$product->name}}" ></a></li>
                                                    <li data-thumb="{{asset($product->image)}}"> <a href="{{asset($product->image)}}" data-lightbox="image"><img src="{{asset($product->image)}}" alt="{{$product->name}}" ></a></li>
                                                    <li data-thumb="{{asset($product->image)}}"> <a href="{{asset($product->image)}}" data-lightbox="image"><img src="{{asset($product->image)}}" alt="{{$product->name}}" ></a></li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- Item Content -->
                                    <div class="col-xs-7"> <span class="tags">{{$check_parent->title}}</span>
                                        <h5>{{$product->product_name}}</h5>
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">{{$product->viewer}} view(s)</span></p>
                                        <div class="row">
                                            <div class="col-sm-6"><span class="price">@php echo number_format($product->price) @endphp đ</span></div>
                                            <div class="col-sm-6">
                                                <p>Availability: <span class="in-stock">In stock</span></p>
                                            </div>
                                        </div>
                                        <!-- List Details -->
                                        <ul class="bullet-round-list">
                                            {!! $product->detail !!}
                                            {{--<li>Screen: 1920 x 1080 pixels</li>--}}
                                            {{--<li>Processor: 2.5 GHz None</li>--}}
                                            {{--<li>RAM: 8 GB</li>--}}
                                            {{--<li>Hard Drive: Flash memory solid state</li>--}}
                                            {{--<li>Graphics : Intel HD Graphics 520 Integrated</li>--}}
                                            {{--<li>Card Description: Integrated</li>--}}
                                        </ul>
                                        <!-- Colors -->
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <div class="clr"> <span style="background:#068bcd"></span> <span style="background:#d4b174"></span> <span style="background:#333333"></span> </div>
                                            </div>
                                            <!-- Sizes -->
                                            <div class="col-xs-7">
                                                <div class="sizes"> <a href="#.">S</a> <a class="active" href="#.">M</a> <a href="#.">L</a> <a href="#.">XL</a> </div>
                                            </div>
                                        </div>
                                        <!-- Compare Wishlist -->
                                    {{--<ul class="cmp-list">--}}
                                    {{--<li><a href="#."><i class="fa fa-heart"></i> Add to Wishlist</a></li>--}}
                                    {{--<li><a href="#."><i class="fa fa-navicon"></i> Add to Compare</a></li>--}}
                                    {{--<li><a href="#."><i class="fa fa-envelope"></i> Email to a friend</a></li>--}}
                                    {{--</ul>--}}
                                    <!-- Quinty -->
                                        <form method="post" action="{{route('cart.store')}}">
                                            @csrf
                                            <div class="quinty">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="number" name="qty" value="1" >
                                            </div>
                                            <button name="add_cart" class="btn-round" style="padding:10px 20px !important; border: 0px; !important;">@lang('display_lang.add_to_cart')</button>
                                            {{--<a href="#." class="btn-round" style="padding:0 20px !important;"><i class="icon-basket-loaded margin-right-5"></i></a> </div>--}}
                                        </form>
                                    </div>
                                </div>

                                <!-- Details Tab Section-->
                                <div class="item-tabs-sec">

                                    <!-- Nav tabs -->
                                    <ul class="nav" role="tablist">
                                        <li role="presentation" class="active"><a href="#pro-detil"  role="tab" data-toggle="tab">@lang('display_lang.product_detail')</a></li>
                                        {{--<li role="presentation"><a href="#cus-rev"  role="tab" data-toggle="tab">Customer Reviews</a></li>--}}
                                        {{--<li role="presentation"><a href="#ship" role="tab" data-toggle="tab">Shipping & Payment</a></li>--}}
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="pro-detil">
                                            <!-- List Details -->
                                            <ul class="bullet-round-list">
                                                {!! $product->detail !!}
                                            </ul>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Carrier</th>
                                                        <th>Compatibility Rating </th>
                                                        <th>Voice / Text </th>
                                                        <th>Voice / Text </th>
                                                        <th>2G Data </th>
                                                        <th>3G Data </th>
                                                        <th>4G LTE Data </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>AT&T </td>
                                                        <td>Fully Compatible</td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sprint </td>
                                                        <td>No Voice/Text and Partial Data Connection</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Q-Mobile </td>
                                                        <td>Partial Data Connection</td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Verizon Wireless </td>
                                                        <td>No Votice/Text and Partial Data Connection</td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                        <td class="text-center"><i class="fa fa-check"></i></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{--<div role="tabpanel" class="tab-pane fade" id="cus-rev">--}}
                                        {{--ok1--}}
                                        {{--</div>--}}
                                        {{--<div role="tabpanel" class="tab-pane fade" id="ship">--}}
                                        {{--ok2--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>

                            <!-- Related Products -->
                            <section class="padding-top-30 padding-bottom-0">
                                <!-- heading -->
                                <div class="heading">
                                    <h2>@lang('display_lang.related_products')</h2>
                                    <hr>
                                </div>
                                <!-- Items Slider -->
                                <div class="item-slide-4 with-nav">
                                    <!-- Product -->
                                    @foreach($related_products as $item_related_products)
                                        <div class="product">
                                            <article><a href="{{route('product.display.show',[$check_category->slug,$check_parent->slug,$item_related_products->slug])}}"><img class="img-responsive" style="max-width: 169.5px; min-width: 169.5px; max-height:169.5px; min-height: 169.5px; " src="{{asset($item_related_products->image)}}" alt="" ></a>
                                                <span class="sale-tag">{{$item_related_products->product_discount}}%</span>
                                                <!-- Content -->
                                                <span class="tag">{{$check_parent->title}}</span> <a href="{{route('product.display.show',[$check_category->slug,$check_parent->slug,$item_related_products->slug])}}" class="tittle">@php echo substr($item_related_products->product_name,0,40) @endphp</a>
                                                <!-- Reviews -->
                                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">{{$item_related_products->viewer}} view(s)</span></p>
                                                <div class="price"><p>@php echo number_format($item_related_products->price) @endphp .đ</p></div>
                                                <a href="javascript:void(0)" onclick="addtocart({{$item_related_products->id}})" id = "item-{{$item_related_products->id}}" data_cart="{{$item_related_products->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>

                                        </div>
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Your Recently Viewed Items -->
        <section class="padding-bottom-60">
            <div class="container">

                <!-- heading -->
                <div class="heading">
                    <h2>Your Recently Viewed Items</h2>
                    <hr>
                </div>
                <!-- Items Slider -->
                <div class="item-slide-5 with-nav">
                    <!-- Product -->
                    <div class="product">
                        <article> <img class="img-responsive" style="max-width: 184px; min-width: 184px; max-height:184px; min-height: 184px; " src="{{asset('public/images/item-img-1-1.jpg')}}" alt="" >
                            <!-- Content -->
                            <span class="tag"></span> <a href="#." class="tittle"></a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price"></div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{asset('public/js/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/vendors/wow.min.js')}}"></script>
    {{--<script src="{{asset('public/js/vendors/bootstrap.min.js')}}"></script>--}}
    <script src="{{asset('public/js/vendors/own-menu.js')}}"></script>
    <script src="{{asset('public/js/vendors/jquery.sticky.js')}}"></script>
    <script src="{{asset('public/js/vendors/owl.carousel.min.js')}}"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.min.js')}}"></script>
    {{--<script src="{{asset('public/js/main.js')}}"></script>--}}
    <script src="{{asset('public/js/vendors/jquery.nouislider.min.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            //  Price Filter ( noUiSlider Plugin)
            $("#price-range").noUiSlider({
                range: {
                    'min': [ 0 ],
                    'max': [ 1000 ]
                },
                start: [40, 940],
                connect:true,
                serialization:{
                    lower: [
                        $.Link({
                            target: $("#price-min")
                        })
                    ],
                    upper: [
                        $.Link({
                            target: $("#price-max")
                        })
                    ],
                    format: {
                        // Set formatting
                        decimals: 2,
                        prefix: '$'
                    }
                }
            })
        })
    </script>
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
@endsection()