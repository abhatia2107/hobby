<?php

class Subcategory extends \Eloquent {
	protected $table = 'Subcategories';
	protected $primaryKey = 'subcategory_id';

	protected $fillable = [
		'category_id',
		'subcategory',
	];
	public static $rules = [		
		'category_id'=>'required|numeric',
		'subcategory'=>'required|alpha',
	];
}