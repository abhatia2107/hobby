<?php

class CategoryInstitute extends \Eloquent {

	protected $fillable = [
		'category_id',
		'institute_id',
	];


	public static $rules = [
		'category_id'=>'required|numeric',
		'institute_id'=>'required|numeric',
	];
}