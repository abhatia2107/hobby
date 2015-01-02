<?php

class KeywordsController extends \BaseController {


	private $admin;
	private $batch;
	private $category;
	private $categoryInstitute;
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
	
	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, CategoryInstitute $categoryInstituteObject, Comment $commentObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->categoryInstitute = $categoryInstituteObject;
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
	 * GET /keywords
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$venues=Venue::all();
		return View::make('Keywords.index',compact('venues'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /keywords/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Keywords.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /keywords
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /keywords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($category_id,$location_id)
	{
		//For headers
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		
		//For filters
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		
		//For display
		$chunk=0;
		if(!$category_id)
			$subcategoriesForCategory=$this->subcategory->all();
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoryForCategory($category_id);
		if(!$location_id)
			$localitiesForLocation = $this->locality->all();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation = $this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		return View::make('Keywords.show',compact('all_categories','all_locations','age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory'));
	}

	public function filter($subcategoriesString,$localitiesString,$category_id,$location_id,$chunk)
	{
		if(Request::ajax()){
			$subcategories=$subcategoriesString.split(",");
			$localities=$localitiesString.split(",");
			if(!$subcategories&&!$localities)
				$batchesForCategoryLocation=$this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
			else
				$batchesForCategoryLocation= $this->batch->getBatchForFilter($subcategories,$localities,$chunk);
			//dd($batchesForCategoryLocation);
			return $batchesForCategoryLocation;
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /keywords/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /keywords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /keywords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	
}