<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Assignsubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('assignsubjects', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('class')->nullable();
            $table->string('level')->nullable();
             $table->string('session')->nullable();
            $table->string('term')->nullable();
            $table->string('teacher_name')->nullable();
             $table->string('teacher_username')->nullable();
            $table->string('is_coordinator')->nullable();
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
        Schema::dropIfExists('assignsubjects');
    }
}
