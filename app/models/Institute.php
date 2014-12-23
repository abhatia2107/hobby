<?php

class Institute extends \Eloquent {
	protected $primaryKey = 'institute_id';

	protected $fillable = [
		'institute',
        'institute_user_id',
        'institute_location_id',
        'institute_url',
        'institute_website',
        'institute_fblink',
        'institute_twitter',
        'institute_description',
        'institute_approved',
	];

	public static $rules = [		
		'institute'=>'required',
        'institute_user_id'=>'required|numeric',
        'institute_location_id'=>'required|numeric',
        'institute_url'=>'required|alpha_num',
        'institute_website'=>'active_url',
        'institute_description'=>'required',
        'institute_approved'=>'boolean',
    ];                         
}