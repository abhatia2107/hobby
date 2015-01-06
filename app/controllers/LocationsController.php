<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /locations
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations=Location::withTrashed()->get();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Locations.index',compact('locations','tableName'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /locations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Locations.create');
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
		$locationDetails=Location::find($id);
		return View::make('Locations.create',compact('locationDetails'));
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

	// TO DO: Sublocation table should also be affected by this.
	public function enable($id)
	{
		$location=Location::withTrashed()->find($id);
		if($location){
			$locationDisabled=Location::onlyTrashed()->find($id);
			if($locationDisabled){
				$locationDisabled->restore();	
				return Redirect::to('/locations')->with('success',Lang::get('location.location_enabled'));
			}
			else{
					return Redirect::to('/locations')->with('failure',Lang::get('location.location_enable_failed'));
			}
		}
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_user_not_exist'));
	}

	public function disable($id)
	{
		$location=Location::find($id);	
		//dd($location);
		if($location){
			$location->delete();
			return Redirect::to('/locations')->with('success',Lang::get('location.location_disabled'));
		}
		else{
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_disable_failed'));
		}
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
		$location=Location::withTrashed()->find($id);
		if($location){
			$location->forceDelete();
			return Redirect::to('/locations')->with('success',Lang::get('location.location_deleted'));
		}
		else{
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_delete_failed'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /locations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*public function destroy($id)
	{
		$deleted=Location::destroy($id);
		$this->locality->deleteLocation($id);
		if($deleted)
			return Redirect::to('/locations')->with('success',Lang::get('location.location_deleted'));
		else
			return Redirect::to('/locations')->with('failure',Lang::get('location.location_delete_failed'));
	}*/

}