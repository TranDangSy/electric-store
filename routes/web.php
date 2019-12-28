<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function () {
    return view('home.index');
});

Route::get('create','AdminController@create');
Route::post('create','AdminController@store')->name('create');

Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin')->name('admin/login');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){

    Route::get('/',function(){
        return view('admin.widget.index');
    });
});