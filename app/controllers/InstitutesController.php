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
		$instituteId=Institute::getInstituteforUser(Auth::id());
		// dd($institute);
		if(!($instituteId))
			return View::make('Institutes.create');
		else{
			return Redirect::to('/institutes/'.$instituteId);
		}
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
		//dd($created->id);
		if ($created)
			return Redirect::intended('/institutes/'.$created->id)->with('success',Lang::get('institute.institute_created'));
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
		//Allow admin to view data and put this check in filter file.
		$instituteDetails=Institute::withTrashed()->find($id);
		// dd($instituteDetails);
		//$user_id=Auth::id();
		//if(($instituteDetails['institute_user_id']!=$user_id)&&(!$this->admin->checkIfAdmin($user_id)))
		//	return Redirect::back()->with('failure',Lang::get('institute.institute_access_failed'));
		if($instituteDetails['deleted_at'])
		{
			return Redirect::back()->with('failure',Lang::get('institute.institute_disabled_by_admin'));;
		}
		$location_id=$instituteDetails['institute_location_id'];
		$locations=$this->location->all();
		$institute_location=$locations->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		$batchDetails=$this->batch->getBatchForInstitute($id);
		return View::make('Institutes.show',compact('instituteDetails','batchDetails'));
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
		$user_id=Auth::id();
		if($instituteDetails['institute_user_id']!=$user_id)
			return Redirect::to('/')->with('failure',Lang::get('institute.institute_access_failed'));
		$location_id=$instituteDetails['institute_location_id'];
		$locations=$this->location->all();
		$institute_location=$locations->find($location_id);
		$instituteDetails['institute_location']=$institute_location['location'];
		return View::make('Institutes.create',compact('instituteDetails'));
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