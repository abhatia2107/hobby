<?php

class Account extends \Eloquent {
	
	protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
	
	public function getBookingPerUser()
	{
		$users=User::where('user_membership_purchased',1)->lists('id');
		$users=array_diff($users, array('1','2'));
		// dd($users);
		$batch=Batch::where('batch_bookings','>',0)->lists('batch','id');
		// dd($batch);
		$bookings=Booking::whereIn('user_id',$users)->where('order_status','Success')->where('booking_date','>','2015-07-01')->get();
		$bookingsPerUser = array();
		foreach ($bookings as $key => $value) {
			if(isset($bookingsPerUser[$value->name][$batch[$value->batch_id]]))
				$bookingsPerUser[$value->name][$batch[$value->batch_id]]=$bookingsPerUser[$value->name][$batch[$value->batch_id]]+1;
			else
				$bookingsPerUser[$value->name][$batch[$value->batch_id]]=1;
		}
		return $bookingsPerUser;
	}

	public function getBookingPerBatch()
	{
		/*$users=User::where('user_membership_purchased',1)->lists('id');
		$users=array_diff($users, array('1','2'));
		array_push($users, NULL);*/
		$users=[1,2];
		// dd($users);
		$batch=Batch::where('batch_bookings','>',0)->lists('batch','id');
		// dd($batch);
		$bookings=Booking::/*whereNotIn('user_id',$users)->*/where('trial',0)->where('order_status','Success')->where('booking_date','>=','2015-09-01')->where('booking_date','<','2015-10-01')->get()/*->toArray()*/;
		// dd($bookings);
		$bookingsPerUser = array();
		foreach ($bookings as $key => $value) {
			if(isset($bookingsPerUser[$batch[$value->batch_id]][$value->name]))
				$bookingsPerUser[$batch[$value->batch_id]][$value->name]=$bookingsPerUser[$batch[$value->batch_id]][$value->name]+1;
			else
				$bookingsPerUser[$batch[$value->batch_id]][$value->name]=1;
			
		}
		return $bookingsPerUser;
	}


	public function getBatchesForUser($user_id)
	{
		$batches = Booking::where('user_id',$user_id)->where('order_status','Success')->lists('batch_id');
		$batchesForUser=Batch::whereIn('id',$batches)->lists('batch');
		return $batchesForUser;
	}
}