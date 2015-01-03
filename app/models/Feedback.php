<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Feedback extends \Eloquent {

	use SoftDeletingTrait;

	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = ['deleted_at'];
 
    public static $rules = [
    	'subject'=>'required',
	    'description'=>'required',
    ];
    

    public function getUnreadFeedback()
    {
        return DB::table('feedbacks')
            ->where('feedbacks.feedback_read','=',0)
            ->get();
 	}
    
    public function getFeedback()
    {
        return DB::table('feedbacks')
            ->get();
 	}
    
    public function getReadFeedback()
    {
        return DB::table('feedbacks')
            ->where('feedbacks.feedback_read','=',1)
            ->get();
 	}
 	
 	public function markDoneFeedback()
    {
        return DB::table('feedbacks')
            ->softDeletes();
 	}
 	
 	public function unmarkDoneFeedback()
 	{
        return DB::table('feedbacks')
        	->restore();
 	}
 	
 	public function getDoneFeedback()
 	{
 		return DB::table('feedbacks')
            ->onlyTrashed()
            ->get();
 	}
}