<?php

class MessagesController extends \BaseController {

	/**
	 * Display a listing of messages
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Msg::all();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Messages.index', compact('messages','tableName','count','adminPanelListing'));
	}

	/**
	 * Show the form for creating a new message
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Messages.create');
	}

	/**
	 * Store a newly created message in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Msg::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Msg::create($data);
		$this->sms(true, $data['contact_no'], $data['message']);
		return Illuminate\Support\Facades\Redirect::route('messages.index');
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

	/**
	 * Display the specified message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$message = Msg::findOrFail($id);

		return View::make('Messages.show', compact('message'));
	}

	/**
	 * Remove the specified message from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Msg::destroy($id);

		return Redirect::route('messages.index');
	}

}
