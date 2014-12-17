<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venue',function($table){
		$table->increments('venue_id');
		$table->string('venue_name',50);
		$table->integer('venue_location')->foreign('venue_location')->references('location_id')->on('location');
		$table->string('venue_locality',50)->nullable();
		$table->string('venue_address',255);
		$table->string('venue_landmark',50)->nullable();
		$table->string('venue_pincode',10);
		$table->string('venue_contact_no',10);
		$table->integer('venue_class_id')->foreign('venue_class_id')->references('class_id')->on('class');
		$table->string('venue_latitude',50)->nullable();
		$table->string('venue_longitude',50)->nullable();
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
		Schema::drop('venue');
	}

}
