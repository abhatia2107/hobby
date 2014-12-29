<?php

class SubscriptionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /subscriptions
	 *
	 * @return Response
	 */
	public function index()
	{
		$subscriptions=Subscription::all();
		return View::make('Subscriptions.index',compact('subscriptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /subscriptions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Subscriptions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /subscriptions
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Subscription::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$subscription=Subscription::create($credentianls);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /subscriptions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Subscription::destroy($id);
		if($deleted)
			return Redirect::to('/subscriptions')->with('success',Lang::get('subscription.subscription_deleted'));
		else
			return Redirect::to('/subscriptions')->with('failure',Lang::get('subscription.subscription_delete_failed'));
	}

}