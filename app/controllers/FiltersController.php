<?php

class FiltersController extends \BaseController {

	
	public function search()
	{
		$keyword=Input::get('keyword');
		$category_id=Input::get('category_id');
		$location_id=Input::get('location_id');
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		if(!$category_id){
			$category_id=1;
		}
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		
		if(!$location_id)
			$location_id = 1;
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->search($keyword,$category_id,$location_id);
		if(empty($batchesForCategoryLocation->getTotal()))
		{
			$batchesForCategoryLocation="";
			//$batchesForCategoryLocation=$this->feature->getFeaturedBatches();
		}
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		
		// dd($batchesForCategoryLocation[0]->schedules->all());
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays', 'keyword', 'batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id'));
	}

	public function show($category_id,$location_id="0")
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
		$batchesForCategoryLocation = $this->batch->getBatchForCategoryLocation($category_id,$location_id);
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
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
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
			return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','locationSubcategories','category_id','location_id','location','metaContent'));
		}
	}

	public function institute($id)
	{
        if(!is_numeric($id))
        {
            $institute=Institute::where('institute_url',$id)->first();
            if(!is_null($institute))
            {
            	$id=$institute->id;
            }
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
		if(empty($batchesForCategoryLocation->getTotal()))
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
			$locArr = [$batchesForCategoryLocation[0]->locality];
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
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','subcategories','instituteName','location','locality','locArr'));
	}

	public function locality($id)
	{
		if(!is_numeric($id))
        {
            $locality=Locality::where('locality_url',$id)->first();
            if(!is_null($locality))
            {
            	$id=$locality->id;
            }
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
		$locArr = [$id];
		if(empty($batchesForCategoryLocation->getTotal()))
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
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','localitySubcategories','location','locality','locArr'));
	}

	public function subcategory($id)
	{
		if(!is_numeric($id))
        {
            $subcategory=Subcategory::where('subcategory',$id)->first();
            if(!is_null($subcategory))
            {
            	$id=$subcategory->id;
            }
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
		$subArr = [$id];
		if(empty($batchesForCategoryLocation->getTotal()))
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
			$localityArray= $localities->lists('locality');
			// $localities = ["locality1","locality2","locality3"];
			$localitiesString = implode(", $subcategory ",$localityArray);
			$metaContent[0] = "$subcategory classes in $location :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in exploring all $subcategory classes in $location. Get access to all activities with Hobbyix Membership.";
			$metaContent[2] = "$subcategory, $subcategory $location, $subcategory classes in $location, $subcategory $localitiesString";
		}
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','localities','subcategory','location','subArr'));
	}


	public function filter($subcategoriesString="0",$localitiesString="0")
	{
		if($subcategoriesString=="Fitness")
			$subcategoriesString=0;
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
			$subcategories=$this->subcategory->getSubcategoriesForCategory($category_id)->lists('id');
			$subArr=[];
		}
		else
		{
			$subArr = Subcategory::whereIn('subcategories.subcategory', $subcategories)->lists('id');
		}
		if(!$localities[0])
		{
			$localities=$this->locality->getLocalitiesForLocation($location_id)->lists('id');
			$locArr=[];
		}
		else
		{
			$locArr = Locality::whereIn('localities.locality_url', $localities)->lists('id');
		}
		if(!$subcategories[0]&&!$localities[0]){
			$batchesForCategoryLocation=$this->batch->getBatchForCategoryLocation($category_id,$location_id);
		}
		else{
			$batchesForCategoryLocation= $this->batch->getBatchForFilter($subcategories,$localities);
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
		else if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		else{
			// dd($batchesForCategoryLocation);
			return View::make('Filters.show',compact('age_group','difficulty_level','gender_group','trial','weekdays','batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','subArr','locArr'));
		}
	}

}