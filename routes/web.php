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
    ////ADMIN ACCOUNT
//    Route::get('account/register.html','Admin\Account\AccountController@regiter')->name('account/register');
//    Route::get('account/login.html','Admin\Account\AccountController@login')->name('account/login');
//    Route::get('account/logout.html','Admin\Account\AccountController@logout')->name('account/logout');
//    Route::get('account/update.html','Admin\Account\AccountController@update')->name('account/update');
//    Route::get('account/password/update.html','Admin\Account\AccountController@update_password')->name('account/password/update');

    //ADMIN - PAGE
    Route::get('page/create.html', 'Admin\Page\PageController@create')->name('page.create');
    Route::get('page.html', 'Admin\Page\PageController@index')->name('page');
//ADMIN - POST
    Route::get('post/create.html', 'Admin\Post\PostController@create')->name('post.create');
    Route::get('post.html', 'Admin\Post\PostController@index')->name('post');
    Route::get('post/cat/create.html', 'Admin\Post\PostCatController@create')->name('post.cat.create');
    Route::get('post/cat.html', 'Admin\Post\PostCatController@index')->name('post.cat');
////ADMIN PRODUCT
    Route::get('product/create.html','Admin\Product\ProductController@create')->name('product.create');
    Route::get('product.html','Admin\Product\ProductController@index')->name('product');
    Route::get('product/cat/create.html','Admin\Product\ProductCatController@create')->name('product.cat.create');
    Route::get('product/cat.html','Admin\Product\ProductCatController@index')->name('product.cat');
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
//    Route::get('verifie/{code}', 'Auth\RegisterController@verifie')->name('mail.verifie');
