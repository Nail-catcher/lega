<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('street')->nullable();
            $table->smallinteger('home')->nullable();
            $table->smallinteger('apartment')->nullable();
            $table->tinyinteger('entrance')->nullable();
            $table->tinyinteger('floor')->nullable();
            $table->datetime('order_time')->nullable();
            $table->integer('cashback')->nullable();
            $table->tinyinteger('person')->nullable();
            $table->smallinteger('how_money')->nullable();
            $table->mediuminteger('points_pay')->nullable();            
            $table->mediuminteger('user_id')->nullable();            
            $table->tinyinteger('status')->nullable();
            $table->tinyinteger('shipping')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('orders');
    }
}
