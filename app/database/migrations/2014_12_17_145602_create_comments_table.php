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
		Schema::create('comments', function($table){
		$table->longText('comment')->nullable();
		$table->integer('comment_user_id')->foreign('comment_user_id')->references('user_id')->on('Users');
		$table->integer('comment_institute_id')->foreign('institute_id')->references('institute_id')->on('Institutes');
		$table->integer('comment_rating');
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
		Schema::drop('comments');
	}

}
