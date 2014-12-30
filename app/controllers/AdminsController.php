<?php

class AdminsController extends \BaseController {

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
	 * GET /admins
	 *
	 * @return Response
	 */
	public function index()
	{
		$admins=$this->admin->getalladmins();
		//dd($admins);
		return View::make('Admins.index',compact('admins'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admins/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admins
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		//dd($credentials);
		$validator = Validator::make($credentials, Admin::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_create_failed'));
		}
		$user_id=$this->user->userExist($credentials['admin_user_id']);
		if(!$user_id)
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_user_not_exist'));
		}
		$email=$this->user->getEmailVerified($credentials);
		if(!$email)
		{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',Lang::get('admin.admin_email_mismatch'));
		}
		$created=Admin::create($credentials);
		dd($created);
		if($created)
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_created'));
		else
			return Redirect::back()->withInput()->with('failure',Lang::get('admin.admin_create_failed'));	
	}

	/**
	 * Display the specified resource.
	 * GET /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$adminDetails=Admin::find($id);
		return Redirect::to('/users/'.$adminDetails['admin_user_id']);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admins/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$adminDetails=Admin::find($id);
		return View::make('Admins.create',compact('adminDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, Admin::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->admin->updateAdmin($credentials,$id);
		if ($updated) 
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_updated'));
		else
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_already_failed'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admins/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Admin::destroy($id);
		if($deleted)
			return Redirect::to('/admins')->with('success',Lang::get('admin.admin_deleted'));
		else
			return Redirect::to('/admins')->with('failure',Lang::get('admin.admin_delete_failed'));
	}

}