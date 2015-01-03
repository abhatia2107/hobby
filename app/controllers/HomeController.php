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

	public $count_recent=6;

	public function showWelcome()
	{
		$recentBatches=$this->batch->getRecentBatches($this->count_recent);
		//dd($recentBatches);
		$homeLang =Lang::get('home');
		//dd($homeLang);
		return View::make('Miscellaneous.home',compact('homeLang','recentBatches'));
	}

}
