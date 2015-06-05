<?php

class MembershipsController extends \BaseController {

	/**
	 * Display a listing of memberships
	 *
	 * @return Response
	 */
	public function index()
	{
		$memberships = Membership::all();

		return View::make($this->device.'.memberships.index', compact('memberships'));
	}

	/**
	 * Show the form for creating a new membership
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make($this->device.'.memberships.create');
	}

	/**
	 * Store a newly created membership in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::all();
		$credentials['classes_left']=30;
		$credentials['payment']=500;
		// dd($credentials);
		$validator = Validator::make($credentials, Membership::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$credentials['user_id']=Auth::id();

		Membership::create($credentials);

		return Redirect::route('memberships.index');
	}

	/**
	 * Display the specified membership.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$membership = Membership::findOrFail($id);

		return View::make($this->device.'.memberships.show', compact('membership'));
	}

	/**
	 * Show the form for editing the specified membership.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$membership = Membership::find($id);

		return View::make($this->device.'.memberships.edit', compact('membership'));
	}

	/**
	 * Update the specified membership in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$membership = Membership::findOrFail($id);

		$validator = Validator::make($credentials = Input::all(), Membership::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$membership->update($credentials);

		return Redirect::route('memberships.index');
	}

	/**
	 * Remove the specified membership from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Membership::destroy($id);

		return Redirect::route('memberships.index');
	}

}
