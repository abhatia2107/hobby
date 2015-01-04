<?php

class BaseController extends Controller {

	protected $admin;
	protected $batch;
	protected $category;
	protected $comment;
	protected $feedback;
	protected $institute;
	protected $keyword;
	protected $locality;
	protected $location;
	protected $subcategory;
	protected $subscription;
	protected $user;
	protected $venue;

	protected $age_group=array("All","Children","Adult");
	protected $difficulty_level=array("All","Beginners","Intermediate","Advanced");
	protected $gender_group=array("Both","Male","Female");
	protected $recurring=array("Not recurring","Weekly","Monthly","Yearly");
	protected $trial=array("Not Available","Free Trial any time walk-in","Paid Trial any time walk-in","Free Trial only in beginning of batch","Paid Trial only in beginning of batch");
	protected $weekdays=array("monday","tuesday","wednesday","thursday","friday","saturday","sunday");
	
	/**
	 *Constructor to initialize the instance of Model User
	 */

	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, Comment $commentObject, Feedback $feedbackObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->comment = $commentObject;
		$this->feedback = $feedbackObject;
		$this->institute = $instituteObject;
		$this->keyword = $keywordObject;
		$this->locality=$localityObject;
		$this->location = $locationObject;
		$this->subcategory = $subcategoryObject;
		$this->subscription = $subscriptionObject;
		$this->user = $userObject;
		$this->venue = $venueObject;
	}


	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
