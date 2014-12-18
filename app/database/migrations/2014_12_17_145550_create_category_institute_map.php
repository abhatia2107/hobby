<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryInstituteMap extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_institute_map', function($table){
		$table->integer('category_id')->foreign('category_id')->references('category_id')->on('category');
		$table->integer('institute_id')->foreign('institute_id')->references('institute_id')->on('institute');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_institute_map');
	}

}
