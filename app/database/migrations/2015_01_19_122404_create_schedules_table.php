<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('schedule_batch_id')->foreign('schedule_batch_id')->references('id')->on('batches');
			$table->integer('schedule_price');
			$table->boolean('schedule_session_month');
			$table->integer('schedule_number');
			$table->integer('schedule_no_of_classes_in_week');
			$table->date('schedule_start_date')->nullable();
			$table->date('schedule_end_date')->nullable();
			$table->time('schedule_start_time')->nullable();
			$table->time('schedule_end_time')->nullable();
			$table->boolean('schedule_class_on_monday');
			$table->boolean('schedule_class_on_tuesday');
			$table->boolean('schedule_class_on_wednesday');
			$table->boolean('schedule_class_on_thursday');
			$table->boolean('schedule_class_on_friday');
			$table->boolean('schedule_class_on_saturday');
			$table->boolean('schedule_class_on_sunday');
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
		Schema::drop('schedules');
	}

}
