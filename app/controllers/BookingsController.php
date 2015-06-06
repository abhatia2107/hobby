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

	public function test()
	{
		include app_path().'/IFRAME_KIT/Crypto.php';
		// $encResponse="3dd06cdf6dca64b79fc21492bd6b9861399a55365379850cf63934ee7da57cce9bc3cffdca5ec370a5cfea291ed1671783095ffc4724a3f69cf798f0a41c97f734d5df42690e546ab725286ac36a992f859bfa43fe70da452cb7473788c195726e742c7bdac10fc157a2513e69c8970a22eaed372035862f03fa0c5095e2bd29d231ce17f69e31b1bb38b3b3881ba96d965ddeb464a301f4c01b003fe088581dfa4101d859c14fd50e0e9d90624c6cddb693a4ca630aa5101af90e179c97d6cde9645d3af51e08ba58ce24c342514b7eb857c4219c3b4fe68eedb94304127a65badb885a38805b1ae825987700b852b2516f9bcf30c0fb8be4d86b5f610f0f5cc80d77627d1409d386148bd7c179c5786e4eaf427c199374d0f79399ca77c6905ea39a07659d392876fa98b3f3865ae7aef1224cb4aa4754f8d4c684a733c81422778bd3799d667771ece929cb5c99f27785df204e4f4962a5531865d0ebf5dc47307561800a5661dd092cefe94b74977c3ee34c5459e67286c00a540f8e99cdf170253c783e59062015a878de8429d68e71b846ece0ada25d52ab156393789da0365e30605afde2a05f187e8bf4c86a06ed2e62233d8b69e70bae5e0a66d35b046167b29770b7dca8d2870b388150412c808c01a7e84f6cb0fc734567810e123e665ec72d2eb1f1befe5d03b74732653ff247be313172b17f06abc6e7d5241528d64df329c1ea404af5e3bef47062ae021f83cf904f16d7e7fba7eb19f2aff11878130148f0a94736d706d9f59b926aa6f45e4e24c8321724a963c4c62728fda777b18374011421b78adee934a8b8ebc0bd1cc77a143305bbec86d4de6d17a2b3927fc743ebca4e8f7cbacb747f767780b49dc3e6bdb46070af5414c84ef36676bf1bae03defaffd2037d13fce5818925a706a5bd8aafff2d2a5da7ff07c1f1b52bcf29576f33ca3854908a5b9d84c24c47caa26bc99ba43a9f6b172828980c43a7d5e1f8325d3bd409508f1c3f4401186ef138c2359b72e59796ea905b48715c95bdbf6b56d7f0b44997532af8219ebc0f727b97cb6735b0d3af8c348009e4";			//This is the response sent by the CCAvenue Server
		$encResponse=Input::get("encResp");			//This is the response sent by the CCAvenue Server
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		// $rcvdString="order_id=5572e3a6&tracking_id=104008894193&bank_ref_no=null&order_status=Aborted&failure_message=&payment_mode=Debit Card&card_name=State Bank of India&status_code=1&status_message=Transaction aborted by user on 3D Secure page.&currency=INR&amount=2.0&billing_name=Abhishek Bhatia&billing_address=Room no 1101, near Railway station Ambad&billing_city=Hyderabad&billing_state=Telangana&billing_zip=500084&billing_country=India&billing_tel=9729725987&billing_email=abhatia2107@gmail.com&delivery_name=&delivery_address=&delivery_city=&delivery_state=&delivery_zip=&delivery_country=&delivery_tel=&merchant_param1=&merchant_param2=&merchant_param3=&merchant_param4=&merchant_param5=&vault=N&offer_type=null&offer_code=null&discount_value=0.0&mer_amount=2.0";
		$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
		
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		for($i = 0; $i < $dataSize; $i++) 
		{
			$info=explode('=',$decryptValues[$i]);
			$information[$info[0]]=$info[1];
			// if($i==0)	$order_id=$information[1];
			// if($i==3)	$information['order_status']=$information[1];
		}
		$booking=Booking::where('order_id',$information['order_id'])->first();
		$booking->order_status=$information['order_status'];
		$booking->save();
		// $information['order_status']
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
			// echo "Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
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
			echo "Thank you for shopping with us.However,the transaction has been declined.";
		}
		else
		{
			echo "Security Error. Illegal access detected";
		
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
