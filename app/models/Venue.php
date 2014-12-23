<?php

class Venue extends \Eloquent {
	protected $primaryKey = 'venue_id';

	protected $fillable = [
		'venue',
		'venue_location',
		'venue_locality',
		'venue_pincode',
		'venue_address',
		'venue_email',
		'venue_contact_no',
		'venue_institute_id',
		'venue_latitude',
		'venue_longitude',
	];

	public static $rules = [
		'venue'=>'required',
		'venue_location'=>'required',
		'venue_locality'=>'required',
		'venue_pincode'=>'required',
		'venue_address'=>'required',
		'venue_email'=>'required|email',
		'venue_contact_no'=>'required|size:10',
		'venue_institute_id'=>'required|numeric',
	];	

}