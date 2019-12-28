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
            $table->integer('quantity');
            $table->integer('total_price');
            $table->unsignedInteger('bill_id');
            $table->timestamps();

            $table->foreign('bill_id')
                ->references('id')
                ->on('bills')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
