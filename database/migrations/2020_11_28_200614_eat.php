<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Eat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eat', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('cost');
            $table->smallinteger('weight');
            $table->boolean('carousel')->nullable();
            $table->integer('cat_id');
            $table->string('image', 50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('eat');
    }
}
