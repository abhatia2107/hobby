<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institute', function($table){
			$table->increments('institute_id');
			$table->string('institute',50);
			$table->string('institute_location',50)->foreign('institute_location')->references('location_id')->on('location');
			$table->string('institute_url',255);
			$table->string('institute_website',255)->nullable();
			$table->string('institute_fblink',255)->nullable();
			$table->string('institute_twitter',255)->nullable();
			$table->longText('institute_description');
			$table->boolean('institute_approved');
			$table->timestamps();
			//Institute photo would be store as institute_id.jpg so no need for separate column.
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('institute');
	}

}
