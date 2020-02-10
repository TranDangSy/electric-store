<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
