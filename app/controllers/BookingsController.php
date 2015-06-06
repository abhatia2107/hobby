<?php

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

	public function payment($id)
	{
		include app_path().'/IFRAME_KIT/Crypto.php';
		error_reporting(0);
		$booking=Booking::find($id);
		$merchant_id='61787';
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$access_code='AVCA05CE22BS53ACSB';
		$merchant_data='';
	    $posted['merchant_id']=$merchant_id;
		$posted['order_id']=$booking->order_id;
		$posted['currency']='INR';
		$posted['amount']=$booking->payment;
		$posted['redirect_url']=url('/bookings/redirect');
		$posted['cancel_url']=url('/bookings/cancel');
		$posted['integration_type']='iframe_normal';
		$posted['language']='en';
		$posted['billing_name']='Abhishek Bhatia';
		$posted['billing_address']='Room no 1101, near Railway station Ambad';
		$posted['billing_city']='Hyderabad';
		$posted['billing_state']='Telangana';
		$posted['billing_zip']='500084';
		$posted['billing_country']='India';
		$posted['billing_tel']=$booking->contact_no;
		$posted['billing_email']=$booking->email;
		// dd($posted);
		foreach ($posted as $key => $value){
			$merchant_data.=$key.'='.$value.'&';
		}
		// $action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction";
		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
		// dd($encrypted_data);
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

	public function test()
	{
		$this->sms('919885890640', 'Badiya bhai deepak');
		dd('test');
	}

	public function redirect()
	{
		include app_path().'/IFRAME_KIT/Crypto.php';
		error_reporting(0);
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$encResponse=Input::get("encResp");			//This is the response sent by the CCAvenue Server
		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		
		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3)	$order_status=$information[1];
		}
		// dd($information);
		// dd($order_status);	

		if($order_status==="Success")
		{
			$this->sms($user_mobile, $user_msg);
			$this->sms($institute_mobile, $institute_msg);
			$this->sms($admin_mobile, $admin_msg);
			$this->email($booking);
			
			echo "Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		}
		else if($order_status==="Aborted")
		{
			echo "Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		
		}
		else if($order_status==="Failure")
		{
			echo "Thank you for shopping with us.However,the transaction has been declined.";
		}
		else
		{
			echo "Security Error. Illegal access detected";
		
		}

		for($i = 0; $i < $dataSize; $i++) 
		{
			$information=explode('=',$decryptValues[$i]);
		    	// echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
		}

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

	public function email(/*$booking_id*/)
	{
		$booking_id=1;
		$booking=Booking::find($booking_id);
		// dd($booking);
		$batch=$this->batch->getBatch($booking->batch_id);
		$email= $booking->email;
		$subject='Booking Successful';
		$data = array(
					'order_id' => $booking->order_id,
					'institute' => $batch->institute, 
					'subcategory' => $batch->subcategory,
					'amount' => $booking->amount,
					'date' => $booking->booking_date,
					'no_of_sessions' => $booking->no_of_sessions,
					'venue_address' => $batch->venue_address,
					'locality' => $batch->locality,
					'location' => $batch->location,
					'venue_landmark' => $batch->venue_landmark,
					'venue_pincode' => $batch->venue_pincode,
					'venue_email' => $batch->venue_email,
					'venue_contact_no' => $batch->venue_contact_no,
					'user_email' => $booking->email,
					'user_contact_no' => $booking->contact_no
					);
		// dd($data);
		Mail::send('Emails.booking.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->subject($subject);
		});

		$subject='Booking for your class done';
		Mail::send('Emails.booking.institute', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});

		$subject='Booking Done';
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
	            'dst' => $mobile,
	            'text' => $msg,
	            'type' => 'sms',
	        );
	    $response = $p->send_message($params);
	    // var_dump($response);
	}
}
