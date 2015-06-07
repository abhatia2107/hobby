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
			$table->integer('batch_user_id')->foreign('batch_user_id')->references('id')->on('users');
			$table->integer('batch_institute_id')->foreign('batch_institute_id')->references('id')->on('institutes');
			$table->integer('batch_venue_id')->foreign('batch_venue_id')->references('id')->on('venues');
			$table->longText('batch_accomplishment')->nullable();
			$table->integer('batch_difficulty_level')->default(0);
			$table->integer('batch_age_group')->default(0);
			$table->integer('batch_gender_group')->default(0);
			$table->integer('batch_single_price')->nullable();
			$table->integer('batch_recurring')->default(0)->nullable();
			$table->boolean('batch_approved')->default(0);
			$table->integer('batch_trial')->default(0);
			$table->integer('batch_credit')->default(0);
			$table->integer('batch_view')->default(0);
			$table->string('batch_comment')->nullable();
			$table->string('batch_tagline',40)->nullable();
			$table->boolean('batch_photo')->default(0);
			$table->time('weekday_start_time');
			$table->time('weekday_end_time');
			$table->time('sunday_start_time')->nullable();
			$table->time('sunday_end_time')->nullable();
			$table->boolean('shower_room')->default(0);
			$table->boolean('steam')->default(0);
			$table->boolean('air_conditioning')->default(0);
			$table->boolean('locker_room')->default(0);
			$table->boolean('cafe')->default(0);
			$table->boolean('changing_room')->default(0);
			$table->boolean('miscellaneous2')->default(0);
			$table->boolean('miscellaneous3')->default(0);
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
