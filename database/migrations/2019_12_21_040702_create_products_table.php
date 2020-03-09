<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('decription');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('pay')->default(1)->index();
            $table->integer('discount');
            $table->integer('hot')->default(1);
            $table->integer('status')->default(1);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
