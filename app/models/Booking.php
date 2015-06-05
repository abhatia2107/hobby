<?php

class Booking extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'email'	=>	'email|required',
		'contact_no'=>'required|regex:/[0-9]{10}/',
		'batch_id' => 'integer|required',
		'no_of_sessions' => 'integer|required',
		'payment' => 'integer|required',
		// 'booking_date' => 'after:2015-06-24'
	];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}