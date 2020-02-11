<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder
{
    public function run()
    {
        $brand = new Brand();
        $brand->name = 'kiwi';
        $brand->content = 'abc';
        $brand->image = 'admin_asset/img/user1.jpg';
        $brand->address = 'Nam Dinh';
        $brand->status = 1;
        $brand->save();

        factory(Brand::class, 5)->create();
    }
}
