<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scouts', function (Blueprint $table) {
            $table->increments('assurance_num');
            $table->string('email')->unique();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->date('date_of_birth')->default('1996-01-01');
            $table->string('place_of_birth');
            $table->date('membership_date');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scouts');
    }
}
