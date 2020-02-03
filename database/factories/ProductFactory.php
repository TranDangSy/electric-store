<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Brand;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug,
        'decription' => $faker->text,
        'image' => '../admin_asset/img/home/shipping.jpg',
        'quantity' => 10,
        'price' => 100000000,
        'discount' => 10,
        'hot' => 1,
        'status' => 1,
        'category_id' => $faker->randomElement(Category::pluck('id')),
        'brand_id' => $faker->randomElement(Brand::pluck('id')),
    ];
});
