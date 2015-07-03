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
			$table->integer('batch_id')->foreign('batch_id')->references('id')->on('batches');
			$table->integer('user_id')->nullable()->foreign('user_id')->references('id')->on('users');
			$table->string('name',50);
			$table->string('email',50);
			$table->string('contact_no',15);
			$table->integer('payment');
			$table->date('booking_date');
			$table->integer('no_of_sessions');
			$table->string('order_id',8);
			$table->boolean('reviewed')->default(0);
			$table->boolean('favorite_used')->default(0);
			$table->boolean('trial')->default(0);
			$table->string('order_status',10)->nullable();
			$table->string('promo_code',25);
			$table->integer('wallet_amount')->default(0);
			$table->integer('promo_id')->nullable()->foreign('promo_id')->references('id')->on('promos');
			$table->float('credit_used');
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
		Schema::drop('bookings');
	}

}
