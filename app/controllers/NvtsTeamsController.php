<?php

class NvtsTeamsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET nvts-team
	 *
	 * @return Response
	 */
	public function index()
	{
		$nvts_team = NvtsTeam::Join('bookings', 'bookings.id', '=','nvts_teams.booking_id' )->where('order_status','Success')->select('bookings.name as name')->get()->toArray();
		$nvts_team =  array_map(function($item) { return $item['name']; }, $nvts_team);
//		dd($nvts_team);
		return View::make('nvts-teams.index', compact('nvts_team'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET nvts-team/create
	 *
	 * @return Response
	 */
	/*public function create()
	{
		return View::make('nvts-teams.create');
	}*/

	/**
	 * Store a newly created resource in storage.
	 * POST nvts-team
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$validator = Validator::make($data, NvtsTeam::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

//		dd($data);
		unset($data['_token']);
		$data['batch_id']=151;
		$data['no_of_sessions']=1;
		$user_id=Auth::id();
		$data['user_id']=$user_id;
		$data['order_id']=substr(uniqid(),0,8);
		$data['booking_date']="2015-10-10";
//		dd($data);
		$booking = Booking::create($data);
		$data['booking_id'] = $booking->id;
		NvtsTeam::create($data);

		return Redirect::to('/bookings/payment/'.$booking->id);

//		return Redirect::route('nvts-teams.index');
	}

	/**
	 * Display the specified resource.
	 * GET nvts-team/{id}
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
	 * GET nvts-team/{id}/edit
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
	 * PUT nvts-team/{id}
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
	 * DELETE nvts-team/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function destroy($id)
	{
		NvtsTeam::destroy($id);

		return Redirect::route('nvts-teams.index');
	}*/

}