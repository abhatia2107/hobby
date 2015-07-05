<?php
include app_path().'/IFRAME_KIT/Crypto.php';
class BookingsController extends \BaseController {


	/**
	 * Display a listing of bookings
	 *
	 * @return Response
	 */
	public function index()
	{
		$bookings = Booking::all();
		return View::make('Bookings.index', compact('bookings'));
	}

	/**
	 * Show the form for creating a new booking
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id)
	{
		$batchDetails=Batch::find($id);
		return View::make('Bookings.create',compact('batchDetails'));
	}

	/**
	 * Store a newly created booking in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::all();		
		$referrer = URL::previous();
		if(is_null($credentials['batch_id']))
		{
			$credentials['batch_id'] = substr($referrer, strrpos($referrer, '/') + 1);
		}
		
		$batch=$this->batch->getbatch($credentials['batch_id']);
	    if(!is_numeric($credentials['batch_id']))
        {
            $credentials['batch_id']=$batch->id;
        }
		$user_id=Auth::id();
		$validator = Validator::make($credentials, Booking::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}		
		$credentials['user_id']=$user_id;
		$credentials['order_id']=substr(uniqid(),0,8);
		unset($credentials['csrf_token']);
		// dd($credentials);
		if(isset($credentials['pay_cc']))
		{
			if($user_id)
			{
				$user=User::find($user_id);
				$credentials['wallet_amount']=$user->user_wallet;
			}
			else
			{
				$credentials['wallet_amount']=0;
			}
			if($credentials['promo_code'])
			{
				$amt=PromosController::isValid($credentials['promo_code'],$credentials['no_of_sessions']);
				if(is_numeric($amt['price']))
				{
					if($amt['price']!=$credentials['payment'])
						$credentials['payment']=$amt['price'];
					$credentials['wallet_amount']=$credentials['wallet_amount']-$amt['wallet_balance'];
					$promo_id=Promo::where('promo_code',$credentials['promo_code'])->first()->id;
					$credentials['promo_id']=$promo_id;
				}
				else
				{
					return Redirect::back()->with('failure',$amt);
				}
			}
			else
			{
				$credentials['payment'] = $batch->batch_single_price*$credentials['no_of_sessions'];
				if($user_id)
				{
					if($credentials['wallet_amount']>$credentials['payment'])
					{
						$credentials['wallet_amount']=$credentials['payment'];
						$credentials['payment']=0;
					}
					else
						$credentials['payment']=$credentials['payment']-$credentials['wallet_amount'];
				}
			}
			unset($credentials['credit_used']);
			unset($credentials['pay_cc']);
			if($credentials['payment']==0)
			{
				$credentials['order_status']='Success';
			}
			$booking = Booking::create($credentials);
			if($booking)
			{
				if($credentials['payment']==0)
				{
					return $this->success($booking);
				}
				else
					return Redirect::to('/bookings/payment/'.$booking->id);
			}
			else
				return Redirect::back()->with('failure',Lang::get('booking.booking_create_failed'));
		}
		else if(isset($credentials['pay_hobbyix'])){
			unset($credentials['pay_hobbyix']);
			$credentials['credit_used']=$batch->batch_credit;
			$user=User::find($credentials['user_id']);
			$booking_already_done = Booking::where('user_id',$credentials['user_id'])->where('booking_date', $credentials['booking_date'])->where('order_status','Success')->where('credit_used','>',0)->first();
			$trial_booked_already = Booking::where('user_id',$credentials['user_id'])->where('batch_id', $credentials['batch_id'])->where('order_status','Success')->first();
			if($credentials['no_of_sessions']==1){
				if(($user->user_free_credits_left>=$credentials['credit_used'])||($user->user_credits_left>=$credentials['credit_used'])){
					if(!$booking_already_done){
						unset($credentials['csrf_token']);
						unset($credentials['Promo_Code']);
						$credentials['payment']=0;
						$credentials['wallet_amount']=0;
						// dd($credentials);
						$booking = Booking::create($credentials);
						if($booking){
							if(!$trial_booked_already){
								if($user->user_free_credits_left>=$credentials['credit_used']){
									$user->user_free_credits_left=$user->user_free_credits_left-$credentials['credit_used'];
									$user->save();
									$batch=Batch::find($credentials['batch_id']);
									$batch->batch_trial=$batch->batch_trial+1;
									$batch->save();
									$booking->trial=1;
									$this->sms_email_trial($booking->id);
								}
								else{
									if($user->user_membership_type==1)
									{
										if(is_null($user->user_batch_id))
										{
											$user->user_batch_id=$credentials['batch_id'];
											$membership = Membership::where('user_id',$user_id)->where('membership_type',1)->where('order_status','Success')->orderBy('created_at', 'desc')->first();
											$membership->batch_id=$credentials['batch_id'];
											$membership->save();
										}	
										else
										{
											if($user->user_batch_id!=$credentials['batch_id'])
											{
												$booking->order_status="batch_not_allowed";
												$booking->save();
												$booking->delete();
												return Redirect::back()->with('failure',Lang::get('booking.batch_not_allowed'));
											}
										}
									}
									$user->user_credits_left=$user->user_credits_left-$credentials['credit_used'];
									$user->save();
									$this->sms_email($booking->id);
								}
							}
							else{
								if($user->user_credits_left>=$credentials['credit_used']){
									if($user->user_membership_type==1)
									{
										if(is_null($user->user_batch_id))
										{
											$user->user_batch_id=$credentials['batch_id'];
											$membership = Membership::where('user_id',$user_id)->where('membership_type',1)->where('order_status','Success')->orderBy('created_at', 'desc')->first();
											$membership->batch_id=$credentials['batch_id'];
											$membership->save();
										}	
										else
										{
											if($user->user_batch_id!=$credentials['batch_id'])
											{
												$booking->order_status="batch_not_allowed";
												$booking->save();
												$booking->delete();
												return Redirect::back()->with('failure',Lang::get('booking.batch_not_allowed'));
											}
										}
									}
									$user->user_credits_left=$user->user_credits_left-$credentials['credit_used'];
									$user->save();
									$this->sms_email($booking->id);
								}
								else{
									$booking->order_status="trial_fail";
									$booking->save();
									$booking->delete();
									return Redirect::back()->with('failure',Lang::get('booking.trial_booked_already'));
								}
							}
							$booking->order_status="Success";
							$booking->save();
							$batch=$this->batch->getBatch($booking->batch_id);
							$batch->batch_bookings=$batch->batch_bookings+1;
							$batch->save();
							return Illuminate\Support\Facades\Redirect::to('/bookings/success/'.$booking->id);
						}
						else{
							return Redirect::back()->with('failure',Lang::get('booking.booking_create_failed'));
						}
					}
					else{
						return Redirect::back()->with('failure',Lang::get('booking.booking_already_done'));
					}
				}
				else{
					return Redirect::back()->with('failure',Lang::get('booking.booking_not_enough_credit'));
				}
			}
			else{
				return Redirect::back()->with('failure',Lang::get('booking.booking_one_allowed'));
			}
		}
	}

	public function successView($id)
	{
		$booking=Booking::find($id);
		$batch=$this->batch->getBatch($booking->batch_id);
		$data=array(
					'id'=>$id,
					'batch'=>$batch->batch,
					'subcategory'=>$batch->subcategory,
					'institute'=>$batch->institute,
					'order_id'=>$booking->order_id,
					'date'=>$booking->booking_date,
					'no_of_sessions'=>$booking->no_of_sessions
			);
		return View::make('Bookings.success')->with($data);
		// return View::make('Bookings.success')->with($credentials);
	}

	public function success($booking)
	{
		$this->sms_email($booking->id);
		$batch=$this->batch->getBatch($booking->batch_id);
		$batch->batch_bookings=$batch->batch_bookings+1;
		$batch->save();
		if($booking->wallet_amount)
		{
			$user_id=Auth::id();
			$user=User::find($user_id);
			if(isset($user->user_wallet) && $user->user_wallet>0)
	        {
	          	if($user->user_wallet == $booking->wallet_amount)
	                $user->user_wallet = 0;
	            else
	            	$user->user_wallet = $user->user_wallet-($booking->wallet_amount);
	            $user->save();
	        }
		}
        return Illuminate\Support\Facades\Redirect::to('/bookings/success/'.$booking->id);
		// return View::make('Bookings.success',compact($facebookContent))->with($data);
	}

	public function payment($id)
	{
		error_reporting(0);
		$booking=Booking::find($id);
		$merchant_id='61787';
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$access_code='AVCA05CE22BS53ACSB';
		$merchant_data='';
	    $batch=$this->batch->getBatch($booking->batch_id);
	    $posted['merchant_id']=$merchant_id;
		$posted['order_id']=$booking->order_id;
		$posted['currency']='INR';
		$posted['amount']=$booking->payment;
		$posted['redirect_url']=url('/bookings/redirect');
		$posted['cancel_url']=url('/bookings/cancel');
		$posted['integration_type']='iframe_normal';
		$posted['language']='en';
		$posted['billing_name']=$booking->name;
		$posted['billing_email']=$booking->email;
		$posted['billing_tel']=$booking->contact_no;
		$posted['billing_address']=$batch->venue_address.', '.$batch->locality;
		$posted['billing_city']='Hyderabad';
		$posted['billing_state']='Telangana';
		$posted['billing_zip']=$batch->venue_pincode;
		$posted['billing_country']='India';
		foreach ($posted as $key => $value){
			$merchant_data.=$key.'='.$value.'&';
		}
		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
		// dd($encrypted_data);
		// $action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
		// $action='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
		// return View::make('Bookings.iframe',compact('action'));
		return View::make('Bookings.non-seamless',compact('encrypted_data', 'access_code'));
	}

	public function redirect()
	{
		$encResponse=Input::get("encResp");			//This is the response sent by the CCAvenue Server
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$rcvdString=decrypt($encResponse,$working_key);		//Crypto Decryption used as per the specified working key.
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		for($i = 0; $i < $dataSize; $i++) 
		{
			$info=explode('=',$decryptValues[$i]);
			$information[$info[0]]=$info[1];
		}
		$booking=Booking::where('order_id',$information['order_id'])->first();
		$booking->order_status=$information['order_status'];
		$booking->save();
		if($information['order_status']==="Success")
		{
			return $this->success($booking);
		}
		else if($information['order_status']==="Aborted")
		{
			$data=array(
						'batch_id'=>$booking->batch_id
			);
			$booking->delete();
			return View::make('Bookings.aborted')->with($data);
		}
		else if($information['order_status']==="Failure")
		{
			$data=array('status_message'=>$information['status_message'],
						'batch_id'=>$booking->batch_id
						);
			$booking->delete();
			return View::make('Bookings.failure')->with($data);
		}
		else
		{
			$data=array('status_message'=>"Security Error. Illegal access detected",
						'batch_id'=>$booking->batch_id
						);
			$booking->delete();
			return View::make('Bookings.illegal')->with($data);
		}
	}

	public function cancel()
	{
		$encResponse=Input::get("encResp");			//This is the response sent by the CCAvenue Server
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$rcvdString=decrypt($encResponse,$working_key);		//Crypto Decryption used as per the specified working key.
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		for($i = 0; $i < $dataSize; $i++) 
		{
			$info=explode('=',$decryptValues[$i]);
			$information[$info[0]]=$info[1];
		}
		$booking=Booking::where('order_id',$information['order_id'])->first();
		$booking->order_status=$information['order_status'];
		$booking->save();
		$booking->delete();
		$data=array(
			'batch_id'=>$booking->batch_id
		);
		return View::make('Bookings.aborted')->with($data);

	}
	/**
	 * Display the specified booking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$booking = Booking::findOrFail($id);

		return View::make('Bookings.show', compact('booking'));
	}

	/**
	 * Show the form for editing the specified booking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$booking = Booking::find($id);

		return View::make('Bookings.edit', compact('booking'));
	}

	/**
	 * Update the specified booking in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$booking = Booking::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Booking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$booking->update($data);

		return Redirect::route('Bookings.index');
	}

	/**
	 * Remove the specified booking from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Booking::destroy($id);

		return Redirect::route('Bookings.index');
	}

	public function sms_email($booking_id)
	{
		$booking=Booking::find($booking_id);
		$batch=$this->batch->getBatch($booking->batch_id);
		$data = array(
					'order_id' => $booking->order_id,
					'institute' => $batch->institute, 
					'subcategory' => $batch->subcategory,
					'amount' => $booking->payment,
					'credit' => $booking->credit_used,
					'date' => date("d M Y", strtotime($booking->booking_date)),
					'no_of_sessions' => $booking->no_of_sessions,
					'venue_address' => $batch->venue_address,
					'locality' => $batch->locality,
					'location' => $batch->location,
					'venue_landmark' => $batch->venue_landmark,
					'venue_pincode' => $batch->venue_pincode,
					'venue_email' => $batch->venue_email,
					'venue_contact_no' => $batch->venue_contact_no,
					'user_name' => $booking->name,
					'user_email' => $booking->email,
					'user_contact_no' => $booking->contact_no,
					'admin_contact_no' => '9100946081',
					'admin_email' => 'booking@hobbyix.com'
					);
		$user_msg='Hi '.$data['user_name'].', Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].'. Please display the confirmation sms/email at the venue.';
		$institute_msg='Hobbyix: Order placed by, '.$data['user_name'].', Order id: '.$data['order_id'].' for '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].' branch. Thanks, hobbyix.com- '.$data['admin_contact_no'];
		$admin_msg=$booking_id.', Order id: '.$data['order_id'].'. '. $data['institute'].', '.$data['venue_contact_no'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality']. ' by '. $data['user_name']. $data['user_contact_no'].'.';
		
		$this->sms(true, $data['user_contact_no'], $user_msg);
		$this->sms(false, $data['venue_contact_no'], $institute_msg);
		$this->sms(false, $data['admin_contact_no'], $admin_msg);
		
		$subject='Booking Successful';
		$email= $booking->email;
		Mail::queue('Emails.booking.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});

		$email=$batch->venue_email;
		$subject='Booking for your class done';
		Mail::queue('Emails.booking.institute', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});

		$email=$data['admin_email'];
		$subject='Booking Done';
		Mail::queue('Emails.booking.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});
	}

	public function sms_email_trial($booking_id)
	{
		$booking=Booking::find($booking_id);
		$batch=$this->batch->getBatch($booking->batch_id);
		$data = array(
					'order_id' => $booking->order_id,
					'institute' => $batch->institute, 
					'subcategory' => $batch->subcategory,
					'amount' => $booking->payment,
					'date' => date("d M Y", strtotime($booking->booking_date)),
					'no_of_sessions' => $booking->no_of_sessions,
					'venue_address' => $batch->venue_address,
					'locality' => $batch->locality,
					'location' => $batch->location,
					'venue_landmark' => $batch->venue_landmark,
					'venue_pincode' => $batch->venue_pincode,
					'venue_email' => $batch->venue_email,
					'venue_contact_no' => $batch->venue_contact_no,
					'user_name' => $booking->name,
					'user_email' => $booking->email,
					'user_contact_no' => $booking->contact_no,
					'admin_contact_no' => '9100946081',
					'admin_email' => 'booking@hobbyix.com'
					);
		$email= $booking->email;
		$user_msg='Hi '.$data['user_name'].', Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].'. This is a trial class. Please display the confirmation sms/email at the venue.';
		$institute_msg='Hobbyix: Order placed by, '.$data['user_name'].', Order id: '.$data['order_id'].' for '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].' branch. This is a trial class. Thanks, hobbyix.com- '.$data['admin_contact_no'];
		$admin_msg=$booking_id.', Order id: '.$data['order_id'].'. '. $data['institute'].', '.$data['venue_contact_no'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality']. ' by '. $data['user_name']. $data['user_contact_no'].'. This is a trial class.';

		$this->sms(true, $data['user_contact_no'], $user_msg);
		$this->sms(false, $data['venue_contact_no'], $institute_msg);
		$this->sms(false, $data['admin_contact_no'], $admin_msg);
		
		$subject='Trial Booking Successful';
		Mail::queue('Emails.trial_booking.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});

		$email=$batch->venue_email;
		$subject='Trial Booking for your class done';
		Mail::queue('Emails.trial_booking.institute', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});

		$email=$data['admin_email'];
		$subject='Trial Booking Done';
		Mail::queue('Emails.trial_booking.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});
	}

	public function bill()
	{
		
		$data = array(
					'institute' => 'Solid Fitness',
					'location' => 'Hyderabad',
					'locality' => 'Kondapur',
					'month' => 'June 2015',
					'total_amount' => '750',
					'subcategory' => 'Gym',
					'price' => '150',
					'no_of_sessions' => '5',
					'amount' => '750',
					'payment_id' => '8971W6NJ',
					'admin_contact_no' => '9100946081',
					'admin_email' => 'jatin.bansal@hobbyix.com'
					);
		$subject='Payment settlement of June 2015 done between Solid Fitness and hobbyix.com';
				/*	
		$data = array(
					'institute' => 'Akshar Wellness Center',
					'location' => 'Hyderabad',
					'locality' => 'Kondapur',
					'month' => 'June 2015',
					'total_amount' => '500',
					'subcategory' => 'Yoga',
					'price' => '125',
					'no_of_sessions' => '4',
					'amount' => '500',
					'payment_id' => '8970W6NJ',
					'admin_contact_no' => '9100946081',
					'admin_email' => 'jatin.bansal@hobbyix.com'
					);
		$subject='Payment settlement of June 2015 done between Akshar Wellness Center and hobbyix.com';
		*/
		/*
			$data = array(
					'institute' => 'All Tym Fit',
					'location' => 'Hyderabad',
					'locality' => 'Gachibowli',
					'month' => 'June 2015',
					'total_amount' => '300',
					'subcategory' => 'Zumba',
					'price' => '150',
					'no_of_sessions' => '2',
					'amount' => '300',
					'payment_id' => '8972W6NJ',
					'admin_contact_no' => '9100946081',
					'admin_email' => 'jatin.bansal@hobbyix.com'
					);
		$subject='Payment settlement of June 2015 done between All Tym Fit and hobbyix.com';
		*/
		$email=$data['admin_email'];
		// var_dump($email);
		$response=Mail::queue('Emails.institute.bill', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->subject($subject);
		});
		dd($response);
	}

/*
	public function test()
	{
		$institute_msg='Hobbyix: Order receieved, Order id: '.$data['order_id'].' for '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].' branch. 
		Thanks,
		hobbyix.com';
		$venue_contact_no = '9729725987';
		$this->sms(1,$venue_contact_no, $institute_msg);
		$admin_msg=$booking_id.', Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality']. ' by '. $data['user_contact_no'].'.';
		$admin_contact_no = '9100946081';
		$this->sms(0,$admin_contact_no, $admin_msg);
		dd('Success');
	}
*/
/*
	public function test()
	{
		$data['credit_used']=2;
		$user_id=Auth::id();
		$user=User::find($user_id);
		$user->user_credits_left=$user->user_credits_left-$data['credit_used'];
		dd($user);
	}*/

	public function sms($first,$mobile, $msg)
	{
		static $smsObject;
		if($first)
		{
	        require app_path().'/plivo/plivo.php';
		 	$auth_id = "MANDE2YZJLMWNKYMEXMZ";
		    $auth_token = "MTdhYzc2MTg4MzQzMTgwZjk0NzJlNTM3MDk1NGEz";
		    $smsObject = new \RestAPI($auth_id, $auth_token);
	    }
	    $params = array(
	            'src' => 'HBXSMS',
	            'dst' => '91'.$mobile,
	            'text' => $msg,
	            'type' => 'sms',
	        );
	    $smsObject->send_message($params);
	    // var_dump($params);
	}
}
