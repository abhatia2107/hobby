<?php

class CategoriesController extends \BaseController {


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
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories=Category::all();
		return View::make('Categories.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		return View::make('Categories.create',compact('all_categories','all_locations'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Category::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$credentials['category_no_of_subcategories']=0;
		$created=Category::create($credentials);
		if ($created) 
			return Redirect::to('/categories')->with('success',Lang::get('category.category_created'));
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_already_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoryDetails=$this->subcategory->getSubcategoryForCategory($id);
		$category=$this->category->getCategory($id);
		return View::make('Categories.show',compact('category','categoryDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
		$categoryDetails=Category::find($id);
		return View::make('Categories.create',compact('all_categories','all_locations','categoryDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Category::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->category->updateCategory($credentials,$id);
		if ($updated) 
			return Redirect::to('/categories')->with('success',Lang::get('category.category_updated'));
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted1=Category::destroy($id);
		$this->subcategory->deleteCategory($id);
		if($deleted)
			return Redirect::to('/categories')->with('success',Lang::get('category.category_deleted'));
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_delete_failed'));
	}

}