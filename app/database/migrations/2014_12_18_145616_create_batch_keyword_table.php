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
		Schema::create('batch_keyword', function($table){
			$table->increments("id");
			$table->integer('batch_id')->foreign('batch_id')->references('batch_id')->on('batches');
			$table->integer('keyword_id')->foreign('keyword_id')->references('keyword_id')->on('keywords');
			$table->softDeletes();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('batch_keyword');
	}

}
