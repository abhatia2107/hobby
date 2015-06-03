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
		include app_path().'/IFRAME_KIT/Crypto.php';
		$user_id=Auth::id();
		$institute_id=$this->institute->getInstituteforUser($user_id);
		$batchDetails=Batch::find($id);
		
		$merchant_id='61787';
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$access_code='AVCA05CE22BS53ACSB';
		$merchant_data='';
		
		$user_id=Auth::id();
		$user=User::find($user_id);
		$order_id = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	    $posted['merchant_id']=$merchant_id;
		$posted['order_id']=$order_id;
		$posted['currency']='INR';
		$posted['amount']=50;
		$posted['redirect_url']='/bookings/redirect';
		$posted['cancel_url']='/bookings/cancel';
		$posted['integration_type']='iframe_normal';
		$posted['language']='en';

		foreach ($posted as $key => $value){
			$merchant_data.=$key.'='.$value.'&';
		}
		$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
		// dd($encrypted_data);	
	    $posted['action']='https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
		// dd($batchDetails);
		return View::make('Bookings.create',compact('batchDetails','institute_id','posted'))->with('success',Lang::get('payments.verify'));
	}

	/**
	 * Store a newly created booking in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		dd(Input::all());
		$validator = Validator::make($data = Input::all(), Booking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$data['user_id']=Auth::id();
		$data['reference_id']=substr(uniqid(),0,8);
		unset($data['csrf_token']);
		dd($data);
		Booking::create($data);
		return Redirect::back()->with('success',Lang::get('booking.booking_created'));
	}

	public function redirect()
	{
		dd('passed');
	/*
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

		if($order_status==="Success")
		{
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
		}*/

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

	public function sms()
	{
        require app_path().'/plivo/plivo.php';
	 	$auth_id = "MANDE2YZJLMWNKYMEXMZ";
	    $auth_token = "MTdhYzc2MTg4MzQzMTgwZjk0NzJlNTM3MDk1NGEz";
	    $p = new \RestAPI($auth_id, $auth_token);
	    // Send a message
	    $params = array(
	            'src' => 'HBXSMS',
	            'dst' => '919729725987',
	            'text' => 'Hi, Message from Plivo API. Agar aa jaye to mujhe ping kr do FB pr.- bhatia',
	            'type' => 'sms',
	        );
	    $response = $p->send_message($params);
	    dd($response);
	}
}
