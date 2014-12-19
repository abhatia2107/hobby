<?php

class Institute extends \Eloquent {
	protected $table = 'Institutes';
	protected $primaryKey = 'institute_id';

	protected $fillable = [
		'institute',
        'institute_location',
        'institute_url',
        'institute_website',
        'institute_fblink',
        'institute_twitter',
        'institute_description',
        'institute_approved',
	];

	public static $rules = [		
		'institute'=>'required',
        'institute_location'=>'required|numeric',
        'institute_url'=>'required|alpha_num',
        'institute_website'=>'alpha_num'
        'institute_fblink'=>'alpha_num'
        'institute_twitter'=>'alpha_num'
        'institute_description'=>'required',
        'institute_approved'=>'boolean',
    ];                         
}