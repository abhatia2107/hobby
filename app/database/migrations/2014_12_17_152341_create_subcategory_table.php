<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Subcategories', function($table){
			$table->increments("subcategory_id");
			$table->integer('category_id')->foreign('category_id')->references('category_id')->on('Categories');
			$table->string("subcategory",255);
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
		Schema::drop('Subcategories');
	}

}
