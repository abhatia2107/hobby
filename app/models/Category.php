<?php

class Category extends \Eloquent {
	protected $primaryKey = 'category_id';

	protected $fillable = [
		'category',
	];


	public static $rules = [
		'category'=>'required|alpha',
	];

}