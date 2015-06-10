<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Membership extends \Eloquent {
use SoftDeletingTrait;

	// Add your validation rules here
	public static $rules = [
		'credits' => 'required',
		'start_date' => 'required|date',
		'end_date' => 'required|date',
		'payment' => 'required',
	];


	// Don't forget to fill this array
	protected $guarded = ['id',
		'created_at',
		'updated_at'
	];

}