<?php

Route::get('/', 'FrontendController@index');

Route::get('product/{id}/{slug}.html', 'FrontendController@getProduct');

Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::get('brand/{id}/{slug}.html','FrontendController@getBrand');

Route::get('/search/name', 'FrontendController@searchByName');

Route::group(['prefix'=>'cart'], function(){
    Route::get('/','CartController@getShowCart');
	Route::get('add/{id}','CartController@getAddCart');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');
});

Route::get('register', 'AdminController@register');
Route::post('register', 'AdminController@store_register')->name('register');

Route::group(['prefix'=>'wishlist'], function(){
    Route::get('/','CartController@getshowWishList')->name('wishlist');
	Route::get('add/{id}','CartController@getAddWishlist');
    Route::get('delete/{id}','CartController@getDeleteWishlist');
});

Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login', 'AdminController@postLogin')->name('admin/login');

Route::post('admin/logout', 'AdminController@logout');

Route::get('/checkout', 'CartController@getCheckOut');
Route::post('/checkout', 'CartController@postCheckOut');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::get('/', 'FrontendController@getIndexAdmin');

    Route::resources(['users' => 'AdminController']);

    Route::resources(['brands' => 'BrandController']);

    Route::resources(['category' => 'CategoryController']);

    Route::resources(['products' => 'ProductController']);

    Route::resources(['customers' => 'CustomerController']);

    Route::resources(['bills' => 'BillController']);

    Route::post('bills/updatebill/{id}', 'BillController@updatebill');
});
