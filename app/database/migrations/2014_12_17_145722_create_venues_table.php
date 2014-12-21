<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venues',function($table){
		$table->increments('venue_id');
		$table->string('venue',50);
		$table->integer('venue_location')->foreign('venue_location')->references('location_id')->on('Locations');
		$table->string('venue_locality',50)->nullable();
		$table->string('venue_address',255);
		$table->string('venue_landmark',50)->nullable();
		$table->string('venue_pincode',10);
		$table->string('venue_contact_no',10);
		$table->integer('venue_institute_id')->foreign('venue_institute_id')->references('institute_id')->on('Institutes');
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
		Schema::drop('venues');
	}

}
