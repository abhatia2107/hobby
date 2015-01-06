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
		$subscriptions=Subscription::withTrashed()->get();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Subscriptions.index',compact('subscriptions','tableName'));
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

	public function enable($id)
	{
		$subscription=Subscription::withTrashed()->find($id);
		if($subscription){
			$subscriptionDisabled=Subscription::onlyTrashed()->find($id);
			if($subscriptionDisabled){
				$subscriptionDisabled->restore();	
				return Redirect::to('/subscriptions')->with('success',Lang::get('subscription.subscription_enabled'));
			}
			else{
					return Redirect::to('/subscriptions')->with('failure',Lang::get('subscription.subscription_enable_failed'));
			}
		}
		else
			return Redirect::to('/subscriptions')->with('failure',Lang::get('subscription.subscription_not_exist'));
	}

	public function disable($id)
	{
		$subscription=Subscription::find($id);	
		//dd($subscription);
		if($subscription){
			$subscription->delete();
			return Redirect::to('/subscriptions')->with('success',Lang::get('subscription.subscription_disabled'));
		}
		else{
			return Redirect::to('/subscriptions')->with('failure',Lang::get('subscription.subscription_disable_failed'));
		}
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
		$subscription=Subscription::withTrashed()->find($id);
		if($subscription){
			$subscription->forceDelete();
			return Redirect::to('/subscriptions')->with('success',Lang::get('subscription.subscription_deleted'));
		}
		else{
			return Redirect::to('/subscriptions')->with('failure',Lang::get('subscription.subscription_delete_failed'));
		}
	}

}