<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$featuredBatches=$this->feature->getFeaturedBatches();
		// dd($featuredBatches);
		$homeLang =Lang::get('home');
		//dd($homeLang);
		return View::make('Miscellaneous.home',compact('homeLang','featuredBatches'));
	}

	public function showAdminHome()
	{
		//dd($featuredBatches);
		$homeAdminLang =Lang::get('homeAdmin');
		//dd($homeLang);
		return View::make('Miscellaneous.Admin.home',compact('homeAdminLang'));
	}

}
