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
		$admins=Admin::all();
		return View::make('Admins.index',compact('admins'));
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
		$validator = Validator::make($credentials, Admin::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_create_failed'));
		}
		$created=Admin::create($credentials);
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
		return View::make('Admins.show',compact('adminDetails'));
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Admin::destroy($id);
		if($deleted)
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_deleted'));
		else
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_delete_failed'));
	}

}