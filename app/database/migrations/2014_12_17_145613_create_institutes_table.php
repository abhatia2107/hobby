<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('institutes', function($table){
			$table->increments('id');
			$table->string('institute',50);
			$table->integer('institute_user_id')->foreign('institute_user_id')->references('id')->on('users');
			$table->integer('institute_location_id')->foreign('institute_location_id')->references('id')->on('locations');
			$table->string('institute_url',255);
			$table->string('institute_website',255)->nullable();
			$table->string('institute_fblink',255)->nullable();
			$table->string('institute_twitter',255)->nullable();
			$table->longText('institute_description');
			$table->integer('institute_rating');
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
		Schema::drop('institutes');
	}

}
