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
		Schema::create('batches', function($table){
			$table->increments('id');
			$table->string('batch',50);
			$table->integer('batch_category_id')->foreign('batch_category_id')->references('id')->on('categories');
			$table->integer('batch_subcategory_id')->foreign('batch_subcategory_id')->references('id')->on('subcategories');
			$table->longText('batch_accomplishment')->nullable();
			$table->integer('batch_institute_id')->foreign('batch_institute_id')->references('id')->on('institutes');
			$table->date('batch_start_date')->nullable();
			$table->date('batch_end_date')->nullable();
			$table->time('batch_start_time')->nullable();
			$table->time('batch_end_time')->nullable();
			$table->integer('batch_venue_id')->foreign('batch_venue_id')->references('id')->on('venues');
			$table->integer('batch_difficulty_level')->default(0);
			$table->integer('batch_age_group')->default(0);
			$table->integer('batch_gender_group')->default(0);
			$table->integer('batch_price')->nullable();
			$table->integer('batch_recurring')->default(0)->nullable();
			$table->boolean('batch_approved')->default(0);
			$table->integer('batch_no_of_classes_in_week');
			$table->boolean('batch_class_on_monday');
			$table->boolean('batch_class_on_tuesday');
			$table->boolean('batch_class_on_wednesday');
			$table->boolean('batch_class_on_thursday');
			$table->boolean('batch_class_on_friday');
			$table->boolean('batch_class_on_saturday');
			$table->boolean('batch_class_on_sunday');
			$table->integer('batch_trial')->default(0);
			$table->integer('batch_view')->default(0);
			$table->string('batch_comment')->nullable();
			$table->string('batch_tagline',40)->nullable();
			$table->boolean('batch_photo')->default(0);
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
		Schema::drop('batches');
	}

}
