<?php

class Subscription extends \Eloquent {
	protected $table = 'Subscriptions';
	protected $primaryKey = 'subscription_id';

	protected $fillable = [
		'user_id',
	];
	public static $rules = [		
		'user_id'=>'required|numeric',
	];
}