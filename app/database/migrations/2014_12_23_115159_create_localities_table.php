<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocalitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('localities', function(Blueprint $table)
		{
			$table->increments('locality_id');
			$table->integer('locality_location_id')->foreign('locality_location_id')->references('location_id')->on('Location');
			$table->string("locality",255);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('localities');
	}

}
