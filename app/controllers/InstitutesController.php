<?php

class InstitutesController extends \BaseController {

	private $institute;
	private $location;
	private $user;

	public function __construct(Institute $instituteObject ,Locality $localityObject, Location $locationObject, User $userObject)
	{
		$this->institute = $instituteObject;
		$this->location = $locationObject;
		$this->user = $userObject;
	}
	/**
	 * Display a listing of the resource.
	 * GET /institutes
	 *
	 * @return Response
	 */
	public function index()
	{
		$institutes=Institute::all();
		return View::make('Institutes.index',compact('institutes'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /institutes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//To give all locations to the user.
		$all_locations=$this->location->all();
		return View::make('Institutes.create',compact('all_locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /institutes
	 *
	 * @return Response
	 */
	public function store()
	{
		//TO DO: Take user id automatically 
		$credentials=Input::all();
		$credentials['institute_user_id']=1;
		$credentials['institute_url']=$credentials['institute'].$credentials['institute_user_id'];
		/*dd($credentials);*/
		$validator = Validator::make($credentials, Institute::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$created=Institute::create($credentials);
		if ($created) 
			return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_created'));
		else
			return Redirect::back()->withInput()->with('failed',Lang::get('institute.institute_create_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /institutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$instituteDetails=Institute::find($id);
		$location_id=$instituteDetails['institute_location_id'];
		$all_locations=$this->location->all();
		$institute_location=$all_locations->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		return View::make('Institutes.show',compact('instituteDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /institutes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//TO DO: Authenticate that user has permission to edit this institute
		$instituteDetails=Institute::find($id);
		$location_id=$instituteDetails['institute_location_id'];
		$all_locations=$this->location->all();
		$institute_location=$all_locations->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		return View::make('Institutes.create',compact('instituteDetails','all_locations'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /institutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//TO DO: Take user id automatically
		$credentials=Input::all();
		$credentials['institute_user_id']=1;
		$credentials['institute_url']=$credentials['institute'].$credentials['institute_user_id'];
		/*dd($credentials['institute_website']);
		*/$validator = Validator::make($credentials, Institute::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->institute->updateInstitute($credentials,$id);
		if ($updated) 
			return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_updated'));
		else
			return Redirect::to('/institutes')->with('failed',Lang::get('institute.institute_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /institutes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Institute::destroy($id);
		if($deleted)
			return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_deleted'));
		else
			return Redirect::to('/institutes')->with('failed',Lang::get('institute.institute_delete_failed'));
	}

}