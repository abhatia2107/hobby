<?php

class FeedbacksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /feedbacks
	 *
	 * @return Response
	 */
	public function index()
	{
		$feedbacks=Feedback::all();
		return View::make('Feedbacks.index',compact('feedbacks'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /feedbacks/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Feedbacks.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 * POST /feedbacks
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		if (Auth::check())
		{
		    // The user is logged in...
		    $credentials['user_id']=Auth::id(); 
		}
		dd($credentials);
		$validator = Validator::make($credentials, Feedback::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$feedback=Feedback::create($credentials);
		return Redirect::to('/')->with('success',Lang::get('feedback.feedback_updated'));
	}


	/**
	 * Display the specified resource.
	 * GET /feedbacks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$feedbackDetails=Feedback::find($id);
		return View::make('Feedbacks.show',compact('feedbackDetails'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /feedbacks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Feedback::destroy($id);
		if($deleted)
			return Redirect::to('/feedbacks')->with('success',Lang::get('feedback.feedback_deleted'));
		else
			return Redirect::to('/feedbacks')->with('failure',Lang::get('feedback.feedback_delete_failed'));
	}

}