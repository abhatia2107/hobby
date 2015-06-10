<?php
use Carbon\Carbon;
class MembershipsController extends \BaseController {

	/**
	 * Display a listing of memberships
	 *
	 * @return Response
	 */
	public function index()
	{
		$memberships = Membership::all();
		return View::make('Memberships.index', compact('memberships'));
	}

	/**
	 * Show the form for creating a new membership
	 *
	 * @return Response
	 */
	public function create()
	{
		$end_date=strtotime((Carbon::now()->addDays(30)->toDateTimeString()));
		$credentials['start_date']=date('Y-m-d');
		$credentials['end_date']=date('Y-m-d',$end_date);
		$credentials['payment']='2000';
		$credentials['start']=date('d M Y');
		$credentials['end']=date('d M Y', $end_date);
		$credentials['credits']=30;
		// dd($credentials);
		return View::make('Memberships.create',compact('credentials'));
	}

	/**
	 * Store a newly created membership in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $credentials = Input::all();
		$user_id=Auth::id();
		// $credentials['credits']=30;
		// $credentials['start_date']=Carbon::now()->date();
		// dd($credentials);
		// $credentials['payment']=2000;
		// dd($credentials);
		$validator = Validator::make($credentials, Membership::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$credentials['user_id']=Auth::id();
		Membership::create($credentials);
		return Redirect::to('/memberships/payment');
	}


	public function payment($id)
	{
		error_reporting(0);
		$membership=Booking::find($id);
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
		$posted['billing_name']=$membership->name;
		$posted['billing_email']=$membership->email;
		$posted['billing_tel']=$membership->contact_no;
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
		// return View::make('Bookings.iframe',compact('action'));
		return View::make('Bookings.non-seamless',compact('encrypted_data', 'access_code'));
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

}
