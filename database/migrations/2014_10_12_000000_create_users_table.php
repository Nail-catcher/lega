<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');            
            $table->mediuminteger('points_pay')->nullable(); 
            $table->string('street')->nullable();
            $table->smallinteger('home')->nullable();
            $table->smallinteger('apartment')->nullable();
            $table->tinyinteger('entrance')->nullable();
            $table->tinyinteger('floor')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
