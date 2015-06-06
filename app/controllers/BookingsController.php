<?php
include app_path().'IFRAME_KIT/Crypto.php';
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
			return View::make('Bookings.Success')->with($data);
		}
		else if($information['order_status']==="Aborted")
		{
			echo "Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		
		}
		else if($information['order_status']==="Failure")
		{
			$data=array('status_message'=>$information['status_message'],
						'batch_id'=>$booking->batch_id
						);
		}
		else
		{
			echo "Security Error. Illegal access detected";
		
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
		$posted['billing_zip']='500084';
		$posted['billing_country']='India';
		foreach ($posted as $key => $value){
			$merchant_data.=$key.'='.$value.'&';
		}
		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
		// dd($encrypted_data);
		// $action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
		$action='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
		return View::make('Bookings.payment',compact('action'));
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
		$data['email']='abhatia2107@gmail.com';
		$data['contact_no']='9729725987';
		$validator = Validator::make($data, Booking::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['user_id']=Auth::id();
		$data['order_id']=substr(uniqid(),0,8);
		unset($data['csrf_token']);
		unset($data['Promo_Code']);
		$booking = Booking::create($data);
		if($booking)
			return Redirect::to('/bookings/payment/'.$booking->id);
		else
			return Redirect::back()->with('failure',Lang::get('booking.booking_create_failed'));
	}

	public function cancel()
	{
		dd('Cancelled');
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

	public function sms_email(/*$booking_id*/)
	{
		$booking_id=1;
		$booking=Booking::find($booking_id);
		$batch=$this->batch->getBatch($booking->batch_id);
		$data = array(
					'order_id' => $booking->order_id,
					'institute' => $batch->institute, 
					'subcategory' => $batch->subcategory,
					'amount' => $booking->amount,
					'date' => date("d M Y", strtotime($booking->booking_date)),
					'no_of_sessions' => $booking->no_of_sessions,
					'venue_address' => $batch->venue_address,
					'locality' => $batch->locality,
					'location' => $batch->location,
					'venue_landmark' => $batch->venue_landmark,
					'venue_pincode' => $batch->venue_pincode,
					'venue_email' => $batch->venue_email,
					'venue_contact_no' => $batch->venue_contact_no,
					'user_email' => $booking->email,
					'user_contact_no' => $booking->contact_no,
					'admin_contact_no' => '9100946081',
					'admin_email' => 'support@hobbyix.com'
					);
		$email= $booking->email;
		$user_msg='Hi user, Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].'. Please display the confirmation sms/email at the venue.';
		$institute_msg='Hobbyix: Order receieved, Order id: '.$data['order_id'].' for '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality'].' branch. 
		Thanks,
		hobbyix.com';
		$admin_msg=$booking_id.', Order id: '.$data['order_id'].'. '. $data['institute'].', '. $data['subcategory']. ' on '. $data['date']. ' at '. $data['locality']. ' by '. $data['user_contact_no'].'.';
		$subject='Booking Successful';
		$this->sms($user_contact_no, $user_msg);
		Mail::send('Emails.booking.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->subject($subject);
		});

		$email=$batch->venue_email;
		$subject='Booking for your class done';
		$this->sms($venue_contact_no, $institute_msg);
		Mail::send('Emails.booking.institute', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});

		$email=$data['admin_email'];
		$subject='Booking Done';
		$this->sms($admin_contact_no, $admin_msg);
		Mail::send('Emails.booking.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});
		
	}

	public function sms($mobile, $msg)
	{
        require app_path().'/plivo/plivo.php';
	 	$auth_id = "MANDE2YZJLMWNKYMEXMZ";
	    $auth_token = "MTdhYzc2MTg4MzQzMTgwZjk0NzJlNTM3MDk1NGEz";
	    $p = new \RestAPI($auth_id, $auth_token);
	    // Send a message
	    $params = array(
	            'src' => 'HBXSMS',
	            'dst' => '91'.$mobile,
	            'text' => $msg,
	            'type' => 'sms',
	        );
	    $response = $p->send_message($params);
	    // var_dump($response);
	}
}
