<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker) {
    // return [
    //     'name' => 'admin',
    //     'email' => 'admin@gmail.com',
    //     'email_verified_at' => now(),
    //     'password' => Hash::make('123456'),
    //     'gender' => 1,
    //     'phone' => 12121121,
    //     'address' => 'Nam Dinh',
    //     'level' => 1,
    //     'status' => 1,
    //     'remember_token' => Str::random(10),
    // ];
});
