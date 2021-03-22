<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EatPathEat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eat_path_eat', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('eat_id'); 
            $table->unsignedBigInteger('path_eat_id');  
            $table->foreign('eat_id')->references('id')->on('eat');
            $table->foreign('path_eat_id')->references('id')->on('path_eat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('eat_path_eat');
    }
}
