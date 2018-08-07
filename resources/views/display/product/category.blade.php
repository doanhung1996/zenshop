@extends('display.index')
@section('content')
    <!-- Linking -->
    <div class="linking">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><a href="{{route('product.category',$category_product['slug'])}}">{{$category_product['title']}}</a></li>
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
                                    <li>


                                    </li>
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
                                    <li>
                                        <input id="brand10" class="styled" type="checkbox" >
                                        <label for="brand10"> HTC <span>(59)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand11" class="styled" type="checkbox" >
                                        <label for="brand11"> Lenovo <span>(68)</span> </label>
                                    </li>
                                    <li>
                                        <input id="brand12" class="styled" type="checkbox" >
                                        <label for="brand12">Sanyo  (19) </label>
                                    </li>
                                </ul>
                            </div>

                            <!-- Colors -->
                            <h6>Size</h6>
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
                            <div class="sizes">
                                <a href="#.">S</a>
                                <a href="#.">M</a>
                                <a href="#.">L</a>
                                <a href="#.">XL</a>
                            </div>
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
                        <!-- Short List -->
                        <div class="short-lst">
                            <h2>{{$category_product['title']}}</h2>
                            <ul>
                                <!-- Short List -->
                                <li>
                                    <p>Hiển thị {{$category_count}} trong {{$category_count_all}} sản phẩm trong danh mục {{$category_product['title']}} .</p>
                                </li>
                                <!-- Short  -->
                                {{--<li >--}}
                                {{--<select class="selectpicker">--}}
                                {{--<option>Show 12 </option>--}}
                                {{--<option>Show 24 </option>--}}
                                {{--<option>Show 32 </option>--}}
                                {{--</select>--}}
                                {{--</li>--}}
                                {{--<!-- by Default -->--}}
                                {{--<li>--}}
                                {{--<select class="selectpicker">--}}
                                {{--<option>Sort by Default </option>--}}
                                {{--<option>Low to High </option>--}}
                                {{--<option>High to Low </option>--}}
                                {{--</select>--}}
                                {{--</li>--}}

                                {{--<!-- Grid Layer -->--}}
                                {{--<li class="grid-layer"> <a href="#."><i class="fa fa-list margin-right-10"></i></a> <a href="#." class="active"><i class="fa fa-th"></i></a> </li>--}}
                                {{--<li>--}}
                                {{--<!-- Columns -->--}}
                                {{--<select class="selectpicker">--}}
                                {{--<option>4 Columns </option>--}}
                                {{--<option>3 Columns </option>--}}
                                {{--<option>5 Columns</option>--}}
                                {{--</select>--}}
                                {{--</li>--}}
                            </ul>
                        </div>

                        <!-- Items -->
                        <div class="item-col-4">
                            <!-- Product -->
                            @foreach($category_all as $item_category_all)
                                <div class="product">
                                    <article><a href="{{route('product.display.show',[$item_category_all->category->slug,$item_category_all->product_cat->slug,$item_category_all->slug])}}"><img class="img-responsive" style=" min-width: 169.38px; min-height: 169.38px; max-width: 169.38px; max-height: 169.38px;" src="{{asset("$item_category_all->image")}}" alt="" ></a>
                                        <!-- Content -->
                                        <span class="sale-tag">{{$item_category_all->product_discount}}%</span>
                                        <span class="tag">{{$item_category_all->product_cat->title}}</span> <a href="{{route('product.display.show',[$item_category_all->category->slug,$item_category_all->product_cat->slug,$item_category_all->slug])}}" class="tittle">@php echo substr($item_category_all->product_name,0,43)@endphp</a>
                                        <!-- Reviews -->
                                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">{{$item_category_all->viewer}} view(s)</span></p>
                                        <div class="price">{{number_format($item_category_all->price)}}.đ</div>
                                        <a href="javascript:void(0)" onclick="addtocart({{$item_category_all->id}})" id = "item-{{$item_category_all->id}}" data_cart="{{$item_category_all->id}}" class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                                </div>
                            @endforeach
                        <!-- pagination -->
                            {{--
                                                        {{--<ul class="pagination">--}}
                            {{--<li> <a href="#" aria-label="Previous"> <i class="fa fa-angle-left"></i> </a> </li>--}}
                            {{--<li><a class="active" href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li> <a href="#" aria-label="Next"> <i class="fa fa-angle-right"></i> </a> </li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>
                <div class="item-col-3" style="margin-left: 290px">
                    {{$category_all->links('vendor.pagination.pagination')}}
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
                        <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-8.jpg')}}" alt="" > <span class="new-tag">New</span>
                            <!-- Content -->
                            <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                            <!-- Reviews -->
                            <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                            <div class="price">$350.00</div>
                            <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients img -->
        <section class="light-gry-bg clients-img">
            <div class="container">
                <ul>
                    <li><img src="images/c-img-1.png" alt="" ></li>
                    <li><img src="images/c-img-2.png" alt="" ></li>
                    <li><img src="images/c-img-3.png" alt="" ></li>
                    <li><img src="images/c-img-4.png" alt="" ></li>
                    <li><img src="images/c-img-5.png" alt="" ></li>
                </ul>
            </div>
        </section>
    </div>
    <script src="{{asset('public/rs-plugin/js/respond.min.js')}}"></script>
    <script src="{{asset('public/js/vendors/modernizr.js')}}"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="{{asset('public/js/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/vendors/wow.min.js')}}"></script>
    {{--<script src="{{asset('public/js/vendors/bootstrap.min.js')}}"></script>--}}
    <script src="{{asset('public/js/vendors/own-menu.js')}}"></script>
    <script src="{{asset('public/js/vendors/jquery.sticky.js')}}"></script>
    <script src="{{asset('public/js/vendors/owl.carousel.min.js')}}"></script>

    {{--<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->--}}
    <script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.min.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
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
    {{--<script>--}}
    {{--function addtocart(id) {--}}
    {{--$.ajaxSetup({--}}
    {{--headers: {--}}
    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--}--}}
    {{--});--}}
    {{--$.ajax({--}}
    {{--url: "{{route('cart.add')}}",//TRANG XỬ LÝ .MẶC ĐỊNH LÀ TRANG HIỆN TẠI--}}
    {{--method: 'get', //Post hoặc Get , Mặc định GET--}}
    {{--data: {id: id},//DỮ LIỆU KIỂU ĐỐI TƯỢNG TRONG Javascript--}}
    {{--// processData: true,//Giá Trị TRUE or FALSE . Mặc Định TRUE--}}
    {{--dataType: 'html',//HTML,TEXT,SCRIPT HOẶC JSON,--}}
    {{--success: function (data) {--}}
    {{--$('#home-cart').html(data);--}}
    {{--toastr.success('ok');--}}
    {{--},--}}
    {{--});--}}
    {{--}--}}
    {{--</script>--}}
@endsection()