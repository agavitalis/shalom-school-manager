<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('results', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');

            $table->string('class');
            $table->string('term');
            $table->string('level');
            $table->string('session');
          
            $table->string('subject');
            $table->string('subject_teacher')->default(0);
            $table->string('teacher_username')->default(0);
            $table->string('uploaded_by')->default(0);

            $table->string('continous_accessment')->default(0);
            $table->string('test')->default(0);
            $table->string('exam')->default(0);
            $table->string('total')->default(0);
            $table->string('grade')->default(0);
            $table->string('subject_position')->default(0);
            $table->string('class_position')->default(0); 
             $table->string('approved')->default(0); 
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
        Schema::dropIfExists('results');
    }
}
