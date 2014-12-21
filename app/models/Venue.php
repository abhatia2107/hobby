<?php

class Venue extends \Eloquent {
	protected $primaryKey = 'venue_id';

	protected $fillable = [
		'venue',
		'venue_location',
		'venue_locality',
		'venue_pincode',
		'venue_address',
		'venue_contact_no',
		'venue_institute_id',
		'venue_latitude',
		'venue_longitude',
	];

	public static $rules = [
		'venue'=>'required',
		'venue_location'=>'required|numeric',
		'venue_locality',
		'venue_pincode'=>'required',
		'venue_address'=>'required',
		'venue_contact_no'=>'required|size:10',
		'venue_institute_id'=>'required|numeric',
		'venue_latitude',
		'venue_longitude',
	];	

}