<?php

class Category extends \Eloquent {
	protected $table = 'Categories';
	protected $primaryKey = 'category_id';

	protected $fillable = [
		'category',
	];


	public static $rules = [
		'category'=>'required|alpha',
	];

}