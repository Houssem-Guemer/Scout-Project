<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('receiver_id');
			$table->unsignedInteger('sender_id');
            $table->string('replay_id');
            $table->string('subject');
            $table->string('description');
            $table->string('status',20);
            $table->timestamps();
        });
		
		 Schema::table('messages', function(Blueprint $table) {
            $table->foreign('receiver_id')
                ->references('scout_id')
                ->on('users')
                ->onDelete('cascade');
			 $table->foreign('sender_id')
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
        Schema::drop('messages');
    }
}
