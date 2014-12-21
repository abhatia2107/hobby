<?php

class Location extends \Eloquent {
	protected $primaryKey = 'location_id';

	protected $fillable = [
		'location',
	];
	public static $rules = [		
		'location'=>'required|alpha',
	];
}