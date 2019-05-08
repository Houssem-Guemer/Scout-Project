<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterScouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scouts', function (Blueprint $table) {
            $table->string('latin_fname', 30);
            $table->string('latin_lname', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scouts', function (Blueprint $table) {
            $table->dropColumn('latin_fname');
            $table->dropColumn('latin_lname');
        });
    }
}
