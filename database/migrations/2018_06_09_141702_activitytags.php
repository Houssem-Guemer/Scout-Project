<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Activitytags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activityTags', function(Blueprint $table){
            $table->integer('activity_id')->unsigned()->unique();
            $table->integer('tag');

            $table->primary(array('activity_id', 'tag'));
            $table->foreign('activity_id')->references('activity_id')->on('activities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
