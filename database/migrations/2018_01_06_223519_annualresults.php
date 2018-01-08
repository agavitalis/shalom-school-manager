<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Annualresults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annualresults', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('username');//that is the reg number 
            $table->string('class');
            $table->string('level');
            $table->string('session');
            $table->string('subject');
            $table->string('first_term_score')->default(0);
            $table->string('second_term_score')->default(0);
            $table->string('third_term_score')->default(0);
            $table->string('total')->default(0);
            $table->string('average')->default(0); 
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
        Schema::dropIfExists('annualresults');
    }
}
