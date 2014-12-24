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
		$localities=Locality::all();
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
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Locality::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$comment=Locality::create($credentianls);
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Locality::destroy($id);
		if($deleted)
			return Redirect::to('/localities')->with('success',Lang::get('locality.locality_deleted'));
		else
			return Redirect::to('/localities')->with('failure',Lang::get('locality.locality_delete_failed'));
	}

}