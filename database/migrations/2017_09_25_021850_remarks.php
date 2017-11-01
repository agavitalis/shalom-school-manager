<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Remarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('remarks', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('remark')->nullable();
            $table->string('remark_by')->nullable();
            $table->string('remark_for')->nullable();
            $table->string('class')->nullable();
            $table->string('house')->nullable();
            $table->string('level')->nullable();
            $table->string('session')->nullable();
            $table->string('term')->nullable();             
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
        Schema::dropIfExists('remarks');
    }
}
