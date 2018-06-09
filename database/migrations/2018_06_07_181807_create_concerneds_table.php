<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcernedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerned', function (Blueprint $table) {
            $table->unsignedInteger('scout_id');
            $table->unsignedInteger('activity_id');

            $table->foreign('scout_id')->references('scout_id')->on('captains')->onDelete('cascade');
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
        Schema::dropIfExists('concerneds');
    }
}
