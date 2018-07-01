<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('title', 60);
            $table->string('desc');
            $table->string('type', 4);
            $table->integer('responsible')->unsigned();
            $table->string('commision', 4);
            $table->dateTime('time');
            $table->string('location', 20);

            $table->foreign('responsible')->references('scout_id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('concerned', function (Blueprint $table) {
            $table->unsignedInteger('scout_id');
            $table->unsignedInteger('event_id');
            $table->primary(array('scout_id', 'event_id'));
            $table->foreign('scout_id')->references('scout_id')->on('captains')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('event_id')->references('event_id')->on('events')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('activitytags');
        Schema::dropIfExists('concerned');
        Schema::dropIfExists('activities');
    }
}
