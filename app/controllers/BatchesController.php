<?php

class BatchesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /batches
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('Batches.show');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /batches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Batches.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /batches
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Batch::$rules);

		/** to check wether event date is valid or not **/
		$dateToday=Carbon::now();
		$startDate=Input::get('batch_start_date');
		$endDate=Input::get('batch_end_date');
		
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failed',Lang::get('batch.batch_currentDateError'));
		}
		
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failed',Lang::get('batch.batch_startEndDateError'));		
		}

		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$batch=Batch::create($credentianls);

	}

	/**
	 * Display the specified resource.
	 * GET /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /batches/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('Batches.create');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}