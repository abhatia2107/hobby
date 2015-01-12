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
		$user_id=Auth::id();
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$venues=$this->venue->getVenueForUser($user_id);
		$institute_id=$this->institute->getInstituteforUser($user_id);
		return View::make('Venues.index',compact('institute_id','venues'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /venues/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$user_id=Auth::id();
		$localities=$this->locality->all();
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$institute_id=$this->institute->getInstituteforUser($user_id);
		return View::make('Venues.create',compact('institute_id','localities'));
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
		$venue_user_id=Auth::id();
		$credentials['venue_institute_id']=$venue_institute_id;
		$credentials['venue_user_id']=$venue_user_id;
		$validator = Validator::make($credentials, Venue::$rules);
		unset($credentials['csrf_token']);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('venue.venue_create_failed'));
		}
		$created=Venue::create($credentials);
		if($created)
			return Redirect::to('/venues')->with('success',Lang::get('venue.venue_created'));
		else
			return Redirect::back()->withInput()->with('failure',Lang::get('venue.venue_create_failed'));	
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
		$venueDetails=Venue::find($id);
		$location_id=$venueDetails['venue_location_id'];
		$locality_id=$venueDetails['venue_locality_id'];
		//Don't remove locations from here,
		//as it is being used to find the location of venue in this method only.
		$locations=$this->location->all();
		$localities=$this->locality->all();
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$institute_id=$venueDetails->venue_institute_id;
		$venue_location=$locations->find($location_id);
		$venue_locality=$localities->find($locality_id);
		$venueDetails['venue_location']=$venue_location;
		$venueDetails['venue_locality']=$venue_locality;
		return View::make('Venues.create',compact('institute_id','localities','locations','venueDetails'));
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
		$credentials=Input::all();
		// dd($credentials);
		$venue_user_id=Auth::id();
		$venue_institute_id=$this->institute->getInstituteforUser($venue_user_id);
		$credentials['venue_institute_id']=$venue_institute_id;
		$credentials['venue_user_id']=$venue_user_id;
		unset($credentials['csrf_token']);
		$validator = Validator::make($credentials, Venue::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->venue->updateVenue($credentials,$id);
		if ($updated) 
			return Redirect::to('/venues')->with('success',Lang::get('venue.venue_updated'));
		else
			return Redirect::to('/venues')->with('failure',Lang::get('venue.venue_already_failed'));
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
		$deleted=Venue::destroy($id);
		if($deleted)
			return Redirect::to('/venues')->with('success',Lang::get('venue.venue_deleted'));
		else
			return Redirect::to('/venues')->with('failure',Lang::get('venue.venue_delete_failed'));
	}

}