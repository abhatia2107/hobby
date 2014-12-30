<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categories
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
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Locations.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Category::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$category=Category::create($credentianls);
	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$locationDetails=Location::find($id);
		return View::make('Locations.show',compact('locationDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$locationDetails=Location::find($id);
		return View::make('Locations.create',compact('locationDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
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
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Location::destroy($id);
		if($deleted)
			return Redirect::to('/locations')->with('success',Lang::get('location.location_deleted'));
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_delete_failed'));
	}

}