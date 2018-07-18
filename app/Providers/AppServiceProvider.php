<?php

namespace App\Providers;

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
        view()->composer(
            'display.header', function ($view) {
                $header_home=Cache::remember('header_home', 0, function(){
                $product_multi_cat = new Product_cat();
                $product_cat=Product_cat::with('user','childs')->get();
                return $product_multi_cat->product_multi_category($product_cat);
            });
            $view->with('header_home',$header_home);
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
