<?php

class Category extends \Eloquent {

	protected $fillable = [
		'category',
	];

	public static $rules = [
		'category'=>'required|alpha',
	];

}