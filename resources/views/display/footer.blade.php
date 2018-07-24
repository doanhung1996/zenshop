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
            <div class="col-sm-6 text-right"> <img src="{{asset('public/images/card-icon.png')}}" alt=""> </div>
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
</body>

<!-- Mirrored from event-theme.com/themes/html/smarttech/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jan 2018 03:30:01 GMT -->
</html>
