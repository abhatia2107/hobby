<?php

class Booking extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'batch_id' => 'integer|required',
		'no_of_sessions' => 'integer|required',
		'payment' => 'integer|required',
	];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}