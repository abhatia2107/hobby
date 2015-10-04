<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('team_name')->unique();
			$table->string('p1_name');
			$table->string('p2_name');
			$table->string('p3_name');
			$table->string('p4_name');
			$table->string('p5_name');
			$table->string('p6_name');
			$table->string('p1_email');
			$table->string('p2_email');
			$table->string('p3_email');
			$table->string('p4_email');
			$table->string('p5_email');
			$table->string('p6_email');
			$table->string('p1_mobile');
			$table->string('p2_mobile');
			$table->string('p3_mobile');
			$table->string('p4_mobile');
			$table->string('p5_mobile');
			$table->string('p6_mobile');
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
		Schema::drop('teams');
	}

}
