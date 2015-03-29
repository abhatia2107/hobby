<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('promo_code',10);
			$table->integer('discount_percentage')->nullable();
			$table->integer('cash_discount')->nullable();
			$table->integer('max_discount')->nullable();
			$table->integer('count');
			$table->integer('max_allowed_count')->nullable();
			$table->timestamp('valid_till')->nullable();
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
		Schema::drop('promos');
	}

}
