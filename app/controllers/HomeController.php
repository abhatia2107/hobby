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
		$institutes = $this->institute->getAllInstitutesWithLocality();
		// dd($institutes);
		// dd($this->institute->getInstituteForCategory([1,2]));
		$subcategories = $this->subcategory->all();
		$localities = $this->locality->all();
		//dd($localities);
		$homeLang =Lang::get('ViewsLang/home');
		// dd($homeLang);
		return View::make('Miscellaneous.'.$this->device.'.home',compact('homeLang','featuredBatches','institutes','subcategories','localities'));
	}

	public function showDummyWelcome()
	{
		return View::make('Miscellaneous.'.$this->device.'.homeDummy');
	}

	public function showAdminHome()
	{
		$homeAdminLang =Lang::get('homeAdmin');
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Miscellaneous.'.$this->device.'.Admin.home',compact('homeAdminLang','tableName','count','adminPanelListing'));
	}

}
