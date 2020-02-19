<?php

use App\Product;
use App\Brand;
use App\Category;

Route::get('/', function () {
    $products = Product::paginate(6);

    return view('home.index', compact('products'));
});

Route::get('product/{id}/{slug}.html', function ($id) {
    $product = Product::find($id);

    return view('home.detai', compact('product'));
});
Route::group(['prefix'=>'cart'], function(){
    Route::get('/','CartController@getShowCart');
	Route::get('add/{id}','CartController@getAddCart');
    Route::get('delete/{id}','CartController@getDeleteCart');
    Route::get('update','CartController@getUpdateCart');
});

Route::get('create', 'AdminController@create');
Route::post('create', 'AdminController@store')->name('create');

Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login', 'AdminController@postLogin')->name('admin/login');

Route::post('admin/logout', 'AdminController@logout');

Route::get('/checkout', 'CartController@getCheckOut');
Route::post('/checkout', 'CartController@postCheckOut');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::get('/', function () {
        return view('admin.home.index');
    });

    Route::resources(['users' => 'AdminController']);

    Route::resources(['brands' => 'BrandController']);

    Route::resources(['category' => 'CategoryController']);

    Route::resources(['products' => 'ProductController']);

    Route::resources(['customers' => 'CustomerController']);

    Route::resources(['bills' => 'BillController']);

    Route::post('bills/updatebill/{id}', 'BillController@updatebill');
});