<?php

class AmznTeamsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET amzn-team
	 *
	 * @return Response
	 */
	public function index()
	{
		$amzn_team = AmznTeam::Join('bookings', 'bookings.id', '=','amzn_teams.booking_id' )->where('order_status','Success')->select('bookings.name as name')->get()->toArray();
		$amzn_team =  array_map(function($item) { return $item['name']; }, $amzn_team);
//		dd($amzn_team);
		return View::make('amzn-teams.index', compact('amzn_team'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET amzn-team/create
	 *
	 * @return Response
	 */
	/*public function create()
	{
		return View::make('amzn-teams.create');
	}*/

	/**
	 * Store a newly created resource in storage.
	 * POST amzn-team
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$validator = Validator::make($data, AmznTeam::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

//		dd($data);
		unset($data['_token']);
		$data['batch_id']=151;
		$data['no_of_sessions']=1;
		$user_id=Auth::id();
		$credentials['user_id']=$user_id;
		$credentials['order_id']=substr(uniqid(),0,8);
		$data['booking_date']="2015-10-10";
//		dd($data);
		$booking = Booking::create($data);
		$data['booking_id'] = $booking->id;
		AmznTeam::create($data);

		return Redirect::to('/bookings/payment/'.$booking->id);

//		return Redirect::route('amzn-teams.index');
	}

	/**
	 * Display the specified resource.
	 * GET amzn-team/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function show($id)
	{
		//
	}*/

	/**
	 * Show the form for editing the specified resource.
	 * GET amzn-team/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function edit($id)
	{
		//
	}*/

	/**
	 * Update the specified resource in storage.
	 * PUT amzn-team/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function update($id)
	{
		//
	}
*/
	/**
	 * Remove the specified resource from storage.
	 * DELETE amzn-team/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function destroy($id)
	{
		AmznTeam::destroy($id);

		return Redirect::route('amzn-teams.index');
	}*/

}