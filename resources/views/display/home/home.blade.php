@extends('display.index')
@section('content')
<div class="big-nsv">
    <div class="container">
        <ul class="nav" role="tablist">
            <li><a href="#"><i class="flaticon-computer"></i> TV & Audios </a></li>
            <li><a href="#"><i class="flaticon-smartphone"></i>Smartphones </a></li>
            <li><a href="#"><i class="flaticon-laptop"></i>Desk & Laptop </a></li>
            <li><a href="#"><i class="flaticon-gamepad-1"></i>Game Console </a></li>
            <li><a href="#"><i class="flaticon-computer-1"></i>Watches </a></li>
            <li><a href="#"><i class="flaticon-keyboard"></i>Accessories </a></li>
        </ul>
    </div>
</div>
<!-- Slid Sec -->
<section class="slid-sec with-bg-wide" >
    <!-- Main Slider Start -->
    <div class="tp-banner-container">
        <div class="tp-banner-full">
            <ul>
                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('public/images/trans-bg.png')}}"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-80"
                         data-speed="800"
                         data-start="800"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:24px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">Find the right washer for you </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-40"
                         data-speed="800"
                         data-start="1000"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         style="z-index: 6; font-size:36px; color:#f12a43; font-weight:800; white-space: nowrap;">Activewash™ G129</div>

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="10"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">$550.00 </div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="100"
                         data-y="bottom" data-voffset="0"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 9;"><img src="{{asset('public/images/slide-item-4-1.png')}}" alt="" > </div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="100"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 8;"><a href="#." class="btn-round big">Shop Now</a> </div>
                </li>

                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('public/images/trans-bg.png')}}"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-80"
                         data-speed="800"
                         data-start="800"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:24px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">High Quality VR Glasses </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-40"
                         data-speed="800"
                         data-start="1000"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         style="z-index: 6; font-size:36px; color:#f12a43; font-weight:800; white-space: nowrap;">3D Daydream View</div>

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="10"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">$550.00 </div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="0"
                         data-y="center" data-voffset="0"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 9;"><img src="{{asset('public/images/slide-item-4-2.png')}}" alt="" > </div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="100"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 8;"><a href="#." class="btn-round big">Shop Now</a> </div>
                </li>

                <!-- SLIDE  -->
                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                    <!-- MAIN IMAGE -->
                    <img src="{{asset('public/images/trans-bg.png')}}"  alt="slider"  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat">

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-80"
                         data-speed="800"
                         data-start="800"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:24px; font-weight:500; color:#888888;  max-width: auto; max-height: auto; white-space: nowrap;">Wireless speaker that fills your home with music. </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="-40"
                         data-speed="800"
                         data-start="1000"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         style="z-index: 6; font-size:36px; color:#f12a43; font-weight:800; white-space: nowrap;">Speaker M5 Audio</div>

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="10"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-splitin="chars"
                         data-splitout="none"
                         data-elementdelay="0.03"
                         data-endelementdelay="0.4"
                         data-endspeed="300"
                         style="z-index: 5; font-size:36px; font-weight:800; color:#000;  max-width: auto; max-height: auto; white-space: nowrap;">$550.00 </div>
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfl tp-resizeme"
                         data-x="left" data-hoffset="100"
                         data-y="center" data-voffset="25"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 9;"><img src="{{asset('public/images/slide-item-4-3.png')}}" alt="" > </div>

                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption lfb tp-resizeme"
                         data-x="left" data-hoffset="600"
                         data-y="center" data-voffset="100"
                         data-speed="800"
                         data-start="1300"
                         data-easing="Power3.easeInOut"
                         data-elementdelay="0.1"
                         data-endelementdelay="0.1"
                         data-endspeed="300"
                         data-scrolloffset="0"
                         style="z-index: 8;"><a href="#." class="btn-round big">Shop Now</a> </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- Content -->
<div id="content">

    <!-- HOT DEAL -->

    <!-- Tab Section -->
    <section class="featur-tabs padding-top-60 padding-bottom-30">
        <div class="container">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-bars margin-bottom-40" role="tablist">
                <li role="presentation" class="active"><a href="#featur" aria-controls="featur" role="tab" data-toggle="tab">Featured</a></li>
                <li role="presentation"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">New arrivals</a></li>
                <li role="presentation"><a href="#on-sal" aria-controls="on-sal" role="tab" data-toggle="tab">Hot sale</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Featured -->
                <div role="tabpanel" class="tab-pane active fade in" id="featur">
                    <!-- Items Slider -->

                    <div class="singl-slide with-nav">
                        <div class="item-col-4">
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-1.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 </div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-2.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                    <!-- Content -->
                                    <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 <span>$200.00</span></div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-3.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-4.jpg')}}" alt="" > <span class="new-tag">New</span>

                                    <!-- Content -->
                                    <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-5.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-6.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                    <!-- Content -->
                                    <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 <span>$200.00</span></div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-7.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

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

                        <div class="item-col-4">
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-1.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 </div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>
                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-2.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                    <!-- Content -->
                                    <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 <span>$200.00</span></div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-3.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-4.jpg')}}" alt="" > <span class="new-tag">New</span>

                                    <!-- Content -->
                                    <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-5.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-6.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                    <!-- Content -->
                                    <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00 <span>$200.00</span></div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

                            <!-- Product -->
                            <div class="product">
                                <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-7.jpg')}}" alt="" >
                                    <!-- Content -->
                                    <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                    <!-- Reviews -->
                                    <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                    <div class="price">$350.00</div>
                                    <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                            </div>

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


                </div>

                <!-- Special -->
                <div role="tabpanel" class="tab-pane fade" id="special">
                    <!-- Items Slider -->
                    <div class="item-col-4">

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-11.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00 </div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-9.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                <!-- Content -->
                                <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00 <span>$200.00</span></div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-8.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-7.jpg')}}" alt="" > <span class="new-tag">New</span>

                                <!-- Content -->
                                <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-6.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

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

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-7.jpg')}}" alt="" > <span class="new-tag">New</span>

                                <!-- Content -->
                                <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-10.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>
                    </div>
                </div>

                <!-- on sale -->
                <div role="tabpanel" class="tab-pane fade" id="on-sal">
                    <!-- Items Slider -->
                    <div class="item-col-4">

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-3.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00 </div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-1.jpg')}}" alt="" > <span class="sale-tag">-25%</span>

                                <!-- Content -->
                                <span class="tag">Tablets</span> <a href="#." class="tittle">Mp3 Sumergible Deportivo Slim Con 8GB</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00 <span>$200.00</span></div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-2.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-5.jpg')}}" alt="" > <span class="new-tag">New</span>

                                <!-- Content -->
                                <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-4.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-8.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Reloj Inteligente Smart Watch M26 Touch Bluetooh </a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-5.jpg')}}" alt="" > <span class="new-tag">New</span>

                                <!-- Content -->
                                <span class="tag">Accessories</span> <a href="#." class="tittle">Teclado Inalambrico Bluetooth Con Air Mouse</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>

                        <!-- Product -->
                        <div class="product">
                            <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-11.jpg')}}" alt="" >
                                <!-- Content -->
                                <span class="tag">Appliances</span> <a href="#." class="tittle">Funda Para Ebook 7" 128GB full HD</a>
                                <!-- Reviews -->
                                <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="margin-left-10">5 Review(s)</span></p>
                                <div class="price">$350.00</div>
                                <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients img -->
    <section class="light-gry-bg clients-img">
        <div class="container">
            <ul>
                <li><img src="{{asset('public/images/c-img-1.png')}}" alt="" ></li>
                <li><img src="{{asset('public/images/c-img-2.png')}}" alt="" ></li>
                <li><img src="{{asset('public/images/c-img-3.png')}}" alt="" ></li>
                <li><img src="{{asset('public/images/c-img-4.png')}}" alt="" ></li>
                <li><img src="{{asset('public/images/c-img-5.png')}}" alt="" ></li>
            </ul>
        </div>
    </section>

    <!-- Weekly Featured -->
    <section class="padding-top-60 padding-bottom-60">
        <div class="container">

            <!-- heading -->
            <div class="heading">
                <h2>Top Selling Products</h2>
                <hr>
            </div>
            <!-- Items Slider -->
            <div class="item-slide-5 with-nav">
                <!-- Product -->
                <div class="product">
                    <article> <img class="img-responsive" src="{{asset('public/images/item-img-1-1.jpg')}}" alt="" >
                        <!-- Content -->
                        <span class="tag">Latop</span> <a href="#." class="tittle">Laptop Alienware 15 i7 Perfect For Playing Game</a>
                        <!-- Reviews -->
                        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="margin-left-10">5 Review(s)</span></p>
                        <div class="price">$350.00 </div>
                        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
                </div>
                <!-- Product -->
            </div>
        </div>
    </section>

    <!-- Top Selling Week -->
    <section class="padding-top-0 padding-bottom-60">
        <div class="container">

            <!-- heading -->
            <div class="heading">
                <h2>From our Blog</h2>
                <hr>
            </div>
            <div id="blog-slide" class="with-nav">

                <!-- Blog Post -->
                <div class="blog-post">
                    <article> <img class="img-responsive" src="{{asset('public/images/blog-img-1.jpg')}}" alt="" > <span><i class="fa fa-bookmark-o"></i> 25 Dec, 2017</span> <span><i class="fa fa-comment-o"></i> 86 Comments</span> <a href="#." class="tittle">It’s why there’s nothing else like Mac. </a>
                        <p>Etiam porttitor ante non tellus pulvinar, non vehicula lorem fermentum. Nulla vitae efficitur mi [...] </p>
                        <a href="#.">Readmore</a>
                    </article>
                </div>

                <!-- Blog Post -->
                <div class="blog-post">
                    <article> <img class="img-responsive" src="{{asset('public/images/blog-img-2.jpg')}}" alt="" > <span><i class="fa fa-bookmark-o"></i> 25 Dec, 2017</span> <span><i class="fa fa-comment-o"></i> 86 Comments</span> <a href="#." class="tittle">Get the power to take your business to the
                            next level. </a>
                        <p>Etiam porttitor ante non tellus pulvinar, non vehicula lorem fermentum. Nulla vitae efficitur mi [...] </p>
                        <a href="#.">Readmore</a>
                    </article>
                </div>

                <!-- Blog Post -->
                <div class="blog-post">
                    <article> <img class="img-responsive" src="{{asset('public/images/blog-img-3.jpg')}}" alt="" > <span><i class="fa fa-bookmark-o"></i> 25 Dec, 2017</span> <span><i class="fa fa-comment-o"></i> 86 Comments</span> <a href="#." class="tittle">It’s why there’s nothing else like Mac. </a>
                        <p>Etiam porttitor ante non tellus pulvinar, non vehicula lorem fermentum. Nulla vitae efficitur mi [...] </p>
                        <a href="#.">Readmore</a>
                    </article>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End Content -->
@endsection('content')