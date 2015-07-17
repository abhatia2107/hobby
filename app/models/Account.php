<?php

class Account extends \Eloquent {
	protected $fillable = [];

	public function getBookingPerUser()
	{
		$users=User::where('user_membership_purchased',1)->lists('id');
		$users=array_diff($users, array('1','2'));
		// dd($users);
		$batch=Batch::where('batch_bookings','>',0)->lists('batch','id');
		// dd($batch);
		$bookings=Booking::whereIn('user_id',$users)->where('order_status','Success')->get();
		$bookingsPerUser = array();
		foreach ($bookings as $key => $value) {
			if(isset($bookingsPerUser[$value->name][$batch[$value->batch_id]]))
				$bookingsPerUser[$value->name][$batch[$value->batch_id]]=$bookingsPerUser[$value->name][$batch[$value->batch_id]]+1;
			else
				$bookingsPerUser[$value->name][$batch[$value->batch_id]]=1;
		}
		return $bookingsPerUser;
	}


}