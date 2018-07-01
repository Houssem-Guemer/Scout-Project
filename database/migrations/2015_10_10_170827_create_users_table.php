<?php

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
        Schema::create('users', function(Blueprint $table)
        {
            //Credentials
            $table->unsignedInteger('scout_id')->unique();
            $table->string('email', 50)->unique();
            $table->string('password', 255)->nullable();

            //Status
            $table->string('status', 50)->nullable();

            $table->rememberToken();
            $table->timestamps();

            //Foreign Keys
            $table->foreign('scout_id')->references('scout_id')->on('captains')
                  ->onUpdate('cascade')->onDelete('cascade');


			// $table->string('first_name', 255)->nullable();
            // $table->string('last_name', 255)->nullable();
            // $table->string('address')->default('');
            // $table->string('phone', 255)->nullable();
            // $table->string('country', 255)->nullable();
            // $table->string('date_of_birth', 255)->nullable();
            // $table->string('gender', 255)->nullable();
            // $table->string('image')->default('');
            /*
                I'm thinking about linking the facebook account with the user 
                using OAuth.
                @hzerrad
            */
            // $table->string('google', 255)->nullable();
            // $table->string('facebook', 255)->nullable();
            // $table->string('twitter', 255)->nullable();
            // $table->string('linkedin', 255)->nullable();
            // $table->string('skype', 255)->nullable();
            // $table->string('dribbble', 255)->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
