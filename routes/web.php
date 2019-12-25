<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function () {
    return view('home.index');
});

Route::get('admin', function () {
    return view('admin.widget.index');
});