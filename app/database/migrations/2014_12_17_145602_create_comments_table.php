<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Comments', function($table){
		$table->integer('user_id')->foreign('user_id')->references('user_id')->on('Users');
		$table->integer('institute_id')->foreign('institute_id')->references('institute_id')->on('Institutes');
		$table->longText('comment')->nullable();
		$table->integer('rating');
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
		Schema::drop('Comments');
	}

}
