<?php

class BaseController extends Controller {

	protected $admin;
	protected $batch;
	protected $category;
	protected $comment;
	protected $featured;
	protected $feedback;
	protected $institute;
	protected $locality;
	protected $location;
	protected $schedule;
	protected $subcategory;
	protected $subscription;
	protected $user;
	protected $venue;

	protected $age_group=array(1 => "All","Children","Adult");
	protected $difficulty_level=array(1 => "All","Beginners","Intermediate","Advanced");
	protected $gender_group=array(1 => "Both","Male","Female");
	protected $recurring=array(1 => "Not recurring","Weekly","Monthly","Yearly");
	protected $schedule_session_month=array("Session","Month");
	protected $trial=array(1 => "No Trial Class Available","Free Trial Class Available", "Paid Trial Class Available");
	protected $weekdays=array(1 => "monday","tuesday","wednesday","thursday","friday","saturday","sunday");
	protected $facilitiesAvailable=['shower_room', 'steam', 'air_conditioning', 'locker_room', 'cafe', 'changing_room'];
	protected $adminPanelList=array(
									'categories' => 'Categories', 
									'features' => 'Features', 
									'feedbacks' => 'Feedbacks', 
									'institutes' => 'Institutes', 
									'localities' => 'Localities', 
									'locations' => 'Locations',
									'promos' => 'Promos',
									'subcategories' => 'Subcategories', 
									'subscriptions' => 'Subscriptions',
									'users' => 'Users', 
								);

	/**
	 *Constructor to initialize the instance of all Models.
	 */

	public function __construct()
	{
		$this->admin = new Admin;
		$this->batch = new Batch;
		$this->category = new Category;
		$this->comment = new Comment;
		$this->feature = new Feature;
		$this->feedback = new Feedback;
		$this->institute = new Institute;
		$this->locality= new Locality;
		$this->location = new Location;
		$this->schedule = new Schedule;
		$this->subcategory = new Subcategory;
		$this->subscription = new Subscription;
		$this->user = new User;
		$this->venue = new Venue;
		$useragent=$_SERVER['HTTP_USER_AGENT'];		
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
