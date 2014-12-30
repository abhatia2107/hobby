<?php

use Carbon\Carbon;

class BatchesController extends \BaseController {

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



	/**
	 * Display a listing of the resource.
	 * GET /batches
	 *
	 * @return Response
	 */
	public function index()
	{
		$batches=Batch::all();
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		return View::make('Miscellaneous.home',compact('batches','all_categories','all_locations'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /batches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$all_subcategories=$this->subcategory->all();
		$all_venues=$this->venue->all();
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$recurring=$this->recurring;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		return View::make('Batches.create',compact('all_categories','all_locations','all_subcategories','all_venues','difficulty_level','age_group','gender_group','recurring','trial','weekdays'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /batches
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		foreach($this->weekdays as $data){
			$credentials['batch_class_on_'.$data]=0;
		}
		if(!empty($credentials['batch_class'])){
			foreach($credentials['batch_class'] as $data){
				$credentials['batch_class_on_'.$data]=1;
	    	}
		}
		$dateToday=date_create(Carbon::now()->toDateString());
		$startDate=date_create($credentials['batch_start_date']);
		$endDate=date_create($credentials['batch_end_date']);
		$credentials['batch_institute_id']=1;
		$validator = Validator::make($credentials, Batch::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_currentDateError'));
		}
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_startEndDateError'));		
		}
		if($credentials['batch_no_of_classes_in_week']!=count($credentials['batch_class']))
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_no_of_class_error'));
		if (Input::hasFile('batch_photo'))
		{

		   	/**for long file name **/
		   	$extension = Input::file('batch_photo')->getClientOriginalExtension();
		   	$name = Input::file('batch_photo')->getClientOriginalName();
		   	$imageName = $this->getImageName($name,$extension);
		   	$credentianls['batch_photo']=$imageName;

		   	$fileName = $maxEventId.'.'.$extension;
		   	$thumbnailFile=Input::file('batch_photo');
		   	$thumbnailFile->move($destinationPathForThumbnail,$fileName);
			
		}
		unset($credentials["batch_class"]);
		unset($credentials["batch_photo"]);
		$batch=Batch::create($credentials);
		if($batch) 
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_created'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_create_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$batchDetails=Batch::find($id);
		return View::make('Batches.show',compact('batchDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /batches/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$age_group=$this->age_group;
		$all_categories=$this->category->all();
		$all_subcategories=$this->subcategory->all();
		$all_venues=$this->venue->all();
		$batchDetails=Batch::find($id);
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$recurring=$this->recurring;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		$batch_class=array();
		foreach($this->weekdays as $data){
			if($batchDetails['batch_class_on_'.$data])
				array_push($batch_class,$data);
		}
		$batchDetails['batch_class']=$batch_class;
		return View::make('Batches.create',compact('batchDetails','all_categories','all_subcategories','all_venues','difficulty_level','age_group','gender_group','recurring','trial','weekdays'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
		foreach($this->weekdays as $data){
			$credentials['batch_class_on_'.$data]=0;
		}
		if(!empty($credentials['batch_class'])){
			foreach($credentials['batch_class'] as $data){
				$credentials['batch_class_on_'.$data]=1;
	    	}
		}
		$credentials['batch_institute_id']=1;
		$dateToday=date_create(Carbon::now()->toDateString());
		$startDate=date_create($credentials['batch_start_date']);
		$endDate=date_create($credentials['batch_end_date']);
		$validator = Validator::make($credentials, Batch::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_currentDateError'));
		}
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_startEndDateError'));		
		}
		if($credentials['batch_no_of_classes_in_week']!=count($credentials['batch_class']))
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_no_of_class_error'));
		unset($credentials["batch_class"]);
		unset($credentials["batch_photo"]);
		$updated=$this->batch->updateBatch($credentials,$id);
		if ($updated) 
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_updated'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_already_failed'));

	}

	public function validationBeforeSavingBatch($credentials)
	{
		$dateToday=date_create(Carbon::now()->toDateString());
		$startDate=date_create($credentials['batch_start_date']);
		$endDate=date_create($credentials['batch_end_date']);
		$validator = Validator::make($credentials, Batch::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_currentDateError'));
		}
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_startEndDateError'));		
		}
		if($credentials['batch_no_of_classes_in_week']!=count($credentials['batch_class']))
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_no_of_class_error'));
	}
	/**
	 * Remove the specified resource from storage.
	 * DELETE /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Batch::destroy($id);
		if($deleted)
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_deleted'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_delete_failed'));
	}

}