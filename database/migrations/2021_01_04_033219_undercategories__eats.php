<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UndercategoriesEats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('undercategories_eats', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('undercategory_id'); 
            $table->unsignedBigInteger('eat_id');  
            $table->foreign('undercategory_id')->references('id')->on('undercategories');
            $table->foreign('eat_id')->references('id')->on('eat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
