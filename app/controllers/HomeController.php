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

	private $admin;
	private $batch;
	private $category;
	private $comment;
	private $institute;
	private $keyword;
	private $locality;
	private $location;
	private $subcategory;
	private $subscription;
	private $user;
	private $venue;

	public $count_recent=6;
	private $age_group=array("All","Children","Adult");
	private $difficulty_level=array("All","Beginners","Intermediate","Advanced");
	private $gender_group=array("Both","Male","Female");
	private $recurring=array("Not recurring","Weekly","Monthly","Yearly");
	private $trial=array("Not Available","Free Trial any time walk-in","Paid Trial any time walk-in","Free Trial only in beginning of batch","Paid Trial only in beginning of batch");
	private $weekdays=array("monday","tuesday","wednesday","thursday","friday","saturday","sunday");


	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, Comment $commentObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->comment = $commentObject;
		$this->institute = $instituteObject;
		$this->keyword = $keywordObject;
		$this->locality=$localityObject;
		$this->location = $locationObject;
		$this->subcategory = $subcategoryObject;
		$this->subscription = $subscriptionObject;
		$this->user = $userObject;
		$this->venue = $venueObject;
	}


	public function showWelcome()
	{
		$recentBatches=$this->batch->getRecentBatches($this->count_recent);
		//dd($recentBatches);
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$homeLang =Lang::get('home');
		//dd($homeLang);
		return View::make('Miscellaneous.home',compact('all_categories','all_locations','homeLang','recentBatches'));
	}

}
