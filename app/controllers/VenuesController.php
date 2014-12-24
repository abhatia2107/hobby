<?php

class VenuesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /venues
	 *
	 * @return Response
	 */
	
	private $location;
	private $institute;
	private $venue;
	private $user;
	public function __construct(Location $locationObject, Locality $localityObject, Institute $instituteObject, User $userObject, Venue $venueObject)
	{
		$this->location = $locationObject;
		$this->locality=$localityObject;
		$this->institute = $instituteObject;
		$this->user = $userObject;
		$this->venue = $venueObject;
	}

	public function index()
	{
		$venues=Venue::all();
		return View::make('Venues.index',compact('venues'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /venues/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_locations=$this->location->all();
		$all_localities=$this->locality->all();
		return View::make('Venues.create',compact('all_locations','all_localities'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /venues
	 *
	 * @return Response
	 */
	public function store()
	{
		//TO DO: Take venue_user_id and venue_institute_id automatically 
		$credentials=Input::all();
		$credentials['venue_institute_id']=1;
		$credentials['venue_user_id']=1;
		$validator = Validator::make($credentials, Venue::$rules);
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
	 * Display the specified resource.
	 * GET /venues/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$venueDetails=Venue::find($id);
		$location_id=$venueDetails['venue_location_id'];
		$all_locations=$this->location->all();
		$venue_location=$all_locations->find($location_id);
		$venueDetails['venue_location']=$venue_location['location'];
		return View::make('Venues.show',compact('venueDetails'));
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
		//TO DO: Authenticate that user has permission to edit this venue
		$venueDetails=Venue::find($id);
		$location_id=$venueDetails['venue_location_id'];
		$locality_id=$venueDetails['venue_locality_id'];
		$all_locations=$this->location->all();
		$all_localities=$this->locality->all();
		$venue_location=$all_locations->find($location_id);
		$venue_locality=$all_localities->find($locality_id);
		$venueDetails['venue_location']=$venue_location;
		$venueDetails['venue_locality']=$venue_locality;
		return View::make('Venues.create',compact('venueDetails','all_locations','all_localities'));
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
		//TO DO: Take venue_user_id and venue_institute_id automatically 
		$credentials=Input::all();
		$credentials['venue_user_id']=1;
		$credentials['venue_institute_id']=1;
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