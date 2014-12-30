<?php

class SubcategoriesController extends \BaseController {

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
	 * GET /localities
	 *
	 * @return Response
	 */
	public function index()
	{
		$subcategories=$this->subcategory->getAllSubcategories();
		return View::make('Subcategories.index',compact('subcategories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /localities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		return View::make('Subcategories.create',compact('all_categories','all_locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /localities
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Subcategory::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$this->category->increment_no($credentials['subcategory_category_id']);
		$created=Subcategory::create($credentials);
		if ($created)
			return Redirect::to('/subcategories')->with('success',Lang::get('subcategory.subcategory_created'));
		else
			return Redirect::to('/subcategories')->with('failure',Lang::get('subcategory.subcategory_already_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subcategoryDetails=Subcategory::find($id);
		return View::make('Subcategories.show',compact('subcategoryDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /localities/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$subcategoryDetails=Subcategory::find($id);
		return View::make('Subcategories.create',compact('all_categories','all_locations','subcategoryDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Subcategory::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->subcategory->updateSubcategory($credentials,$id);
		if ($updated) 
			return Redirect::to('/subcategories')->with('success',Lang::get('subcategory.subcategory_updated'));
		else
			return Redirect::to('/subcategories')->with('failure',Lang::get('subcategory.subcategory_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category=$this->subcategory->getSubcategory($id);
		$this->category->decrement_no($category[0]->subcategory_category_id);
		$deleted=Subcategory::destroy($id);
		if($deleted)
			return Redirect::to('/subcategories')->with('success',Lang::get('subcategory.subcategory_deleted'));
		else
			return Redirect::to('/subcategories')->with('failure',Lang::get('subcategory.subcategory_delete_failed'));
	}
}