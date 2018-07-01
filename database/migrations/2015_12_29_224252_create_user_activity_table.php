<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->string('ip_address', 45);
            $table->string('latitude', 255);
            $table->string('longtude', 255);
            $table->text('user_agent');
            $table->timestamp('created_at');			
        });

        Schema::table('user_activity', function(Blueprint $table) {
            $table->foreign('user_id')
                ->references('scout_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_activity', function(Blueprint $table) {
            $table->dropForeign('user_activity_user_id_foreign');
        });

        Schema::drop('user_activity');
    }
}
