<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
		$table->increments('user_id');
		$table->string('user_first_name',50);
        $table->string('user_last_name',50)->nullable();
		$table->string('user_email',50);
		$table->string('user_fb_id',50)->nullable();
		$table->string('password',70);	
		$table->date('birthdate');	
		$table->string('gender',6);
		$table->string('user_remember_token',70)->nullable();
		$table->string('user_access_token',70)->nullable();
		$table->string('user_mobile_no',15);
		$table->string('user_address',255)->nullable();
		$table->string('user_profile_pic',255);
		$table->longText('user_description');
		$table->string('confirmation_code',90);
		$table->integer('confirmed');
		$table->integer('customer');
		$table->integer('vendor');
		$table->integer('tutor');
		$table->integer('user_location')->foreign('user_location')->references('location_id')->on('location');
		$table->Timestamps();
 		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
