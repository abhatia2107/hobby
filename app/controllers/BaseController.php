<?php

class BaseController extends Controller {

	protected $admin;
	protected $batch;
	protected $category;
	protected $comment;
	protected $featured;
	protected $feedback;
	protected $institute;
	protected $keyword;
	protected $locality;
	protected $location;
	protected $subcategory;
	protected $subscription;
	protected $user;
	protected $venue;

	protected $age_group=array(1 => "All","Children","Adult");
	protected $difficulty_level=array(1 => "All","Beginners","Intermediate","Advanced");
	protected $gender_group=array(1 => "Both","Male","Female");
	protected $recurring=array(1 => "Not recurring","Weekly","Monthly","Yearly");
	protected $trial=array(1 => "Trial Not Available","Free Trial any time walk-in","Paid Trial any time walk-in","Free Trial only in beginning of batch","Paid Trial only in beginning of batch");
	protected $weekdays=array(1 => "monday","tuesday","wednesday","thursday","friday","saturday","Sunday");
	protected $adminPanelList=array(
									'categories' => 'Categories', 
									'features' => 'Features', 
									'feedbacks' => 'Feedbacks', 
									'institutes' => 'Institutes', 
									'localities' => 'Localities', 
									'locations' => 'Locations',
									'subcategories' => 'Subcategories', 
									'subscriptions' => 'Subscriptions',
									'users' => 'Users', 
								);

	/**
	 *Constructor to initialize the instance of Model User
	 */

	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, Comment $commentObject,Feature $featureObject, Feedback $feedbackObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->comment = $commentObject;
		$this->feature = $featureObject;
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

	public function getCountForAdmin()
	{
		return $countForAdmin=array(
			'users' => User::count(),
			'institutes' => Institute::count(),
			'batches' => Batch::count(),
			'approvals' => $this->batch->getPendingApprovals(),
		); 
	}
}
