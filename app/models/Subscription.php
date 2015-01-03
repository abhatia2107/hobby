<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Subscription extends \Eloquent {

	use SoftDeletingTrait;

	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];

	public static $rules = [		
		'subscription_email'=>'email',
	];

	public function unsubscribe()
    {
        return DB::table('feedbacks')
            ->softDeletes();
 	}
 	
 	public function unmarkDoneFeedback()
 	{
        return DB::table('feedbacks')
        	->restore();
 	}
 	
 	public function getUnsubscribe()
 	{
 		return DB::table('feedbacks')
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