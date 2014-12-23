<?php

class VenuesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /venues
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /venues/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Venues.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /venues
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		// dd($credentials);
		$credentials['venue_institute_id']=1;
		$validator = Validator::make($credentials, Venue::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$venue=Venue::create($credentials);
	}

	/**
	 * Display the specified resource.
	 * GET /venues/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('Venues.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /venues/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('Venues.create');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /venues/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /venues/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}