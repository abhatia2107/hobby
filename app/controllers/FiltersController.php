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
		$chunk=$chunk*40;
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
		if(!is_numeric($category_id))
        {
            $category_id=Category::where('category',$category_id)->first()->id;
        }
        if(!is_numeric($location_id))
        {
            $location_id=Location::where('location',$location_id)->first()->id;
        }
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;		
		//For display
		if(!$category_id){
			$subcategoriesForCategory=$this->subcategory->getAllSubcategories();
		}
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		if(!$location_id)
			$localitiesForLocation = $this->locality->getAllLocalities();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$chunk=$chunk*40;
		$batchesForCategoryLocation = $this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		if(Request::ajax())
		{
			if($batchesForCategoryLocation)
			{
				return $batchesForCategoryLocation;
			}
			else
			{
				return $batchesForCategoryLocation="";		
			}					
		}
		else
		{
			if(empty($batchesForCategoryLocation->toArray()))
			{
				$batchesForCategoryLocation="";				
			}
			else
			{
				// $locality = $batchesForCategoryLocation[0]->locality;			
				$location = $batchesForCategoryLocation[0]->location;
				$locationSubcategories = $this->subcategory->getAllSubcategories();
				$subcategoryArray = array();
				$index = 0;
		        foreach ($locationSubcategories as $subcategory) {
		            array_push($subcategoryArray,$subcategory->subcategory);
		            if($index==5)
		            	break;
		            $index++;	
		        }
				$subcategoriesString = implode(", ",$subcategoryArray);
				$metaContent[0] = "Gym, Zumba, Yoga, Aerobic, Pilates and Kick-Boxing in $location :: Hobbyix";
				$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString classes in $location. Get access to all activities with Hobbyix Membership.";
				$subcategoriesString = implode(" classes in $location, ",$subcategoryArray);
				$metaContent[2] = "$subcategoriesString classes in $location";
			}
			// dd($batchesForCategoryLocation);
			return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','locationSubcategories','category_id','location_id','location','metaContent'));
		}
	}

	public function institute($id)
	{
        if(!is_numeric($id))
        {
            $id=Institute::where('institute_url',$id)->first()->id;
        }
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		$category_id=1;
		$location_id=1;
		if(!$category_id){
			$subcategoriesForCategory=$this->subcategory->getAllSubcategories();
		}
		else
			$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		
		if(!$location_id)
			$localitiesForLocation = $this->locality->getAllLocalities();
		else		
			$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForInstitute($id);
		// dd($batchesForCategoryLocation);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			// $batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		//dd($batchesForCategoryLocation[0]->location);
		else
		{
			$instituteName = $batchesForCategoryLocation[0]->institute;
			$location = $batchesForCategoryLocation[0]->location;
			$locality = $batchesForCategoryLocation[0]->locality;			
			$locality_id = $batchesForCategoryLocation[0]->venue_locality_id;
			$subcategories= $this->subcategory->getSubcategoryForInstitute($id);
        	$subcategoryArray = array();
        	$index = 0;
	        foreach ($subcategories as $subcategory) {
	            array_push($subcategoryArray,$subcategory->subcategory);
	            if($index==5)
	            	break;
	            $index++;	            
	        }
			$subcategoriesString = implode(", ",$subcategoryArray);						
			$metaContent[0] = "$instituteName in $locality, $location :: Hobbyix";
			//dd($metaContent[0]);
			$metaContent[1] = "$instituteName provides $subcategoriesString in $location. Get access to all the activities with Hobbyix Membership.";
			$subcategoriesString = implode(" $locality, ",$subcategoryArray);
			$metaContent[2] = "$instituteName, $instituteName in $locality, $instituteName in $location, $subcategoriesString $locality";
		}
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','subcategories','instituteName','location','locality','locality_id'));
	}

	public function locality($id)
	{
		if(!is_numeric($id))
        {
            $id=Locality::where('locality_url',$id)->first()->id;
        }
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
		$locality_id = $id;
		// dd($batchesForCategoryLocation[0]);
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		else
		{
			$locality = $batchesForCategoryLocation[0]->locality;			
			$location = $batchesForCategoryLocation[0]->location;
			$localitySubcategories = $this->subcategory->getSubcategoryInLocality($id);
			$subcategoryArray = array();
			$index = 0;
	        foreach ($localitySubcategories as $subcategory) {
	            array_push($subcategoryArray,$subcategory->subcategory);
	            if($index==5)
	            	break;
	            $index++;	
	        }
			$subcategoriesString = implode(", ",$subcategoryArray);
			$metaContent[0] = "Gym, Zumba, Yoga, Aerobic, Pilates and Kick-Boxing in $locality :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString classes in $locality. Get access to all activities with Hobbyix Membership.";
			$subcategoriesString = implode(" classes in $locality, ",$subcategoryArray);
			$metaContent[2] = "$subcategoriesString classes in $locality";		
		}		
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','localitySubcategories','location','locality','locality_id'));
	}

	public function subcategory($id)
	{
		if(!is_numeric($id))
        {
            $id=Subcategory::where('subcategory',$id)->first()->id;
        }
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
		$subcategory_id = $id;
		if(empty($batchesForCategoryLocation->toarray()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		// dd($batchesForCategoryLocation);
		else
		{
			$subcategory = $batchesForCategoryLocation[0]->subcategory;
			$location = $batchesForCategoryLocation[0]->location;
			$localities = $this->locality->getLocalitiesForSubcategory($id);
			$localityArray= array();
			foreach ($localities as $locality) {
							array_push($localityArray, $locality->locality);
						}			
			// $localities = ["locality1","locality2","locality3"];
			$localitiesString = implode(", $subcategory ",$localityArray);
			$metaContent[0] = "$subcategory classes in $location :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in exploring all $subcategory classes in $location. Get access to all activities with Hobbyix Membership.";
			$metaContent[2] = "$subcategory, $subcategory $location, $subcategory classes in $location, $subcategory $localitiesString";
		}
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','localities','subcategory','location','subcategory_id'));
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
			$chunk=$chunk*40;
			$batchesForCategoryLocation=$this->batch->getBatchForCategoryLocation($category_id,$location_id,$chunk);
		}
		else{
			$chunk=$chunk*40;
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