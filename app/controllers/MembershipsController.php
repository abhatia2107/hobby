<?php
include app_path().'/IFRAME_KIT/Crypto.php';
use Carbon\Carbon;
class MembershipsController extends \BaseController {

	/**
	 * Display a listing of memberships
	 *
	 * @return Response
	 */
	public function index()
	{
		$metaContent[0] = "Hobbyix Membership :: Hobbyix";
		$metaContent[1] = "One Hobbyix Membership @Rs. 1999/- & workout at any gym, yoga, fitness centers etc. in Hyderabad";
		$metaContent[2] = "Hobbyix Membership, Hobbyix Membership Features, Get Your Hobbyix Membership";
		$end_date=strtotime((Carbon::now()->addDays(29)->toDateTimeString()));
		$credentials['start_date']=date('Y-m-d');
		$credentials['end_date']=date('Y-m-d',$end_date);
		$credentials['payment']='1999';
		$credentials['start']=date('d M Y');
		$credentials['end']=date('d M Y', $end_date);
		$credentials['credits']=30;
		$user_id=Auth::id();
		if($user_id)
			$user=User::find($user_id);
		return View::make('Memberships.index',compact('credentials','user','metaContent'));
	}

	/**
	 * Show the form for creating a new membership
	 *
	 * @return Response
	 */
	public function create()
	{
		// dd($credentials);
		// return View::make('Memberships.create',compact('credentials'));
	}

	/**
	 * Store a newly created membership in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());
		$credentials = Input::all();
		$validator = Validator::make($credentials, Membership::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		unset($credentials['csrf_token']);
		$credentials['credits']=30;
		$credentials['order_id']=substr(uniqid(),0,8);
		$credentials['user_id']=Auth::id();
		if($credentials['payment']==0)
		{
			$credentials['order_status']='success';
		}
		$membership=Membership::create($credentials);
		if($credentials['payment']==0)
		{
			return $this->success($membership);
		}
		else
			return Redirect::to('/memberships/payment/'.$membership->id);
	}


	public function payment($id)
	{
		error_reporting(0);
		$user_id=Auth::id();
		$user=User::find($user_id);
		$membership=Membership::find($id);
		// dd($membership);
		$merchant_id='61787';
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$access_code='AVCA05CE22BS53ACSB';
		$merchant_data='';
	    $posted['merchant_id']=$merchant_id;
		$posted['order_id']=$membership->order_id;
		$posted['currency']='INR';
		$posted['amount']=$membership->payment;
		$posted['redirect_url']=url('/memberships/redirect');
		$posted['cancel_url']=url('/memberships/cancel');
		$posted['integration_type']='iframe_normal';
		$posted['language']='en';
		$posted['billing_name']=$user->user_name;
		$posted['billing_email']=$user->email;
		$posted['billing_tel']=$user->user_contact_no;
		$posted['billing_address']='Kondapur';
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
		// $action='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
		// return View::make('Memberships.iframe',compact('action'));
		return View::make('Bookings.non-seamless',compact('encrypted_data', 'access_code'));
	}

	public function success($membership)
	{
		$user=User::find($membership->user_id);
        if(isset($user->user_wallet) && $user->user_wallet>0)
        {
          	if($user->user_wallet == $membership->wallet_amount)
                $user->user_wallet = 0;
            else
            	$user->user_wallet = $user->user_wallet-($membership->wallet_amount);
            $user->save();
        }
		$referee_id=$user->user_referee_id;
		if(!is_null($referee_id)&&!($user->user_membership_purchased))
		{
			$referee=User::find($referee_id);
			if($referee->user_pending_referral)
			{
				$referee->user_wallet=$referee->user_wallet+100;
				$referee->user_pending_referral=$referee->user_pending_referral-100;
				$referee->save();
				$email=$referee->email;
		        $name=$referee->user_name;
                $data = [
                    'name'=>$name,
	                'user_wallet' => $referee->user_wallet,
	                'user_pending_referral' => $referee->user_pending_referral,
                    'friend_name' => $user->user_name,
                ];
		        /*Successful referral mail, to be sent to the referee on purchase of first membership*/
		        $subject = Lang::get('user.user_successful_referral_subject',array("name"=>$data['friend_name']));
		        Mail::later(15, 'Emails.user.successful_referral', $data, function ($message) use ($email, $name, $subject) {
		            $message->to($email, $name)->subject($subject);
		        });
			}
		}
		$user->user_credits_left=$membership->credits;
		$user->user_credits_expiry=$membership->end_date;
		$user->user_membership_purchased=1;
		$user->save();
		$this->sms_email($membership->id);
		$data=array(
					'credits'=>$membership->credits,
					'order_id'=>$membership->order_id,
					'end_date'=>date("d M Y", strtotime($membership->end_date)),
			);
		return View::make('Memberships.success')->with($data);
	}



	public function redirect()
	{
		$encResponse=Input::get("encResp");			//This is the response sent by the CCAvenue Server
		$working_key='AEB6A7302F8DC5AC50A53B8DED9FB9DF';
		$rcvdString=decrypt($encResponse, $working_key);		//Crypto Decryption used as per the specified working key.
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		for($i = 0; $i < $dataSize; $i++) 
		{
			$info=explode('=',$decryptValues[$i]);
			$information[$info[0]]=$info[1];
		}
		$membership=Membership::where('order_id',$information['order_id'])->first();
		$membership->order_status=$information['order_status'];
		$membership->save();
		if($information['order_status']==="Success")
		{
			return $this->success($membership);
		}
		else if($information['order_status']==="Aborted")
		{
			$membership->delete();
			return View::make('Memberships.aborted');
		}
		else if($information['order_status']==="Failure")
		{
			$membership->delete();
			$data=array('status_message'=>$information['status_message'],
						);
			return View::make('Memberships.failure')->with($data);
		}
		else
		{
			$membership->delete();
			$data=array('status_message'=>"Security Error. Illegal access detected");
			return View::make('Memberships.illegal')->with($data);
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
		$membership=Membership::where('order_id',$information['order_id'])->first();
		$membership->order_status=$information['order_status'];
		$membership->save();
		$membership->delete();
		return View::make('Memberships.aborted');

	}


	/**
	 * Display the specified membership.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$membership = Membership::findOrFail($id);

		return View::make('Memberships.show', compact('membership'));
	}

	/**
	 * Show the form for editing the specified membership.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$membership = Membership::find($id);

		return View::make('Memberships.edit', compact('membership'));
	}

	/**
	 * Update the specified membership in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$membership = Membership::findOrFail($id);

		$validator = Validator::make($credentials = Input::all(), Membership::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$membership->update($credentials);

		return Redirect::route('Memberships.index');
	}

	/**
	 * Remove the specified membership from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Membership::destroy($id);

		return Redirect::route('Memberships.index');
	}

	public function sms_email($membership_id)
	{
		// $membership_id=1;
		$membership=Membership::find($membership_id);
		$user=User::find($membership->user_id);
		$data = array(
					'order_id' => $membership->order_id,
					'amount' => $membership->payment,
					'start_date' => date("d M Y", strtotime($membership->start_date)),
					'end_date' => date("d M Y", strtotime($membership->end_date)),
					'credits' => $membership->credits,
					'user_name' => $user->user_name,
					'user_email' => $user->email,
					'user_contact_no' => $user->user_contact_no,
					'admin_contact_no' => '9100946081',
					'admin_email' => 'booking@hobbyix.com'
					);
		$email= $user->email;
		$user_msg='Hi user, Order id: '.$data['order_id'].'. Thanks for buying Hobbyix Membership. 30 credits have been added to your account, valid till '. $data['end_date'];
		$admin_msg='Membership booked, '.$membership_id.', Order id: '.$data['order_id']. ' by '. $data['user_contact_no'].'.';
		$subject='Hobbyix Membership Booking Confirmation';
		$this->sms(true, $data['user_contact_no'], $user_msg);
		Mail::send('Emails.membership.user', $data, function($message) use ($email, $subject)
		{
			$message->to($email)->subject($subject);
		});

		$email=$data['admin_email'];
		$subject='Hobbyix Membership Booking Done';
		$this->sms(false, $data['admin_contact_no'], $admin_msg);
		Mail::send('Emails.membership.admin', $data, function($message) use ($email,$subject)
		{
			$message->to($email)->subject($subject);
		});
		
	}

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
