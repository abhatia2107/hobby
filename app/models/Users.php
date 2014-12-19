<?php

class Users extends \Eloquent {
	protected $table = 'Users';
	protected $primaryKey = 'user_id';

	protected $fillable = [
		'user_first_name',
	    'user_last_name',
	    'user_email',
	    'user_contact_no',
	    'user_password',
	    'user_location',
	    'user_fb_id',
	    'user_birthdate',
	    'user_gender',
	    'user_remember_token',
	    'user_facebook_access_token',
	    'user_confirmation_code',
	    'user_confirmed',
	];

	public static $rules = [
		'user_first_name'=>'required',
	    'user_last_name'=>'required',
	   	'user_email'=>'required|unique:users,user_email',
		'user_contact_no'=>'required|size:10',
		'user_password'=>'required|confirmed|alpha_num|min:6',
	    'user_location'=>'required',
	    'user_birthdate'=>'date'
	    'user_gender'=>'boolean'
	    'user_confirmed'=>'boolean'                   
	];

 }