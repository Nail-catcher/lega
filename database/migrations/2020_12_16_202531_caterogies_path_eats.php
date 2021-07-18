<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CaterogiesPathEats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('categories_path_eat', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('category_id'); 
            $table->unsignedBigInteger('path_eat_id');  
            $table->foreign('category_id')->references('id')->on('categories');
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
        //
    }
}
