<?php

class YogasController extends \BaseController {

	/**
	 * Display a listing of yogas
	 *
	 * @return Response
	 */
	public function index()
	{
		$yogas = Yoga::all();

		return View::make('Miscellaneous.yoga_list', compact('yogas'));
	}

	/**
	 * Show the form for creating a new yoga
	 *
	 * @return Response
	 */
	public function create()
	{
		$yoga_locality = YogaLocality::all();
		// dd($yoga_locality->first());
		return View::make('Miscellaneous.yoga',compact('yoga_locality'));
	}

	/**
	 * Store a newly created yoga in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		// dd($data);
		$validator = Validator::make($data, Yoga::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		unset($data['csrf_token']);
		Yoga::create($data);
		return Redirect::to('/')->with('success','You have successfully registered for the International Yoga Day. Be ready on 21st June. We\'ll message you venue details soon.' );
	}

}
