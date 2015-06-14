<?php

class YogaLocality extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'locality' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['locality'];

}