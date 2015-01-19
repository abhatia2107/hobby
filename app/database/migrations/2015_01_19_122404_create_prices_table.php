<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('price_batch_id')->foreign('price_batch_id')->references('id')->on('batches');
			$table->integer('price');
			$table->boolean('price_session_month');
			$table->integer('price_total_no_of_session');
			$table->integer('price_total_no_of_month');
			$table->integer('price_no_of_classes_in_week');
			$table->boolean('price_class_on_monday');
			$table->boolean('price_class_on_tuesday');
			$table->boolean('price_class_on_wednesday');
			$table->boolean('price_class_on_thursday');
			$table->boolean('price_class_on_friday');
			$table->boolean('price_class_on_saturday');
			$table->boolean('price_class_on_sunday');
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
		Schema::drop('prices');
	}

}
