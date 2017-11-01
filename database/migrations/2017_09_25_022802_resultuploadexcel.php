<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Resultuploadexcel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('resultuploadexcel', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');


            $table->string('class');
            $table->string('term');
            $table->string('level');
            $table->string('session');
           
            $table->string('subject');
            $table->string('continious_accessment')->default(0);
            $table->string('test')->default(0);
            $table->string('total')->default(0);
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
        Schema::dropIfExists('resultuploadexcel');
    }
}
