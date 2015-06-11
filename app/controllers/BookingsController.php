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
		// dd(Input::all());
		$data = Input::all();
		$validator = Validator::make($data, Booking::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['user_id']=Auth::id();
		$data['order_id']=substr(uniqid(),0,8);
		unset($data['csrf_token']);
		unset($data['Promo_Code']);
		if(isset($data['pay_cc'])){
			unset($data['referral_credit_used']);
			unset($data['pay_cc']);
			$booking = Booking::create($data);
			if($booking)
				return Redirect::to('/bookings/payment/'.$booking->id);
			else
				return Redirect::back()->with('failure',Lang::get('booking.booking_create_failed'));
		}
		else if(isset($data['pay_hobbyix'])){
			unset($data['pay_hobbyix']);
			$user=User::find($data['user_id']);
			$booking_already_done = Booking::where('user_id',$data['user_id'])->where('booking_date', $data['booking_date'])->first();
			// dd($booking_already_done);
			if($data['no_of_sessions']==1){
				if($user->user_credits_left>$data['referral_credit_used']){
					if(!$booking_already_done){
						// dd('test');
						unset($data['csrf_token']);
						unset($data['Promo_Code']);
						$booking = Booking::create($data);
						if($booking){
							// var_dump($user);
							$user->user_credits_left=$user->user_credits_left-$data['referral_credit_used'];
							// dd($user);
							$user->save();
							$this->sms_email($booking->id);
							$batch=$this->batch->getBatch($booking->batch_id);
							$data=array('subcategory'=>$batch->subcategory,
										'institute'=>$batch->institute,
										'order_id'=>$booking->order_id,
										'date'=>$booking->booking_date,
										'no_of_sessions'=>$booking->no_of_sessions
								);
							return View::make('Bookings.success')->with($data);
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
			$this->sms_email($booking->id);
			$batch=$this->batch->getBatch($booking->batch_id);
			$data=array('subcategory'=>$batch->subcategory,
						'institute'=>$batch->institute,
						'order_id'=>$booking->order_id,
						'date'=>$booking->booking_date,
						'no_of_sessions'=>$booking->no_of_sessions
				);
			return View::make('Bookings.success')->with($data);
		}
		else if($information['order_status']==="Aborted")
		{
			$data=array(
						'batch_id'=>$booking->batch_id
			);
			return View::make('Bookings.aborted')->with($data);
		}
		else if($information['order_status']==="Failure")
		{
			$data=array('status_message'=>$information['status_message'],
						'batch_id'=>$booking->batch_id
						);
			return View::make('Bookings.failure')->with($data);
		}
		else
		{
			$data=array('status_message'=>"Security Error. Illegal access detected",
						'batch_id'=>$booking->batch_id
						);
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
		$user_msg='Hi user, Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].'. Please display the confirmation sms/email at the venue.';
		$institute_msg='Hobbyix: Order receieved, Order id: '.$data['order_id'].' for '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].' branch. Thanks, hobbyix.com- '.$data['admin_contact_no'];
		$admin_msg=$booking_id.', Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality']. ' by '. $data['user_contact_no'].'.';
		$subject='Booking Successful';
		$this->sms(true, $data['user_contact_no'], $user_msg);
		Mail::send('Emails.booking.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->subject($subject);
		});

		$email=$batch->venue_email;
		$subject='Booking for your class done';
		$this->sms(false, $data['venue_contact_no'], $institute_msg);
		Mail::send('Emails.booking.institute', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});

		$email=$data['admin_email'];
		$subject='Booking Done';
		$this->sms(false, $data['admin_contact_no'], $admin_msg);
		Mail::send('Emails.booking.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});
		
	}
/*
	public function test()
	{
		$data = array(
					'admin_contact_no' => '9100946081',
					'admin_email' => 'booking@hobbyix.com'
					);
		$email=$data['admin_email'];
		var_dump($email);
		$subject='Booking Done';
		$response=Mail::send('Emails.booking.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});
		dd($response);
	}
*/
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
		$data['referral_credit_used']=2;
		$user_id=Auth::id();
		$user=User::find($user_id);
		$user->user_credits_left=$user->user_credits_left-$data['referral_credit_used'];
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
