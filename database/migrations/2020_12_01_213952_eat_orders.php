<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EatOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_eat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eat_id'); 
            $table->unsignedBigInteger('order_id'); 
            $table->tinyinteger('how_many');
            $table->foreign('eat_id')->references('id')->on('eat');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('order_eat');
    }
}
