<?php

use Carbon\Carbon;

class BatchesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /batches
	 *
	 * @return Response
	 */
	public function index()
	{
		$batches=Batch::all();
		return View::make('Batchs.index',compact('batches'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /batches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		/*dd(public_path());*/
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
//		$validator = Validator::make($credentianls, Batch::$rules);

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

/*		if($validator->fails())
		{
			dd("error");
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$batch=Batch::create($credentianls);
		return Redirect::to('/batches/')->with('success',Lang::get('batch.batch_created'));
*/		
		dd($credentianls);
		
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
		$batchDetails=Batch::find($id);
		return View::make('Batchs.show',compact('batchDetails'));
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
		$batchDetails=Batch::find($id);
		return View::make('Batchs.create',compact('batchDetails'));
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
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Batch::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->batch->updateBatch($credentials,$id);
		if ($updated) 
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_updated'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_already_failed'));
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
		$deleted=Batch::destroy($id);
		if($deleted)
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_deleted'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_delete_failed'));
	}

}