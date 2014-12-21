<?php

class Subcategory extends \Eloquent {
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