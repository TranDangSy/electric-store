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
            $table->text('decription');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('popular')->withDefault(1);
            $table->integer('hot');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('categoty_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('band_id')
                ->references('brands')
                ->on('rooms')
                ->onDelete('cascade');
            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
