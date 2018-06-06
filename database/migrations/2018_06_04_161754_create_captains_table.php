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
            $table->unsignedInteger('scout_id');
            $table->string('role', 3);
            $table->string('unit', 10)->default(null);
            $table->boolean('apr')->default('0');
            $table->timestamps();

            //Foreign Key Constraint
            $table->foreign('scout_id')->references('scout_id')->on('scouts')->onDelete('cascade');
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
