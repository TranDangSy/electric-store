<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class, 10)->create();
    }
}
