<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYogasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yogas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('contact_no');
			$table->string('email');
			$table->integer('locality_id')->foreign('locality_id')->references('id')->on('yoga_localities');
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
		Schema::drop('yogas');
	}

}
