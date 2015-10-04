<?php

class Team extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name'=>'required',
		'email'=>'required|email|unique:users',
		'mobile'=>'required|unique:users|regex:/[0-9]{10}/',
	];

	// Don't forget to fill this array
	protected $fillable = [];

}