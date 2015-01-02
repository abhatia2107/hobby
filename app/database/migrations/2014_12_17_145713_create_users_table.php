<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
		$table->increments('id');
		$table->string('user_first_name',50);
        $table->string('user_last_name',50)->nullable();
		$table->string('user_email',50);
		$table->string('user_contact_no',15);
		$table->string('user_password',70);	
		$table->integer('user_location_id')->foreign('user_location_id')->references('id')->on('locations');
		$table->string('user_fb_id',50)->nullable();
		$table->date('user_birthdate')->nullable();	
		$table->string('user_gender',6)->nullable();
		$table->string('remember_token',255)->nullable();
		$table->string('user_facebook_access_token',70)->nullable();
		$table->string('user_confirmation_code',90);
		$table->boolean('user_confirmed');
		$table->string('user_csrf_token',90);
		$table->timestamps();
 		});
 		//user profile photo would be store as user_id.jpg so no need for separate column.
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
