<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Position extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');

            $table->string('class');
            $table->string('term');
            $table->string('level');
            $table->string('session');
          
            $table->string('total_no_of_subjects')->default(0);
            $table->string('total_score')->default(0);
            $table->string('average')->default(0);
            $table->string('position')->default(0);
            $table->string('teacher_comment')->default(0);
            $table->string('principal_comment')->default(0);
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
        Schema::dropIfExists('positions');
    }
}
