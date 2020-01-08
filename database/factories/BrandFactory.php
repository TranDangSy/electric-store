<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text,
        'image' => 'admin_asset/img/user1.jpg',
        'address' => $faker->address,
        'status' => 1,
    ];
});
