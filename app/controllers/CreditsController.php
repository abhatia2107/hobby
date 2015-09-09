<?php

class CreditsController extends \BaseController {

	/**
	 * Display a listing of credits
	 *
	 * @return Response
	 */
	public function index()
	{
		$credits = Credit::all();

		return View::make('credits.index', compact('credits'));
	}

	/**
	 * Show the form for creating a new credit
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('credits.create');
	}

	/**
	 * Store a newly created credit in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Credit::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Credit::create($data);

		return Redirect::route('credits.index');
	}

	/**
	 * Display the specified credit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$credit = Credit::findOrFail($id);

		return View::make('credits.show', compact('credit'));
	}

	/**
	 * Show the form for editing the specified credit.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$credit = Credit::find($id);

		return View::make('credits.edit', compact('credit'));
	}

	/**
	 * Update the specified credit in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credit = Credit::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Credit::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$credit->update($data);

		return Redirect::route('credits.index');
	}

	/**
	 * Remove the specified credit from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Credit::destroy($id);

		return Redirect::route('credits.index');
	}

}
