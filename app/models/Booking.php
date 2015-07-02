<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Booking extends \Eloquent {
use SoftDeletingTrait;

	// Add your validation rules here
	public static $rules = [
		'email'	=>	'email|required',
		'contact_no'=>'required|regex:/[0-9]{10}/',
		'batch_id' => 'integer|required',
		'no_of_sessions' => 'integer|required',
		'payment' => 'integer|required',
		'booking_date' => 'required'
	];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

}