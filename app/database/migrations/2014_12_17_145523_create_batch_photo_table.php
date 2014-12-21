<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchPhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_photo', function($table){
		$table->increments('batch_photo_id');
		$table->integer('batch_id')->foreign('batch_id')->references('batch_id')->on('Batches');
		$table->integer('photo_id');
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
		Schema::drop('batch_photo');
	}

}