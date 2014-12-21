<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryInstituteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_institute', function(Blueprint $table)
		{
			$table->increments('category_institute_id');
			$table->integer('category_id')->foreign('category_id')->references('category_id')->on('Categories');
			$table->integer('institute_id')->foreign('institute_id')->references('institute_id')->on('Institutes');
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
		Schema::drop('category_institute');
	}

}
