<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class SetupCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return  void
	 */
	public function up()
	{
		// Creates the users table
		Schema::create('country', function(Blueprint $table)
		{		    
		    $table->increments('id');
		    $table->string('iso', 3)->nullable();
		    $table->string('name', 255)->nullable();
		    $table->string('nicename', 255)->nullable();
		    $table->string('iso3', 255)->nullable();
		    $table->string('numcode', 255)->nullable();
		    $table->string('phonecode', 3)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return  void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

}
