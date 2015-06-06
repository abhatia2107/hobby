<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('batch_id')->unsigned()->index();
			$table->foreign('batch_id')->references('id')->on('batches');
			$table->integer('user_id')->unsigned()->index()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('email',50);
			$table->string('contact_no',15);
			$table->integer('payment');
			$table->date('booking_date');
			$table->integer('no_of_sessions');
			$table->string('order_id',8);
			$table->integer('promo_id')->unsigned()->nullable();
			$table->foreign('promo_id')->references('id')->on('promos');
			$table->boolean('referral_credit_used');
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
		Schema::drop('bookings');
	}

}
