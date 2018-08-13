<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Str;


    Route::get('/admin',function (){
        return view('errors.404');
    });
    //DISPLAY HOME
    Route::get('/','Display\Home\HomeController@index');
    Route::get('home.html','Display\Home\HomeController@index')->name('home');
//DISPLAY ACOUNT
    Route::get('login.html','Auth\LoginController@showLoginForm')->name('login.account');
    Route::post('login','Auth\LoginController@login')->name('login');
    Route::post('logout','Auth\LoginController@logout')->name('logout');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset.html','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset','Auth\ResetPasswordController@reset')->name('request.password');
    Route::get('password/reset/{token}/{email}.html','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::get('register.html','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register','Auth\RegisterController@register')->name('register.account');
    Route::get('information/account','Auth\InformationController@account')->name('information.account');
    Route::post('information/update/{user}','Auth\InformationController@update')->name('information.update');
    Route::view('information/update','auth.information_success')->name('information.update.success');

    //    Route::get('information/edit','Auth\InformationController@edit')->name('information.edit');
//DISPLAY Hello Mail Customer
//Route::get('verifie/{code}', 'Auth\RegisterController@verifie')->name('mail.verifie');

//DISPLAY PAGE
    Route::get('page/{slug}','Display\Page\PageController@show')->name('page');
//DISPLAY POST
    Route::get('post/{category}','Display\Post\PostController@category')->name('post.category');
    Route::get('post/{category}/{slug}','Display\Post\PostController@index')->name('post.display');
    Route::get('post/{category}/{slug}/{parent_slug}','Display\Post\PostController@show')->name('post.display.show')->middleware('view.post.count');
//DISPLAY PRODUCT
    Route::get('product/search','Display\Product\ProductController@search')->name('product.search');
    Route::get('product/{category}','Display\Product\ProductController@category')->name('product.category');
    Route::get('product/{category}/{slug}','Display\Product\ProductController@index')->name('product.display');
    Route::get('product/{category}/{slug}/{parent_slug}','Display\Product\ProductController@show')->name('product.display.show')->middleware('view.count');

//DISPLAY CART
    Route::get('cart/add','Display\Cart\CartController@add')->name('cart.add');
    Route::post('cart/store','Display\Cart\CartController@store')->name('cart.store');
    Route::get('cart/detail','Display\Cart\CartController@index')->name('cart.detail');
    Route::get('cart/content_cart','Display\Cart\CartController@content_cart')->name('cart.content_cart');
    Route::get('cart/change_cart','Display\Cart\CartController@change_cart')->name('cart.change_cart');
    Route::post('cart/delete','Display\Cart\CartController@delete')->name('cart.delete');
    Route::get('cart/delivery','Display\Cart\CartController@delivery')->name('cart.delivery');
    Route::post('cart/delivery/get_city','Display\Cart\CartController@get_city')->name('cart.delivery.get_city');
    Route::post('cart/delivery','Display\Cart\CartController@delivery')->name('cart.delivery.change');
    Route::post('cart/add/delivery','Display\Cart\CartController@add_delivery')->name('cart.delivery.add');
    Route::post('cart/update','Display\Cart\CartController@update_qty')->name('cart.update');
    Route::get('cart/confirm','Display\Cart\CartController@confirm')->name('cart.confirm');
    Route::post('cart/confirm/success','Display\Cart\CartController@confirm_success')->name('cart.confirm_success');
    Route::view('cart/confirm/success','display.cart.success_cart')->name('cart.confirm_sc');
    //Add email customer
    Route::post('email/customer/store','Display\Email\Email_customerController@store')->name('email.customer.store')->middleware('throttle:2,1');
    //Search Category -Product
    Route::get('search','Display\Home\HomeController@search')->name('search');
    //Search Category -Post
    Route::get('search/post','Display\Post\PostController@search')->name('search.post');

    Route::get('/email/success',function (){
        return view('auth.passwords.reset_success');
    });

    Route::get('ok',function (){
        return $cart=Cart::content();
    });
    Route::get('testproduct', function(){
//        $product= new \App\Models\Admin\Product();
//        $p1 = $product->where('id', 2)->first();
        return $p2 = \App\Models\Admin\Product::where(['id' => 2])->first();

        dd($p1, $p2);
    });

    Route::get('cart',function (){
        Cart::add('293ak', 'Product 2', 1, 9.99);
    });
    Route::get('xoa', function(){
//        return Cart::tax();
//        return Cart::count();
//        echo '<pre>';
        return Cart::destroy();
//        foreach (Cart::content() as $item){
//            echo $item->model->image;
//        };
//
//            return array_slice(Cart::content()->toArray(),0,2);
    });
    Route::get('updatcard/{id}', function($id){
       Cart::update($id, 5);

    });
    Route::get('/test123', function(){
        dispatch(new App\Jobs\TestJob());
    });