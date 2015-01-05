<?php

class AdminsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admins
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins=$this->admin->getAllAdmins();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Admins.index',compact('admins','tableName'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admins/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admins
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		//dd($credentials);
		$validator = Validator::make($credentials, Admin::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_create_failed'));
		}
		$user_id=$this->user->userExist($credentials['admin_user_id']);
		if(!$user_id)
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_user_not_exist'));
		}
		$email=$this->user->getEmailVerified($credentials);
		if(!$email)
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_email_mismatch'));
		}
		$created=Admin::create($credentials);
		//dd($created);
		if($created)
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_created'));
		else
			return Redirect::back()->withInput()->with('failure',Lang::get('admin.admin_create_failed'));	
	}

	/**
	 * Display the specified resource.
	 * GET /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$adminDetails=Admin::find($id);
		return Redirect::to('/users/'.$adminDetails['admin_user_id']);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admins/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adminDetails=Admin::find($id);
		return View::make('Admins.create',compact('adminDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Admin::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->admin->updateAdmin($credentials,$id);
		if ($updated) 
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_updated'));
		else
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_already_failed'));
	}

	public function enable($id)
	{
		$admin=Admin::withTrashed()->find($id);
		if($admin){
			$adminDisabled=Admin::onlyTrashed()->find($id);
			if($adminDisabled){
				$adminDisabled->restore();	
				return Redirect::to('/admins')->with('success',Lang::get('admin.admin_enabled'));
			}
			else{
					return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_enable_failed'));
			}
		}
		else
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_user_not_exist'));
	}

	public function disable($id)
	{
		$admin=Admin::find($id);	
		//dd($admin);
		if($admin){
			$admin->delete();
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_disabled'));
		}
		else{
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_disable_failed'));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$admin=Admin::withTrashed()->find($id);
		if($admin){
			$admin->forceDelete();
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_deleted'));
		}
		else{
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_delete_failed'));
		}
	}

}