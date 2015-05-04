<?php

class Membership extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'classes_left' => 'required',
		'start_date' => 'required',
		'payment' => 'required',
	];

	// Don't forget to fill this array
	protected $guarded = ['id',
		'created_at',
		'updated_at'
	];

	
}