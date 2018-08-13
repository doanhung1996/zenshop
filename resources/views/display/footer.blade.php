<section class="shipping-info" style="margin-bottom: 2px;">
    <div class="container">
        <ul>
            <!-- Free Shipping -->
            <li>
                <div class="media-left"> <i class="flaticon-delivery-truck-1"></i> </div>
                <div class="media-body">
                    <h5>@lang('display_lang.free_shipping')</h5>
                    <span>@lang('display_lang.on_order_over')</span></div>
            </li>
            <!-- Money Return -->
            <li>
                <div class="media-left"> <i class="flaticon-arrows"></i> </div>
                <div class="media-body">
                    <h5>@lang('display_lang.money_return')</h5>
                    <span>@lang('display_lang.money_return_30')</span></div>
            </li>
            <!-- Support 24/7 -->
            <li>
                <div class="media-left"> <i class="flaticon-operator"></i> </div>
                <div class="media-body">
                    <h5>@lang('display_lang.support_24_7')</h5>
                    <span>@lang('display_lang.hotline')</span></div>
            </li>
            <!-- Safe Payment -->
            <li>
                <div class="media-left"> <i class="flaticon-business"></i> </div>
                <div class="media-body">
                    <h5>@lang('display_lang.safe_payment')</h5>
                    <span>@lang('display_lang.safe_payment_1')</span></div>
            </li>
        </ul>
    </div>
</section>

<!-- Newslatter -->
<div class="newslatter newslatter-ie">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3> <i class="fa fa-envelope-o"></i>@lang('display_lang.email_subscribe')<small>@lang('display_lang.sale')</small></h3>
            </div>
            <div class="col-md-5">
                <form action="{{route('email.customer.store')}}" method="post">
                    @csrf()
                    <input type="email" name="email" placeholder="@lang('display_lang.enter_email')" required>
                    <button type="submit">@lang('display_lang.subscribe') !</button>
                </form>
            </div>
            <div class="col-md-3">
                <h3> <i class="fa fa-phone"></i>@lang('display_lang.hotline')<small>@lang('display_lang.support_24_7')</small></h3>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Content -->
<!-- Footer -->
<footer>
    <div class="container">

        <!-- Footer Upside Links -->
        <div class="foot-link">
            <ul>
                <li><a href="{{route('page','ve-chung-toi')}}">@lang('display_lang.about_us')</a></li>
                <li><a href="#."> Customer Service </a></li>
                <li><a href="#."> Privacy Policy </a></li>
                <li><a href="#."> Site Map </a></li>
                <li><a href="#."> Search Terms </a></li>
                <li><a href="#."> Advanced Search </a></li>
                <li><a href="#."> Orders and Returns </a></li>
                <li><a href="#."> Contact Us</a></li>
            </ul>
        </div>
        <div class="row">

            <!-- Contact -->
            <div class="col-md-3">
                <h4>@lang('display_lang.contact_us')</h4>
                <p>@lang('display_lang.address'): @lang('display_lang.address_contact')</p>
                <p>@lang('display_lang.phone'): @lang('display_lang.phone_contact')</p>
                <p>@lang('display_lang.email'): @lang('display_lang.email_contact')</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/zenzen1996"><i class="fa fa-facebook"></i></a>
                    <a href="#."><i class="fa fa-twitter"></i></a>
                    <a href="#."><i class="fa fa-linkedin"></i></a>
                    <a href="#."><i class="fa fa-pinterest"></i></a>
                    <a href="#."><i class="fa fa-instagram"></i></a>
                    <a href="#."><i class="fa fa-google"></i></a>
                </div>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h4>Sản Phẩm</h4>
                    <ul class="links-footer">
                        @foreach($category_product_footer as $item_category_product_footer)
                            <li><a href="{{route('product.category',$item_category_product_footer->slug)}}"> {{$item_category_product_footer->title}}</a></li>
                        @endforeach
                    </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-2">
                <h4>Bài Viết</h4>
                <ul class="links-footer">
                    @foreach($category_post_footer as $item_category_post_footer)
                        <li><a href="{{route('post.category',$item_category_post_footer->slug)}}"> {{$item_category_post_footer->title}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-2">
                <h4>Hình Thức</h4>
                <ul class="links-footer">
                    <li><a href="#.">Shipping & Returns</a></li>
                    <li><a href="#."> Secure Shopping</a></li>
                    <li><a href="#."> International Shipping</a></li>
                    <li><a href="#."> Affiliates</a></li>
                    <li><a href="#."> Contact </a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="col-md-3">
                <h4>@lang('display_lang.fanpage')</h4>
                <div class="fb-page" data-href="https://www.facebook.com/zenzen9696/" data-height="250px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/zenzen9696/" class="fb-xfbml-parse-ignore">
                        <a href="https://www.facebook.com/zenzen9696/">
                            Zen
                        </a>
                    </blockquote>
                </div>
                {{--<img src="{{asset('public/images/footer-add.jpg')}}" alt="" > --}}
            </div>
        </div>
    </div>
</footer>

<!-- Rights -->
<div class="rights">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Copyright © 2018-@php echo date('Y',strtotime('now'));@endphp <a href="{{route('home')}}" class="ri-li">@lang('display_lang.shop')</a> @lang('display_lang.developer')</p>
            </div>
            <div class="col-sm-6 text-right"> <img src="{{asset('public/images/img-pay.png')}}" alt=""><img src="{{asset('public/images/visa-card.jpg')}}" alt=""> </div>
        </div>
    </div>
</div>

<!-- End Footer -->

<!-- GO TO TOP  -->
<a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a>
<!-- GO TO TOP End -->
</div>
<!-- End Page Wrapper -->

<!-- JavaScripts -->
<script src="{{asset('public/js/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/js/vendors/wow.min.js')}}"></script>
<script src="{{asset('public/js/vendors/bootstrap.min.js')}}"></script>
<script src="{{asset('public/js/vendors/own-menu.js')}}"></script>
<script src="{{asset('public/js/vendors/jquery.sticky.js')}}"></script>
<script src="{{asset('public/js/vendors/modernizr.js')}}"></script>
<script src="{{asset('public/js/vendors/owl.carousel.min.js')}}"></script>

<script src="{{asset('public/fancybox/fb/jquery.fancybox.js')}}"></script>
<script src="{{asset('public/fancybox/fb/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('public/fancybox/fb/jquery.fancybox-buttons.js')}}"></script>
<script src="{{asset('public/fancybox/fb/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('public/fancybox/fb/jquery.fancybox-thumbs.js')}}"></script>
<script src="{{asset('public/fancybox/fb/jquery.mousewheel.pack.js')}}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.t.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/rs-plugin/js/jquery.tp.min.js')}}"></script>
<script src="{{asset('public/js/main.js')}}"></script>
<script type="text/javascript">
    /* ==========================================================================
        countdown timer
    ========================================================================== */
    (function($) {
        "use strict";
        $('.countdown').downCount({
            date: '12/12/2018 12:00:00' // M/D/Y
        });
    })(jQuery);
</script>
<div class="gift cta-fixed m-hidden" id='delete-class' data-toggle="modal" data-target="#modal-register">
    <svg class="svg-inline--fa fa-gift fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="gift" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M488 192h-64.512C438.72 175.003 448 152.566 448 128c0-52.935-43.065-96-96-96-41.997 0-68.742 20.693-95.992 54.15C226.671 50.192 199.613 32 160 32c-52.935 0-96 43.065-96 96 0 24.566 9.28 47.003 24.512 64H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h8v112c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V320h8c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zm-208-32c24-56 55.324-64 72-64 17.645 0 32 14.355 32 32s-14.355 32-32 32h-72zM160 96c16.676 0 48 8 72 64h-72c-17.645 0-32-14.355-32-32s14.355-32 32-32zm48 128h96v184c0 13.255-10.745 24-24 24h-48c-13.255 0-24-10.745-24-24V224z"></path></svg><!-- <i class="fas fa-gift"></i> -->
    <p><font size="2"><b style="font-size: 17px;">Mua Hàng Ngay</b></font><br><font size="2">Để nhận được những ưu đãi hấp dẫn !</font></p>
</div>
<style>
    .gift.cta-fixed {
        /* left: 270px; */
    }

    .gift {
    }

    .cta-fixed {
        position: fixed;
        background: #00a5af;
        color: white;
        width: auto;
        padding: 10px 24px 5px 8px;
        border-radius: 30px;
        bottom: 15px;
        left: 20px;
        box-shadow: 0 0 25px rgba(0,0,0,.25);
        z-index: 99;
        cursor: pointer;
        /*animation: pulse 2s ease-out;*/
        /*animation-iteration-count: infinite;*/
    }
    @-webkit-keyframes pulse {
        0% {
            box-shadow: 0 0 0px #eed894;

        }
        50% {
            box-shadow: 0 0 35px #eed894;
        }
        100% {
            box-shadow: 0 0 0px #eed894;
        }
    }


    .cta-fixed a {
        text-decoration: none!important;
        color: inherit;
    }



    .hotline svg {
    }

    .cta-fixed svg {
        /* font-size: 12px; */
        color: #abb4be;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 50%;
        width: 36px!important;
        height: 36px;
        line-height: 36px;
        display: inline-block;
        text-align: center;
        color: #ffffff;
        padding: 7px;
        margin-top: 3px;
    }

    .cta-fixed p {
        display: inline-block;
        margin-bottom: 0;
        vertical-align: top;
        margin: 0;
        color: white;
        margin-left: 8px;
    }

    .cta-fixed strong {
        color: white;
        font-weight: 700;
        background: #f41a1d;
        border-radius: 25px;
        padding: 2px 8px;
        font-size: 18px;
    }
</style>
<div id="deleteCalling">
    <a href="tel: 096.126.5896" id="calling" class="delete-class-calling" class="tooltip-enable" data-toggle="tooltip" data-placement="left" title="Hotline: 096.126.5896">
        <i class="Phone is-animating"></i>
        <span class="tooltip">096.126.5896</span>
    </a>
</div>

<style>
    #calling {
        right: 36px;
        bottom: 56px;
        position: fixed;
        z-index: 999;
        margin: auto;
        width: 72px;
        height: 72px;
        display: block;
        text-decoration: none;
        transition: all .15s ease-out;
    }

    #calling .tooltip {
        background: #27bdb1;
        opacity: 1;
        right: 110%;
        width: 130px;
        padding: 12px;
        text-align: center;
        border-radius: 8px;
        color: white;
        box-shadow: 0 12px 24px rgba(1, 96, 174, 0.2);
        top: 16px;
        transition: all .15s ease-out;
    }

    #calling:hover .tooltip {
        /* opacity: 1; */
        /* right: 110%; */
    }

    .Phone {
        position: relative;
        display: block;
        margin: 0;
        width: 1em;
        height: 1em;
        line-height: 1em;
        font-size: 72px;
        text-align: center;
        background-color: #27bdb1;
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+0,41921f+0,86c83c+100 */
        background: rgb(30, 87, 153);
        /* Old browsers */
        background: -moz-linear-gradient(-45deg, rgba(30, 87, 153, 1) 0%, rgba(65, 146, 31, 1) 0%, rgba(134, 200, 60, 1) 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(-45deg, rgb(39, 189, 177) 0%, rgb(39, 189, 177) 0%, rgb(39, 189, 177) 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(135deg, rgb(39, 189, 177) 0%, rgb(39, 189, 177) 0%, rgb(39, 189, 177) 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#86c83c', GradientType=1);
        /* IE6-9 fallback on horizontal gradient */
        border-radius: 0.5em;
        border: 4px solid white;
        box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        -webkit-transform: translate3d(0, 0, 0) scale(1);
        transform: translate3d(0, 0, 0) scale(1);
    }

    .Phone::before,
    .Phone::after {
        position: absolute;
        content: "";
    }

    .Phone::before {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 100%;
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0) scale(0);
        transform: translate3d(0, 0, 0) scale(0);
    }

    .Phone::after {
        width: 100%;
        height: 100%;
        background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTYuNiAxMC44YzEuNCAyLjggMy44IDUuMSA2LjYgNi42bDIuMi0yLjJjLjMtLjMuNy0uNCAxLS4yIDEuMS40IDIuMy42IDMuNi42LjUgMCAxIC40IDEgMVYyMGMwIC41LS41IDEtMSAxLTkuNCAwLTE3LTcuNi0xNy0xNyAwLS42LjQtMSAxLTFoMy41Yy41IDAgMSAuNCAxIDEgMCAxLjIuMiAyLjUuNiAzLjYuMS40IDAgLjctLjIgMWwtMi4zIDIuMnoiIGZpbGw9IiNmZmZmZmYiLz48L3N2Zz4=);
        background-position: center;
        background-repeat: no-repeat;
        background-size: 50% auto;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
        top: 0;
        left: 0;
    }

    .Phone.is-animating {
        -webkit-animation: phone-outer 3000ms infinite;
        animation: phone-outer 3000ms infinite;
    }

    .Phone.is-animating::before {
        -webkit-animation: phone-inner 3000ms infinite;
        animation: phone-inner 3000ms infinite;
    }

    .Phone.is-animating::after {
        -webkit-animation: phone-icon 3000ms infinite;
        animation: phone-icon 3000ms infinite;
    }

    @-webkit-keyframes phone-outer {
        0% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        33.3333% {
            -webkit-transform: translate3d(0, 0, 0) scale(1.1);
            transform: translate3d(0, 0, 0) scale(1.1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0.1), 0em 0.05em 0.1em rgba(0, 0, 0, 0.5);
        }
        66.6666% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0.5em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
    }

    @keyframes phone-outer {
        0% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        33.3333% {
            -webkit-transform: translate3d(0, 0, 0) scale(1.1);
            transform: translate3d(0, 0, 0) scale(1.1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0.1), 0em 0.05em 0.1em rgba(0, 0, 0, 0.5);
        }
        66.6666% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0.5em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
        100% {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1);
            box-shadow: 0 0 0 0em rgba(52, 152, 219, 0), 0em 0.05em 0.1em rgba(0, 0, 0, 0.2);
        }
    }

    @-webkit-keyframes phone-inner {
        0% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        33.3333% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0.9);
            transform: translate3d(0, 0, 0) scale(0.9);
        }
        66.6666% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
    }

    @keyframes phone-inner {
        0% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        33.3333% {
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) scale(0.9);
            transform: translate3d(0, 0, 0) scale(0.9);
        }
        66.6666% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
        100% {
            opacity: 0;
            -webkit-transform: translate3d(0, 0, 0) scale(0);
            transform: translate3d(0, 0, 0) scale(0);
        }
    }

    @-webkit-keyframes phone-icon {
        0% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
        2% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        4% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        6% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        8% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        10% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        12% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        14% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        16% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        18% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        20% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        22% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        24% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        26% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        28% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        30% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        32% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        34% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        36% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        38% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        40% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        42% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        44% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        46% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
    }

    @keyframes phone-icon {
        0% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
        2% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        4% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        6% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        8% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        10% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        12% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        14% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        16% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        18% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        20% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        22% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        24% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        26% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        28% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        30% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        32% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        34% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        36% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        38% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        40% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        42% {
            -webkit-transform: translate3d(0.01em, 0, 0);
            transform: translate3d(0.01em, 0, 0);
        }
        44% {
            -webkit-transform: translate3d(-0.01em, 0, 0);
            transform: translate3d(-0.01em, 0, 0);
        }
        46% {
            -webkit-transform: translate3d(0em, 0, 0);
            transform: translate3d(0em, 0, 0);
        }
    }
</style>
</body>

<!-- Mirrored from event-theme.com/themes/html/smarttech/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 03:30:01 GMT -->
</html>
