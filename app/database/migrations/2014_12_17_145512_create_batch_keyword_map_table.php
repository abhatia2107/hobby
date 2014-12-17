<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchKeywordMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch_keyword_map', function($table){
		$table->integer('batch_id')->foreign('batch_id')->references('batch_id')->on('batch');
		$table->integer('keyword_id')->foreign('keyword_id')->references('keyword_id')->on('keyword');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batch_keyword_map');
	}

}
