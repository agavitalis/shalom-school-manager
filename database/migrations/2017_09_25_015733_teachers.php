<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Teachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->string('date_of_birth')->nullable();
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
            $table->string('interest')->nullable();
            $table->string('quotes')->nullable();
            $table->string('posts_held')->nullable();
           
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
        Schema::dropIfExists('teachers');
    }
}
