<?php

class TeamsController extends \BaseController {

	/**
	 * Display a listing of teams
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams = Team::all();

		return View::make('teams.index', compact('teams'));
	}

	/**
	 * Show the form for creating a new team
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('teams.create');
	}

	/**
	 * Store a newly created team in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
//		dd($data);
/*
		if(array_diff_key($data['email'], array_unique($data['email'])))
			return Redirect::back()->withInput()->with('failure',Lang::get('team.team_same_email'));
		if(array_diff_key($data['mobile'], array_unique($data['mobile'])))
			return Redirect::back()->withInput()->with('failure',Lang::get('team.team_same_mobile'));*/
		foreach($data['name'] as $key => $value)
		{
			$id=$key+1;
			$data['p'.$id.'_name'] = $value;
		}
		foreach($data['email'] as $key => $value)
		{
			$id=$key+1;
			$data['p'.$id.'_email'] = $value;
		}
		foreach($data['mobile'] as $key => $value)
		{
			$id=$key+1;
			$data['p'.$id.'_mobile'] = $value;
		}
//		dd($data);
		$validator = Validator::make($data, Team::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		unset($data['_token']);
		Team::create($data);

		return Redirect::route('teams.index');
	}

	/**
	 * Display the specified team.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		return View::make('teams.show', compact('team'));
	}

	/**
	 * Show the form for editing the specified team.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$team = Team::find($id);

		return View::make('teams.edit', compact('team'));
	}

	/**
	 * Update the specified team in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$team = Team::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Team::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$team->update($data);

		return Redirect::route('teams.index');
	}

	/**
	 * Remove the specified team from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Team::destroy($id);

		return Redirect::route('teams.index');
	}

}
