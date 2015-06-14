<?php

class Yoga extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
		'email' => 'required|email|unique:yogas',
		'contact_no' => 'required||unique:yogas|regex:/[0-9]{10}/',
	];

	// Don't forget to fill this array
	protected $fillable = [
		'name', 'email', 'contact_no', 'locality_id'
	];

}