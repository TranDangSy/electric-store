<?php
use App\Product;
use App\Brand;
use App\Category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function () 
{
    $products = Product::paginate(6);
    $brands = Brand::all();
    $categories = Category::all();

    return view('home.index',compact('products', 'brands', 'categories'));
});

Route::get('create','AdminController@create');
Route::post('create','AdminController@store')->name('create');

Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin')->name('admin/login');

Route::post('admin/logout','AdminController@logout');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){

    Route::get('/',function(){
        return view('admin.home.index');
    });

    Route::resources(['users' => 'AdminController']);

    Route::resources(['brands' => 'BrandController']);

    Route::resources(['category' => 'CategoryController']);

    Route::resources(['products' => 'ProductController']);
});