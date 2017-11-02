<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stdregexcelsheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('stdregexcelsheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();//that is the reg number
            $table->string('gender')->nullable();    
            $table->string('class')->nullable(); 
            $table->string('level')->nullable();
            $table->string('session')->nullable();
            $table->string('term')->nullable();
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
         Schema::dropIfExists('stdregexcelsheets');
    
    }
}
