<?php

class InstitutesController extends \BaseController {

	private $location;
	public function __construct(Location $locationObject)
	{
		$this->location = $locationObject;
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
		$all_location=$this->location->all();
		return View::make('Institutes.create',compact('all_location'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /institutes
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		$credentials['institute_user_id']=1;
		$credentials['institute_url']=$credentials['institute'].$credentials['institute_user_id'];
		$validator = Validator::make($credentials, Institute::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$venue=Institute::create($credentials);
		return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_created'));

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
		//
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
		$institute_id=$id;
		$instituteDetails=Institute::find($institute_id);
		$location_id=$instituteDetails['institute_location_id'];
		$all_location=$this->location->all();
		$institute_location=$all_location->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		return View::make('Institutes.create',compact('instituteDetails','all_location'));
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
		//
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
		//
	}

}