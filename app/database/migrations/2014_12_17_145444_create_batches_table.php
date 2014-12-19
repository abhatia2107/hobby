<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Batches', function($table){
			$table->increments('batch_id');
			$table->string('batch',50);
			$table->integer('batch_category_id')->foreign('batch_category_id')->references('category_id')->on('Categories');
			$table->integer('batch_subcategory_id')->foreign('batch_subcategory_id')->references('subcategory_id')->on('Subcategories');
			$table->longText('batch_accomplishment')->nullable();
			$table->integer('batch_institute_id')->foreign('batch_institute_id')->references('institute_id')->on('Institutes');
			$table->date('batch_start_date');
			$table->date('batch_end_date');
			$table->time('batch_start_time');
			$table->time('batch_end_time');
			$table->integer('batch_venue_id')->foreign('batch_venue_id')->references('venue_id')->on('Venues');
			$table->integer('batch_difficulty_level');
			$table->integer('batch_age_group');
			$table->integer('batch_gender_group');
			$table->integer('batch_price');
			$table->boolean('batch_recurring');
			$table->boolean('batch_approved');
			$table->integer('batch_no_of_classes_in_week');
			$table->boolean('batch_class_on_monday');
			$table->boolean('batch_class_on_tuesday');
			$table->boolean('batch_class_on_wednesday');
			$table->boolean('batch_class_on_thursday');
			$table->boolean('batch_class_on_friday');
			$table->boolean('batch_class_on_saturday');
			$table->boolean('batch_class_on_sunday');
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
		Schema::drop('Batches');
	}

}
