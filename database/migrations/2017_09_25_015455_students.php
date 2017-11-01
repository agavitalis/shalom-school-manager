<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');
            $table->string('class');
            $table->string('house');
            $table->string('level');
            $table->string('session');
            $table->string('term');
            $table->string('subject');
            $table->string('subject_teacher')->nullable();
            $table->string('continious_accessment')->nullable();
            $table->string('test')->nullable();
            $table->string('total')->nullable();
            $table->string('grade')->nullable(); 
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
        Schema::dropIfExists('students');
    }
}
