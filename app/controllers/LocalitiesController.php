<?php

class LocalitiesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /localities
	 *
	 * @return Response
	 */
	public function index()
	{
		$localities=$this->locality->getAllLocalities();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Localities.index',compact('localities','tableName','count','adminPanelListing'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /localities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Localities.create');
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
		$localityDetails=Locality::find($id);
		return View::make('Localities.create',compact('localityDetails'));
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

		// TO DO: locality table should also be affected by this.
	public function enable($id)
	{
		$locality=Locality::withTrashed()->find($id);
		if($locality){
			$localityDisabled=Locality::onlyTrashed()->find($id);
			if($localityDisabled){
				$this->location->increment_no($locality['locality_location_id']);
				$localityDisabled->restore();	
				return Redirect::to('/localities')->with('success',Lang::get('locality.locality_enabled'));
			}
			else{
					return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_enable_failed'));
			}
		}
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_user_not_exist'));
	}

	public function disable($id)
	{
		$locality=Locality::find($id);	
		//dd($locality);
		if($locality){
			$locality->delete();
			$this->location->decrement_no($locality['locality_location_id']);
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_disabled'));
		}
		else{
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_disable_failed'));
		}
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
		$locality=Locality::withTrashed()->find($id);
		if($locality){
			$this->location->decrement_no($locality['locality_location_id']);
			$locality->forceDelete();
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_deleted'));
		}
		else{
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_delete_failed'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*public function destroy($id)
	{
		$location=$this->locality->getLocality($id);
		$this->location->decrement_no($location[0]->locality_location_id);
		$deleted=Locality::destroy($id);
		if($deleted)
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_deleted'));
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_delete_failed'));
	}*/
}