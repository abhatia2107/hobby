<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

batch CreateBatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('batch', function($table){
			$table->increments('batch_id');
			$table->string('batch_title',50);
			$table->integer('batch_category_id')->foreign('batch_category_id')->references('category_id')->on('category');
			$table->integer('batch_subcategory_id')->foreign('batch_subcategory_id')->references('subcategory_id')->on('subcategory');
			$table->longText('batch_accomplishment')->nullable();
			$table->integer('batch_institute_id')->foreign('batch_institute_id')->references('institute_id')->on('institute');
			$table->date('batch_start_date');
			$table->date('batch_end_date');
			$table->time('batch_start_time');
			$table->time('batch_end_time');
			$table->integer('batch_venue_id')->foreign('batch_venue_id')->references('venue_id')->on('batch');
			$table->integer('batch_difficulty_level');
			$table->integer('batch_age_group');
			$table->integer('batch_gender_group');
			$table->integer('batch_price');
			$table->integer('batch_recurring');
			$table->boolean('batch_approved');
			$table->integer('batch_no_of_classes_in_week');
			$table->integer('batch_trial');
			$table->string('batch_comment')->nullable();
			$table->string('batch_tagline',40)->nullable();
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
		Schema::drop('batch');
	}

}
