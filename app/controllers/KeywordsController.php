<?php

class KeywordsController extends \BaseController {

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
	public function show($category_id,$location_id="0",$chunk="0")
	{
		//For future filters
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		
		//For display
		if(!$category_id)
			$subcategoriesForCategory=$this->subcategory->all();
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoryForCategory($category_id);
		if(!$location_id)
			$localitiesForLocation = $this->locality->all();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$chunk=$chunk*100;
		$batchesForCategoryLocation = $this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		if(Request::ajax()){
		//	dd($batchesForCategoryLocation);
			if($batchesForCategoryLocation)
				return $batchesForCategoryLocation;
			else
				return $batchesForCategoryLocation="Empty";
		}
		else{
			// dd($batchesForCategoryLocation);
			return View::make('Keywords.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id'));
		}
	}

	public function filter($subcategoriesString,$localitiesString,$trialsString,$category_id,$location_id,$chunk)
	{
		$subcategories=explode(",",$subcategoriesString);
		$localities=explode(",", $localitiesString);
		$trials=explode(",", $trialsString);
		// TO DO: If any array is empty make a array corresponding to it with all venues,
		// where condition for all the arrays will be applied in only one statement.  

		if(!$subcategories[0])
		{
			$subcategory=$this->subcategory->getSubcategoriesForCategory($category_id);
			foreach ($subcategory as $data) {
				array_push($subcategories, ($data->id));
			}
		}
		if(!$localities[0])
		{
			$locality=$this->locality->getLocalitiesForLocation($location_id);
			foreach ($locality as $data) {
				array_push($localities, ($data->id));
			}
		}
		// dd($trials);
		//0 is also a valid option.
		if(!$trials[0])
		{
			$trials=$this->trial;
			array_push($trials,0);
		}

		/*if(!$subcategories[0]&&!$localities[0]&&!$trials[5]){
			$chunk=$chunk*100;
			$batchesForCategoryLocation=$this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		}
		else*/{
			$chunk=$chunk*100;
			$batchesForCategoryLocation= $this->batch->getBatchForFilter($subcategories,$localities,$trials,$chunk);
		}
		if(Request::ajax()){
			if($batchesForCategoryLocation)
				return $batchesForCategoryLocation;
			else
				return $batchesForCategoryLocation="Empty";
		}
		else{
			dd($batchesForCategoryLocation);
			return View::make('Errors.pageNotFound');
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