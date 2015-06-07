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
			$table->string('classes_left');
			$table->date('start_date');
			$table->date('end_date');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			$table->integer('payment');
			$table->integer('promo_id')->unsigned()->nullable()->foreign('promo_id')->references('id')->on('promos');
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
