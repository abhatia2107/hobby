<?php

class Subscription extends \Eloquent {

	protected $fillable = [
		'subscription_user_id',
	];
	public static $rules = [		
		'subscription_user_id'=>'required|numeric',
	];
}