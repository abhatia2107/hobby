<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembershipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memberships', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('credits');
			$table->date('start_date');
			$table->date('end_date');
			$table->boolean('membership_type')->default(0);
			$table->integer('batch_id')->nullable();
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			$table->integer('payment');
			$table->string('order_id',8);
			$table->string('order_status',10)->nullable();
			$table->string('promo_code',25);
			$table->integer('wallet_amount')->default(0);
			$table->integer('promo_id')->unsigned()->nullable()->foreign('promo_id')->references('id')->on('promos');
	        $table->softDeletes();
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
		Schema::drop('memberships');
	}

}
