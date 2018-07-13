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
Route::group(['prefix' => 'admin'], function (){
    App::setLocale('vi');
    //ADMIN - PAGE cu de dday di . toi sua sau
    Route::get('page/create.html', 'Admin\Page\PageController@create')->name('page.create');
    Route::post('page/create.html', 'Admin\Page\PageController@store')->name('page.store');
    Route::get('page.html', 'Admin\Page\PageController@index')->name('page.list');
    Route::post('page/status.html', 'Admin\Page\PageController@status')->name('page.status');
    Route::get('page/update/{id}.html', 'Admin\Page\PageController@show');
    Route::post('page/update/{id}.html', 'Admin\Page\PageController@update')->name('page.update');
    Route::get('page/search.html', 'Admin\Page\PageController@search')->name('page.search');

    //ADMIN - POST
    Route::get('post/create.html', 'Admin\Post\PostController@create')->name('post.create');
    Route::post('post/create.html', 'Admin\Post\PostController@store')->name('post.store');
    Route::get('post.html', 'Admin\Post\PostController@index')->name('post.index');
    Route::get('post/edit/{post}.html', 'Admin\Post\PostController@edit')->name('post.edit');
    Route::put('post/edit/{post}.html', 'Admin\Post\PostController@update')->name('post.update');
    Route::post('post/status.html', 'Admin\Post\PostController@status')->name('post.status');
    Route::get('post/search.html', 'Admin\Post\PostController@search')->name('post.search');

    //ADMIN - POST CAT
    Route::get('post/cat/index.html', 'Admin\Post\PostCatController@index')->name('post.cat.index');
    Route::get('post/cat/create.html', 'Admin\Post\PostCatController@create')->name('post.cat.create');
    Route::get('post/cat/edit/{cat}.html', 'Admin\Post\PostCatController@edit')->name('post.cat.edit');
    Route::put('post/cat/{cat}.html', 'Admin\Post\PostCatController@update')->name('post.cat.update');
    Route::post('post/cat/create.html', 'Admin\Post\PostCatController@store')->name('post.cat.store');
    Route::post('post/cat/status.html', 'Admin\Post\PostCatController@status')->name('post.cat.status');

    ////ADMIN PRODUCT
    Route::get('product/create.html','Admin\Product\ProductController@create')->name('product.create');
    Route::post('product/create.html','Admin\Product\ProductController@store')->name('product.store');
    Route::get('product.html','Admin\Product\ProductController@index')->name('product');
    Route::post('product/status.html','Admin\Product\ProductController@status')->name('product.status');
    Route::get('product/search.html','Admin\Product\ProductController@search')->name('product.search');
    Route::get('product/update/{product}.html','Admin\Product\ProductController@edit')->name('product.edit');
    Route::post('product/update/{product}.html','Admin\Product\ProductController@update')->name('product.update');


    Route::get('product/cat/create.html','Admin\Product\ProductCatController@create')->name('product.cat.create');
    Route::get('product/cat.html','Admin\Product\ProductCatController@index')->name('product.cat');
    Route::get('product/cat/create.html','Admin\Product\ProductCatController@create')->name('product.cat.create');
    Route::post('product/cat/create.html','Admin\Product\ProductCatController@store')->name('product.cat.store');
    Route::post('product/cat/status.html','Admin\Product\ProductCatController@status')->name('product.cat.status');
    Route::get('product/update/cat/{product}.html','Admin\Product\ProductCatController@edit')->name('product.cat.edit');
    Route::post('product/update/cat/{product_cat}.html','Admin\Product\ProductCatController@update')->name('product.cat.update');
    //////ADMIN SALES
    Route::get('order.html','Admin\Cart\OrderController@index')->name('order');
    Route::get('order/detail.html','Admin\Cart\OrderController@order_detail')->name('order.detail');
    Route::get('customer.html','Admin\Cart\CustomerController@index')->name('customer');
    Route::get('customer/detail.html','Admin\Cart\CustomerController@customer_detail')->name('customer.detail');
    //////ADMIN MENU
    Route::get('menu/type.html','Admin\Menu\MenuTypeController@index')->name('menu.type');
    Route::get('menu/item.html','Admin\Menu\MenuItemController@index')->name('menu.item');
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
//DISPLAY Hello Mail Customer
//Route::get('verifie/{code}', 'Auth\RegisterController@verifie')->name('mail.verifie');

//DISPLAY PAGE
    Route::get('page/{slug}','Display\Page\PageController@show')->name('page');
//DISPLAY POST
    Route::get('post/{category}/{slug}','Display\Post\PostController@index')->name('post.display');
    Route::get('post/{category}/{slug}/{parent_slug}','Display\Post\PostController@show')->name('post.display.show');
//DISPLAY PRODUCT
    Route::get('product/{category}/{slug}','Display\Product\ProductController@index')->name('product.display');
    Route::get('product/{category}/{slug}/{parent_slug}','Display\Product\ProductController@show')->name('product.display.show');
//DISPLAY CART
    Route::get('cart/add','Display\Cart\CartController@add')->name('cart.add');
    Route::post('cart/store','Display\Cart\CartController@store')->name('cart.store');
    Route::get('cart/detail','Display\Cart\CartController@index')->name('cart.detail');
    Route::get('cart/content_cart','Display\Cart\CartController@content_cart')->name('cart.content_cart');
    Route::post('cart/delete','Display\Cart\CartController@delete')->name('cart.delete');
    Route::get('cart/delivery','Display\Cart\CartController@delivery')->name('cart.delivery');
    Route::post('cart/delivery/get_city','Display\Cart\CartController@get_city')->name('cart.delivery.get_city');
    Route::post('cart/delivery','Display\Cart\CartController@delivery')->name('cart.delivery.change');
    Route::post('cart/add/delivery','Display\Cart\CartController@add_delivery')->name('cart.delivery.add');
    Route::post('cart/update','Display\Cart\CartController@update_qty')->name('cart.update');
    Route::get('cart/confirm','Display\Cart\CartController@confirm')->name('cart.confirm');
    Route::post('cart/confirm/success','Display\Cart\CartController@confirm_success')->name('cart.confirm_success');
    Route::view('cart/confirm/success','display.cart.success_cart')->name('cart.confirm_sc');
    Route::get('ok',function (){
        return Cart::content();
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
