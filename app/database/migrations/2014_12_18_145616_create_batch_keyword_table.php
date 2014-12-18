<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatchKeywordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Batch_Keyword', function($table){
			$table->increments("batch_keyword_id");
			$table->integer('batch_id')->foreign('batch_id')->references('batch_id')->on('Batches');
			$table->integer('keyword_id')->foreign('keyword_id')->references('keyword_id')->on('Keywords');
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
		Schema::drop('Batch_Keyword');
	}

}
