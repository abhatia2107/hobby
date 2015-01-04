<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Subscription extends \Eloquent {

	use SoftDeletingTrait;

	protected $guarded = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];

	public static $rules = [		
		'subscription_email'=>'email',
	];

	public function unsubscribe()
    {
        return DB::table('subscriptions')
            ->softDeletes();
 	}
 	
 	public function reSubscribe()
 	{
        return DB::table('subscriptions')
        	->restore();
 	}
 	
 	public function getUnsubscribe()
 	{
 		return DB::table('subscriptions')
            ->onlyTrashed()
            ->get();
 	}

 	public function subscribe($credentials)
 	{
 		if(Auth::check()){
	 		$user = User::withTrashed()->firstOrCreate(array('subscription_user_id' => Auth::id()));
 			
 		}
 		else{
 			$user = User::withTrashed()->firstOrCreate(array('subscription_email' => $credentials['email']));
 		}
 	}
}