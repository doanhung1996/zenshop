<?php
Route::group(['middleware' => 'auth','middleware' => 'isadmin'], function (){
    App::setLocale('vi');
    //ADMIN - PAGE

    Route::get('page/create', 'Admin\Page\PageController@create')->name('page.create');
    Route::post('page/create', 'Admin\Page\PageController@store')->name('page.store');
    Route::get('page', 'Admin\Page\PageController@index')->name('page.list');
    Route::get('page/status/{status}', 'Admin\Page\PageController@page_get_status')->name('page.get.status');
    Route::post('page/status', 'Admin\Page\PageController@status')->name('page.status');
    Route::get('page/update/{id}', 'Admin\Page\PageController@show')->name('page.edit');
    Route::post('page/update/{id}', 'Admin\Page\PageController@update')->name('page.update');
    Route::get('page/search', 'Admin\Page\PageController@search')->name('page.search');

    //ADMIN - POST
    Route::get('post/create', 'Admin\Post\PostController@create')->name('post.create');
    Route::post('post/create', 'Admin\Post\PostController@store')->name('post.store');
    Route::get('post', 'Admin\Post\PostController@index')->name('post.index');
    Route::get('post/edit/{post}', 'Admin\Post\PostController@edit')->name('post.edit');
    Route::put('post/edit/{post}', 'Admin\Post\PostController@update')->name('post.update');
    Route::get('post/status/{status}', 'Admin\Post\PostController@post_get_status')->name('post.get.status');
    Route::post('post/status', 'Admin\Post\PostController@status')->name('post.status');
    Route::get('post/search', 'Admin\Post\PostController@search')->name('post.search');

    //ADMIN - POST CAT
    Route::get('post/cat/index', 'Admin\Post\PostCatController@index')->name('post.cat.index');
    Route::get('post/cat/create', 'Admin\Post\PostCatController@create')->name('post.cat.create');
    Route::get('post/cat/edit/{cat}', 'Admin\Post\PostCatController@edit')->name('post.cat.edit');
    Route::put('post/cat/{cat}', 'Admin\Post\PostCatController@update')->name('post.cat.update');
    Route::post('post/cat/create', 'Admin\Post\PostCatController@store')->name('post.cat.store');
    Route::post('post/cat/status', 'Admin\Post\PostCatController@status')->name('post.cat.status');

    ////ADMIN PRODUCT
    Route::get('product/create','Admin\Product\ProductController@create')->name('product.create');
    Route::post('product/create','Admin\Product\ProductController@store')->name('product.store');
    Route::get('product','Admin\Product\ProductController@index')->name('product');
    Route::get('product/status/{status}','Admin\Product\ProductController@product_get_status')->name('product.get.status');
    Route::post('product/status','Admin\Product\ProductController@status')->name('product.status');
    Route::get('product/search','Admin\Product\ProductController@search')->name('product.search');
    Route::get('product/update/{product}','Admin\Product\ProductController@edit')->name('product.edit');
    Route::post('product/update/{product}','Admin\Product\ProductController@update')->name('product.update');


    Route::get('product/cat/create','Admin\Product\ProductCatController@create')->name('product.cat.create');
    Route::get('product/cat','Admin\Product\ProductCatController@index')->name('product.cat');
    Route::get('product/cat/create','Admin\Product\ProductCatController@create')->name('product.cat.create');
    Route::post('product/cat/create','Admin\Product\ProductCatController@store')->name('product.cat.store');
    Route::post('product/cat/status','Admin\Product\ProductCatController@status')->name('product.cat.status');
    Route::get('product/update/cat/{product}','Admin\Product\ProductCatController@edit')->name('product.cat.edit');
    Route::post('product/update/cat/{product_cat}','Admin\Product\ProductCatController@update')->name('product.cat.update');
    //////ADMIN SALES
    Route::get('order','Admin\Cart\OrderController@index')->name('order');
//    Route::get('order/status/{id}','Admin\Cart\OrderController@order_get_status')->name('order.get.status');
    Route::get('order/search','Admin\Cart\OrderController@search')->name('order.search');
    Route::post('status/order','Admin\Cart\OrderController@status_order')->name('status.order');
    Route::get('order/detail/{id}','Admin\Cart\OrderController@order_detail')->name('order.detail');
    Route::get('delete/order/detail/{id}','Admin\Cart\OrderController@delete_order_detail')->name('delete.order_cart');
    Route::get('update/order/detail','Admin\Cart\OrderController@update_order_detail')->name('update.order_cart');
    Route::get('customer','Admin\Cart\CustomerController@index')->name('customer');
    Route::post('customer/delete','Admin\Cart\CustomerController@delete')->name('customer.delete');
    Route::get('customer/search','Admin\Cart\CustomerController@search')->name('customer.search');
    Route::get('bill/{id}','Admin\Cart\OrderController@bill')->name('bill');
    Route::get('delete/order/detail','Admin\Cart\OrderController@delete')->name('delete.order.detail');

//    Route::get('customer/detail.html','Admin\Cart\CustomerController@customer_detail')->name('customer.detail');
    //// ADMIN SLIDER
    Route::get('slider/create','Admin\Slider\SliderController@create')->name('slider.create');
    Route::post('slider/store','Admin\Slider\SliderController@store')->name('slider.store');
    Route::post('slider/status','Admin\Slider\SliderController@status')->name('slider.status');
    Route::get('slider/update/{slider}','Admin\Slider\SliderController@edit')->name('slider.edit');
    Route::post('slider/update/{slider}','Admin\Slider\SliderController@update')->name('slider.update');
    Route::get('slider/search','Admin\Slider\SliderController@search')->name('slider.search');
    Route::get('slider','Admin\Slider\SliderController@index')->name('slider');
    //////ADMIN ACCOUNT
    Route::get('account','Admin\Account\AccountController@index')->name('account');
//    Route::get('account/{account}','Admin\Account\AccountController@list_account')->name('list.account');
    Route::post('account/status','Admin\Account\AccountController@status')->name('account.status');
    Route::get('account/edit/{id}','Admin\Account\AccountController@edit')->name('account.edit');
    Route::post('account/update/{user}','Admin\Account\AccountController@update')->name('account.update');
    Route::get('account/search','Admin\Account\AccountController@search')->name('account.search');
    Route::get('account/password','Admin\Account\AccountController@password')->name('account.password');
    Route::post('account/password/{user}','Admin\Account\AccountController@change_password')->name('account.change.password');
    // ADMIN METHOD DELIVERY
    Route::get('delivery/create','Admin\MethodDelivery\MethodDeliveryController@create')->name('delivery.create');
    Route::post('delivery/create','Admin\MethodDelivery\MethodDeliveryController@store')->name('delivery.store');
    Route::get('delivery','Admin\MethodDelivery\MethodDeliveryController@index')->name('delivery');
    Route::post('delivery/status','Admin\MethodDelivery\MethodDeliveryController@status')->name('delivery.status');
    Route::get('delivery/edit/{id}','Admin\MethodDelivery\MethodDeliveryController@edit')->name('delivery.edit');
    Route::post('delivery/update/{method_delivery}','Admin\MethodDelivery\MethodDeliveryController@update')->name('delivery.update');
    Route::get('delivery/search','Admin\MethodDelivery\MethodDeliveryController@search')->name('delivery.search');

    //////ADMIN MENU TYPE
    Route::get('menu/type','Admin\Menu\MenuTypeController@index')->name('menu.type');
    Route::post('menu/store','Admin\Menu\MenuTypeController@store')->name('menu.store');
    Route::get('menu/edit/{menu_type}','Admin\Menu\MenuTypeController@edit')->name('menu.edit');
    Route::post('menu/update/{menu_type}','Admin\Menu\MenuTypeController@update')->name('menu.update');
    Route::post('menu/status','Admin\Menu\MenuTypeController@status')->name('menu.status');
    // ADMIN MENU ITEM
    Route::get('menu/item','Admin\Menu\MenuItemController@index')->name('menu.item');
    Route::get('menu/item/get_cat','Admin\Menu\MenuItemController@get_cat')->name('menu.item.cat');
    Route::post('menu/item/store','Admin\Menu\MenuItemController@store')->name('menu.item.store');
    Route::post('menu/item/status','Admin\Menu\MenuItemController@status')->name('menu.item.status');
    Route::get('menu/item/edit/{menu_item}','Admin\Menu\MenuItemController@edit')->name('menu.item.edit');
    Route::post('menu/item/update/{menu_item}','Admin\Menu\MenuItemController@update')->name('menu.item.update');
    //EMAIL MENU
    Route::get('email','Admin\Email\Email_customerController@index')->name('email.store.list');
    Route::get('email/search','Admin\Email\Email_customerController@search')->name('email.search');
    Route::post('email/status','Admin\Email\Email_customerController@status')->name('email.status');
    //Nofication
    Route::get('notification','Admin\Notification\NotificationController@list_notification')->name('notification.list');
    Route::get('notification/delete','Admin\Notification\NotificationController@delete')->name('notification.delete');


});