<?php

class KeywordsController extends \BaseController {


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
	private $weekdays=array('1'=>"monday","tuesday","wednesday","thursday","friday","saturday","sunday");
	
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
		$weekdays=$this->weekdays;
		$all_categories=$this->category->all();
		return View::make('Keywords.create',compact('all_categories','weekdays'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /keywords
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
		dd($credentials);
	}

	/**
	 * Display the specified resource.
	 * GET /keywords/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		$batchDetails=Batch::find($id);
		$weekdays=$this->weekdays;
		$batch_class=array();
		foreach($this->weekdays as $data){
			if($batchDetails['batch_class_on_'.$data])
				array_push($batch_class,$data);
		}
		$batchDetails['batch_class']=$batch_class;
		$all_categories=$this->category->all();
		return View::make('Keywords.create',compact('batchDetails','all_categories','weekdays'));
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
		$credentials=Input::all();
		foreach($this->weekdays as $data){
			$credentials['batch_class_on_'.$data]=0;
		}
		if(!empty($credentials['batch_class'])){
			foreach($credentials['batch_class'] as $data){
				$credentials['batch_class_on_'.$data]=1;
	    	}
		}
		dd($credentials);
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