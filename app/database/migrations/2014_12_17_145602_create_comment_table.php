<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function($table){
		$table->integer('user_id')->foreign('user_id')->references('user_id')->on('user');
		$table->integer('institute_id')->foreign('institute_id')->references('institute_id')->on('institute');
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
		Schema::drop('comment');
	}

}
