<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Classes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('classes', function($table){
			$table->increments('class_id');
			$table->string('class_title',50);
			$table->string('class_type',50);
			$table->string('class_subtype',50);
			$table->integer('class_tutor')->foreign('class_tutor')->references('user_id')->on('users');
			$table->longText('class_description');
			$table->integer('class_vendor')->foreign('class_vendor')->references('user_id')->on('users');
			$table->timestamp('class_startTimestamp');
			$table->timestamp('class_endTimestamp');
			$table->string('class_thumbnail',255)->nullable();
			$table->string('class_banner',255)->nullable();
			$table->integer('class_rating')->nullable();
			$table->string('class_url',255);
			$table->string('class_website',255)->nullable();
			$table->string('class_fblink',255)->nullable();
			$table->string('class_twitter',255)->nullable();
			$table->string('class_address',255);
			$table->string('class_location',50)->foreign('class_location')->references('location_id')->on('location');
			$table->string('class_contact_no',20);
			$table->integer('class_price');
			$table->string('class_latitude',50);//nullable()
			$table->string('class_longitude',50);//nullable()
			$table->string('class_tagline',40);
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
		Schema::drop('classes');
	}

}
