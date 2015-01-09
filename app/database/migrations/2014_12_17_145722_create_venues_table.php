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
			$table->increments('id');
			$table->string('venue',50);
			$table->integer('venue_user_id')->foreign('venue_user_id')->references('id')->on('users');
			$table->integer('venue_institute_id')->foreign('venue_institute_id')->references('id')->on('institutes');
			$table->integer('venue_location_id')->foreign('venue_location_id')->references('id')->on('locations');
			$table->integer('venue_locality_id')->foreign('venue_locality_id')->references('id')->on('localities');
			$table->string('venue_address',255);
			$table->string('venue_landmark',50)->nullable();
			$table->string('venue_pincode',6);
			$table->string('venue_email',50);
			$table->string('venue_contact_no',10);
			$table->string('venue_latitude',50)->nullable();
			$table->string('venue_longitude',50)->nullable();
			$table->softDeletes();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at');
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
