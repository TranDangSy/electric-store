<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Brand;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        view()->share($data);

        Schema::defaultStringLength(191);
    }
}
