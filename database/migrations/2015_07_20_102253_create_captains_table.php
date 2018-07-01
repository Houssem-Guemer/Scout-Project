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
            $table->unsignedInteger('scout_id')->unique();
            $table->string('role', 4);
            $table->string('unit', 4)->nullable()->default(NULL);
            $table->timestamps();

            $table->foreign('scout_id')->references('scout_id')->on('scouts')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('role')->references('name')->on('roles')
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
        Schema::dropIfExists('captains');
    }
}
