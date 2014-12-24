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
			$table->increments("id");
			$table->longText('comment')->nullable();
			$table->integer('comment_user_id')->foreign('comment_user_id')->references('id')->on('users');
			$table->integer('comment_institute_id')->foreign('comment_institute_id')->references('id')->on('institutes');
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
