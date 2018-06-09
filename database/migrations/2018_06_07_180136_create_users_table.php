<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //Authentication Requirements

            //User can login using either his id or his email
            $table->integer('scout_id')->unsigned()->unique()->default(1234567891);
            $table->string('email')->nullable()->default(null)->unique();
            $table->string('password');

            $table->rememberToken();

            $table->timestamps();

            $table->foreign('scout_id')->references('scout_id')->on('captains')->onDelete('cascade');
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
