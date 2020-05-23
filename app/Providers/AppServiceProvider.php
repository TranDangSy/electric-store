<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
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
        $data['categories'] = Category::where('status', 1)->get();
        $data['brands'] = Brand::where('status', 1)->get();
        view()->share($data);

        Schema::defaultStringLength(191);
    }
}
