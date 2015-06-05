<?php

class FiltersController extends \BaseController {

	
	public function search()
	{
		$keyword=Input::get('keyword');
		$category_id=Input::get('category_id');
		$location_id=Input::get('location_id');
		$chunk=Input::get('chunk');
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		if(!$category_id){
			$subcategoriesForCategory=$this->subcategory->all();
		}
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		
		if(!$location_id)
			$localitiesForLocation = $this->locality->all();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$chunk=$chunk*100;
		$batchesForCategoryLocation=$this->batch->search($keyword,$category_id,$location_id,$chunk);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		// dd($batchesForCategoryLocation[0]->schedules->all());
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id'));
	}

	public function show($category_id,$location_id="0",$chunk="0")
	{
		//check count how many time page is viewed in filter page.
		//For future filters
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;		
		//For display
		if(!$category_id){
			$subcategoriesForCategory=$this->subcategory->all();
		}
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		if(!$location_id)
			$localitiesForLocation = $this->locality->all();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$chunk=$chunk*100;
		$batchesForCategoryLocation = $this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		if(Request::ajax()){
			if($batchesForCategoryLocation)
				return $batchesForCategoryLocation;
			else{
				// dd('test');
				return $batchesForCategoryLocation="";
			}
		}
		else{
			if(empty($batchesForCategoryLocation->toArray()))
			{
				$batchesForCategoryLocation="";
				//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
			}
		// dd($batchesForCategoryLocation[0]->schedules[0]);
			// dd($batchesForCategoryLocation);
			return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id'));
		}
	}

	public function institute($id)
	{
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		$category_id=1;
		$location_id=1;
		if(!$category_id){
			$subcategoriesForCategory=$this->subcategory->all();
		}
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		
		if(!$location_id)
			$localitiesForLocation = $this->locality->all();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForInstitute($id);
		// dd($batchesForCategoryLocation);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		//dd($batchesForCategoryLocation[0]->location);
		$instituteName = $batchesForCategoryLocation[0]->institute;
		$location = $batchesForCategoryLocation[0]->location;
		$metaContent[0] = "$instituteName - $location :: Hobbyix";
		$metaContent[1] = "$instituteName $location, $instituteName classes in $location. Book a session, get address, contact info and reviews.";
		$metaContent[2] = "$instituteName, $instituteName $location";
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent'));
	}

	public function locality($id)
	{
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;	
		$weekdays=$this->weekdays;
		$category_id=1;
		$location_id=1;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForLocality($id);
		// dd($batchesForCategoryLocation[0]);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		$locality = $batchesForCategoryLocation[0]->locality;
		$location = $batchesForCategoryLocation[0]->location;
		$metaContent[0] = "Gym, Zumba, Yoga, Aerobic, Pilates and Kick-Boxing in $locality::Hobbyix";
		$metaContent[1] = "Gym, Zumba, Yoga, Aerobic, Pilates and Kick-Boxing in $locality";
		$metaContent[2] = "Gym, Zumba, Yoga, Aerobic, Pilates and Kick-Boxing in $locality";	
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent'));
	}

	public function subcategory($id)
	{
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		$category_id=1;
		$location_id=1;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForSubcategory($id);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		// dd($batchesForCategoryLocation);
		$subcategory = $batchesForCategoryLocation[0]->subcategory;
		$location = $batchesForCategoryLocation[0]->location;
		$metaContent[0] = "$subcategory classes in $location :: Hobbyix";
		$metaContent[1] = "$subcategory classes in $location";
		$metaContent[2] = "$subcategory, $subcategory classes in $location";
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent'));
	}


	public function filter($subcategoriesString,$localitiesString,$category_id='1',$location_id='1',$chunk='0')
	{
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		$category_id=1;
		$location_id=1;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$subcategories=explode(",",$subcategoriesString);
		$localities=explode(",", $localitiesString);
		// TO DO: If any array is empty make a array corresponding to it with all entries,
		// where condition for all the arrays will be applied in only one statement.  

		if(!$subcategories[0])
		{
			$subcategory=$this->subcategory->getSubcategoriesForCategory($category_id);
			foreach ($subcategory as $data) {
				array_push($subcategories, ($data->id));
			}
		}
		// var_dump($subcategories);
		if(!$localities[0])
		{
			$locality=$this->locality->getLocalitiesForLocation($location_id);
			foreach ($locality as $data) {
				array_push($localities, ($data->id));
			}
		}

		if(!$subcategories[0]&&!$localities[0]){
			$chunk=$chunk*100;
			$batchesForCategoryLocation=$this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		}
		else{
			$chunk=$chunk*100;
			$batchesForCategoryLocation= $this->batch->getBatchForFilter($subcategories,$localities,$chunk);
		}
		// dd($batchesForCategoryLocation);

		if(Request::ajax()){
			if($batchesForCategoryLocation){
				return $batchesForCategoryLocation;
			}
			else{
				// dd('test');
				$batchesForCategoryLocation ='';
				return $batchesForCategoryLocation;
			}
		}
		else{
			// dd($batchesForCategoryLocation);
			return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id'));
		}
	}
}