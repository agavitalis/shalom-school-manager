<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();//that is the reg number
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('UserType');
            $table->string('dateofbirth')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('lga')->nullable();
            $table->string('class')->nullable();
            $table->string('house')->nullable();
            $table->string('level')->nullable();
            $table->string('session')->nullable();
            $table->string('term')->nullable();
            $table->string('skills')->nullable();
            $table->string('intrest')->nullable();
            $table->string('quotes')->nullable();
            $table->string('postsheld')->nullable(); 

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
