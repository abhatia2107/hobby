<?php

class LocalitiesController extends \BaseController {

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
	 * GET /localities
	 *
	 * @return Response
	 */
	public function index()
	{
		$localities=$this->locality->getAllLocalities();
		return View::make('Localities.index',compact('localities'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /localities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		return View::make('Localities.create',compact('all_categories','all_locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /localities
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Locality::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$this->location->increment_no($credentials['locality_location_id']);
		$created=Locality::create($credentials);
		if ($created)
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_created'));
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_already_failed'));
	}
	/**
	 * Display the specified resource.
	 * GET /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$localityDetails=Locality::find($id);
		return View::make('Localities.show',compact('localityDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /localities/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$localityDetails=Locality::find($id);
		return View::make('Localities.create',compact('all_categories','all_locations','localityDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Locality::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->locality->updateLocality($credentials,$id);
		if ($updated) 
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_updated'));
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$location=$this->locality->getLocality($id);
		$this->location->decrement_no($location[0]->locality_location_id);
		$deleted=Locality::destroy($id);
		if($deleted)
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_deleted'));
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_delete_failed'));
	}
}