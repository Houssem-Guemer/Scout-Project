<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->integer('scout_id')->unsigned()->unique();
            $table->char('unit_name', 4);
            $table->char('stage', 4);
            $table->tinyInteger('sixfold_num', 2);

            $table->foreign('scout_id')->references('assurance_num')->on('scouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
