<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'detail' => $faker->text,
        'image' => 'admin_asset/img/user1.jpg',
        'keyword' => 'BAS',
        'status' => 1,
    ];
});
