<?php

class LocationsController extends \BaseController {

	private $admin;
	private $batch;
	private $category;
	private $comment;
	private $institute;
	private $keyword;
	private $locality;
	private $location;
	private $subcategory;
	private $subscription;
	private $user;
	private $venue;

	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, Comment $commentObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->comment = $commentObject;
		$this->institute = $instituteObject;
		$this->keyword = $keywordObject;
		$this->locality=$localityObject;
		$this->location = $locationObject;
		$this->subcategory = $subcategoryObject;
		$this->subscription = $subscriptionObject;
		$this->user = $userObject;
		$this->venue = $venueObject;
	}

	/**
	 * Display a listing of the resource.
	 * GET /locations
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations=Location::all();
		return View::make('Locations.index',compact('locations'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /locations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		return View::make('Locations.create',compact('all_categories','all_locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /locations
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Location::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$credentials['location_no_of_localities']=0;
		$created=Location::create($credentials);
		if ($created) 
			return Redirect::to('/locations')->with('success',Lang::get('location.location_created'));
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_already_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /locations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$locationDetails=$this->locality->getLocalitiesForLocation($id);
		$location=$this->location->getLocation($id);
		return View::make('Locations.show',compact('location','locationDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /locations/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$locationDetails=Location::find($id);
		return View::make('Locations.create',compact('all_categories','all_locations','locationDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /locations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Location::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->location->updateLocation($credentials,$id);
		if ($updated) 
			return Redirect::to('/locations')->with('success',Lang::get('location.location_updated'));
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /locations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Location::destroy($id);
		$this->locality->deleteLocation($id);
		if($deleted)
			return Redirect::to('/locations')->with('success',Lang::get('location.location_deleted'));
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_delete_failed'));
	}

}