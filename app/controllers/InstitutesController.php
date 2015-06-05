<?php

use Carbon\Carbon;

class InstitutesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /institutes
	 *
	 * @return Response
	 */
	public function index()
	{
		$institutes=$this->institute->getAllInstitutes();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Institutes.index',compact('institutes','tableName','count','adminPanelListing'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /institutes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Institutes.create');
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
		$credentials['institute_user_id']=Auth::id();
		$credentials['institute_url']=$credentials['institute'].$credentials['institute_user_id'];
		$validator = Validator::make($credentials, Institute::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$created=Institute::create($credentials);
		// dd($created->id);
		if ($created)
			return Redirect::intended('/institutes/show/'.$created->id)->with('success',Lang::get('institute.institute_created'));
		else
			return Redirect::back()->withInput()->with('failure',Lang::get('institute.institute_create_failed'));
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
		$instituteDetails=$this->institute->getInstitute($id);
		//For the navbar of vendor panel. 
		//It is being used in layout file to show this navbar.
		$institute_id=$instituteDetails['id'];
		if($instituteDetails->deleted_at)
		{
			return Redirect::back()->with('failure',Lang::get('institute.institute_disabled_by_admin'));;
		}
		return View::make('Institutes.show',compact('instituteDetails','institute_id'));
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
		$instituteDetails=Institute::find($id);
		$location_id=$instituteDetails['institute_location_id'];
		$locations=$this->location->all();
		$institute_location=$locations->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$institute_id=$id;
		return View::make('Institutes.create',compact('instituteDetails','institute_id'));
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
		$user_id=Auth::id();
		$credentials=Input::all();
		$credentials['institute_user_id']=$user_id;
		$credentials['institute_url']=$credentials['institute'].$credentials['institute_user_id'];
		$validator = Validator::make($credentials, Institute::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->institute->updateInstitute($credentials,$id);
		// dd($updated);
		if ($updated) {
			return Redirect::to('/institutes/show/'.$id)->with('success',Lang::get('institute.institute_updated'));
		}
		else
			return Redirect::to('/institutes/show/'.$id)->with('failed',Lang::get('institute.institute_already_failed'));
	}


	public function enable($id)
	{
		$institute=Institute::withTrashed()->find($id);
		if($institute){
			$instituteDisabled=Institute::onlyTrashed()->find($id);
			if($instituteDisabled){
				$instituteDisabled->restore();	
				return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_enabled'));
			}
			else{
					return Redirect::to('/institutes')->with('failure',Lang::get('institute.institute_enable_failed'));
			}
		}
		else
			return Redirect::to('/institutes')->with('failure',Lang::get('institute.institute_not_exist'));
	}

	public function disable($id)
	{
		$institute=Institute::find($id);	
		//dd($institute);
		if($institute){
			$institute->delete();
			return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_disabled'));
		}
		else{
			return Redirect::to('/institutes')->with('failure',Lang::get('institute.institute_disable_failed'));
		}
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
		$institute=Institute::withTrashed()->find($id);
		if($institute){
			$institute->forceDelete();
			return Redirect::to('/institutes')->with('success',Lang::get('institute.institute_deleted'));
		}
		else{
			return Redirect::to('/institutes')->with('failure',Lang::get('institute.institute_delete_failed'));
		}
	}

	public function history()
	{
		$date=Carbon::now()->subDay();
		$history['oneDay'] = $this->institute->getInstituteOneDay($date);
		$history['active'] = $this->institute->getInstituteActive();
		$history['disabled'] = $this->institute->getInstituteDisabled();
		return $history;
	}
}