<?php

namespace App\Providers;

use App\Models\Admin\Menu_item;
use App\Models\Admin\Menu_type;
use App\Models\Admin\Post_cat;
use App\Models\Admin\Product_cat;
use Cache;
use Cart;
use Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(
            'inc.select', function ($view) {
            $view->with('parent_cat',Post_cat::where('parent_id', 0)->get());
        });
//        view()->composer(
//            'display.header', function ($view) {
//                $header_home=Cache::remember('header_home', 0, function(){
//                $product_multi_cat = new Product_cat();
//                $a='ok';
//                $product_cat=Product_cat::with('user','childs')->get();
//                return $product_multi_cat->product_multi_category($product_cat);
//            });
//            $view->with('header_home',compact('header_home','a'));
//        });
        view()->composer(
            'display.header', function ($view) {
                $category_product_header=Cache::remember('category_product_header', 1440, function(){
                    $header_id=Menu_type::where('name','Header')->first()->id;
                  return  $category_product=Menu_item::where('type','product')->where('menu_type_id',$header_id)->where('parent_id',0)->with('childs')->get();
            });
                $category_post_header=Cache::remember('category_post_header', 1440, function(){
                    $header_id=Menu_type::where('name','Header')->first()->id;
                    return  $category_post_header=Menu_item::where('type','post')->where('menu_type_id',$header_id)->where('parent_id',0)->with('childs')->get();
            });
                $category_page_header=Cache::remember('category_page_header', 1440, function(){
                    $header_id=Menu_type::where('name','Header')->first()->id;
                    return  $category_page_header=Menu_item::where('type','page')->where('menu_type_id',$header_id)->where('parent_id',0)->get();
            });
            $view->with('category_product_header',$category_product_header);
            $view->with('category_post_header',$category_post_header);
            $view->with('category_page_header',$category_page_header);
        });
        view()->composer('display.footer',function($view){
            $category_product_footer=Cache::remember('category_product_footer', 1440, function(){
                $footer_id=Menu_type::where('name','Footer')->first()->id;
                return  $category_product_footer=Menu_item::where('type','product')->where('menu_type_id',$footer_id)->where('parent_id',0)->get();
            });
            $category_post_footer=Cache::remember('category_post_footer', 1440, function(){
                $footer_id=Menu_type::where('name','Footer')->first()->id;
                return  $category_product_footer=Menu_item::where('type','post')->where('menu_type_id',$footer_id)->where('parent_id',0)->get();
            });
            $category_page_footer=Cache::remember('category_page_footer', 1440, function(){
                $footer_id=Menu_type::where('name','Footer')->first()->id;
                return  $category_page_footer=Menu_item::where('type','page')->where('menu_type_id',$footer_id)->where('parent_id',0)->get();
            });
            $category_static_footer=Cache::remember('category_static_footer', 1440, function(){
                $footer_id=Menu_type::where('name','Footer')->first()->id;
                return  $category_static_footer=Menu_item::where('type','static')->where('menu_type_id',$footer_id)->where('parent_id',0)->get();
            });
            $view->with('category_product_footer',$category_product_footer);
            $view->with('category_post_footer',$category_post_footer);
            $view->with('category_page_footer',$category_page_footer);
            $view->with('category_static_footer',$category_static_footer);
        });
        view()->composer(
            'display.header', function ($view) {
            $data_cart_count=count(Cart::content());
            $qty = Cart::count();
            $total =  Cart::total(0);
            $data_cart=Cart::content()->take(2);
            $view->with(['qty'=>$qty,'total'=>$total,'data_cart'=>$data_cart,'data_cart_count'=>$data_cart_count]);
        });
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {

            return Hash::check($value, current($parameters));

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
