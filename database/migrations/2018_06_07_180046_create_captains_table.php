<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaptainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('captains', function (Blueprint $table) {
            $table->integer('scout_id')->unsigned()->unique();
            $table->char('role', 4);
            $table->char('unit', 4)->nullable();

            $table->foreign('scout_id')->references('assurance_num')->on('scouts')->oDelete('cascade');
            $table->foreign('unit')->references('unit_id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('captains');
    }
}
