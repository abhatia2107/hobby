<?php

class FiltersController extends \BaseController {

	
	public function search()
	{
		$keyword=Input::get('keyword');
		$category_id=Input::get('category_id');
		$location_id=Input::get('location_id');
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
		else
		{
    		$category=$this->category->first()->category;
			$location = $this->location->first()->location;
			$subcategory = $this->category->first()->category;
			$locality = $this->location->first()->location;
			$localities = $this->locality->getAllLocalities();
			$locationSubcategories = $this->subcategory->getAllSubcategories();
			$subcategoryArray= $locationSubcategories->take(12)->lists('subcategory');
			$subcategoriesString = implode(", ",$subcategoryArray);
			$metaContent[0] = "Gyms, Zumba, Yoga, Swimming, Boxing in $location :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString in $location. Get access to all the activities with Hobbyix Membership.";
			$subcategoriesString = implode(" in $location, ",$subcategoryArray);
			$metaContent[2] = "$subcategoriesString in $location";
			$metaContent[3] = "$category Activities in $location";
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
		return View::make('Filters.show',compact('keyword', 'batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id', 'localities','subcategory','locationSubcategories','locality','location','metaContent'));
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
			//For Meta data in the Filter Page
    		$location = $this->location->first()->location;
			$category = $this->category->first()->category;
			$locationSubcategories = $this->subcategory->getAllSubcategories();
			$subcategoryArray= $locationSubcategories->take(12)->lists('subcategory');
			$subcategoriesString = implode(", ",$subcategoryArray);
			$metaContent[0] = "$category Activities in $location :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString in $location. Get access to all the activities with Hobbyix Membership.";
			$subcategoriesString = implode(" $location, ",$subcategoryArray);
			$metaContent[2] = "$subcategoriesString in $location";
			$metaContent[3] = "$category Activities in $location";
			return View::make('Filters.show',compact('batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','locationSubcategories','category_id','location_id','location','metaContent'));
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
			//For Meta data in the Filter Page when no results come.
			$instituteName = $institute->institute;
    		$location = $this->location->first()->location;
			$category = $this->category->first()->category;
			$locationSubcategories = $this->subcategory->getAllSubcategories();
			$subcategoryArray= $locationSubcategories->take(12)->lists('subcategory');
			$subcategoriesString = implode(", ",$subcategoryArray);
			$metaContent[0] = "$instituteName in $location :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString in $location. Get access to all the activities with Hobbyix Membership.";
			$subcategoriesString = implode(" $location, ",$subcategoryArray);
			$metaContent[2] = "$subcategoriesString in $location";
			$metaContent[3] = "$instituteName in $location";
		}
		//dd($batchesForCategoryLocation[0]->location);
		else
		{
			$instituteName = $institute->institute;
			$location = $batchesForCategoryLocation[0]->location;
			$locality = $batchesForCategoryLocation[0]->locality;			
			$locArr = [$batchesForCategoryLocation[0]->locality];
			$instituteSubcategories= $this->subcategory->getSubcategoryForInstitute($id);
			$subcategoryArray= $subcategories->take(12)->lists('subcategory');
			$subcategoriesString = implode(", ",$subcategoryArray);						
			$metaContent[0] = "$instituteName in $locality, $location :: Hobbyix";
			//dd($metaContent[0]);
			$metaContent[1] = "$instituteName provides $subcategoriesString in $location. Get access to all the activities with Hobbyix Membership.";
			$subcategoriesString = implode(" $locality, ",$subcategoryArray);
			$metaContent[2] = "$instituteName, $instituteName in $locality, $instituteName in $location, $subcategoriesString $locality";
			$metaContent[3] = "$instituteName in $locality, $location";
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
		$filterPageTitle = "";
		return View::make('Filters.show',compact('batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','instituteSubcategories','instituteName','location','locality','locArr'));
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
		$category_id=1;
		$category = $this->category->first()->category;
		$location_id=1;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForLocality($id);
		$locArr = [$id];
		$location = $this->location->first()->location;
		$locality = $locality->locality;
		if(empty($batchesForCategoryLocation->getTotal()))
		{
			$batchesForCategoryLocation="";
			//For Meta data in the Filter Page when no result come.
			$subcategories = $this->subcategory->getAllSubcategories();
		}
		else
		{
			$subcategories = $this->subcategory->getSubcategoryInLocality($id);
		}
		$subcategory = $this->category->first()->category;
		$localities = $this->locality->getAllLocalities();
		$subcategoryArray= $subcategories->take(12)->lists('subcategory');
		$subcategoriesString = implode(", ",$subcategoryArray);
		$metaContent[0] = "Gyms, Zumba, Yoga, Swimming, Boxing in $locality :: Hobbyix";
		$metaContent[1] = "Hobbyix helps you in finding $subcategoriesString in $locality. Get access to all the activities with Hobbyix Membership.";
		$subcategoriesString = implode(" in $locality, ",$subcategoryArray);
		$metaContent[2] = "$subcategoriesString in $locality";
		$metaContent[3] = "$category Activities in $locality";
		// dd($subcategories);
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		// dd(empty($batchesForCategoryLocation));
		return View::make('Filters.show',compact('batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','metaContent','subcategories','location','locality','localities','subcategory','locArr'));
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
		$category_id=1;
		$location_id=1;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$batchesForCategoryLocation=$this->batch->getBatchesForSubcategory($id);
		$subArr = [$id];
		$location = $this->location->first()->location;
		$subcategory = $subcategory->subcategory;
		$locationSubcategories = $this->subcategory->getAllSubcategories();
		if(empty($batchesForCategoryLocation->getTotal()))
		{
			$batchesForCategoryLocation="";
			//For Meta data in the Filter Page when no result come.
    		$localities = $this->locality->getAllLocalities();
		}
		// dd($batchesForCategoryLocation);
		else
		{
			$localities = $this->locality->getLocalitiesInSubcategory($id);
		}
		$locality = $this->location->first()->location;
		$localityArray= $localities->take(12)->lists('locality');
		$localitiesString = implode(", $subcategory ",$localityArray);
		$metaContent[0] = "$subcategory in $location :: Hobbyix";
		$metaContent[1] = "Hobbyix helps you in finding $subcategory in $location. Get access to all the activities with Hobbyix Membership.";
		$metaContent[2] = "$subcategory, $subcategory $location, $subcategory in $location, $subcategory $localitiesString";
		$metaContent[3] = "$subcategory in $location";
		if(Request::segment(1)=='json')
		{
			$response['institute']=$batchesForCategoryLocation;
			if($batchesForCategoryLocation)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		return View::make('Filters.show',compact('batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id', 'location', 'locationSubcategories','metaContent','localities','subcategory','locality','location','subArr'));
	}


	public function filter($subcategoriesString="0",$localitiesString="0")
	{
		$location = $this->location->first()->location;
		$category = $this->category->first()->category;
		if($localitiesString==$location)
			$localitiesString=0;
		if($subcategoriesString==$category)
			$subcategoriesString=0;
		$category_id=$this->category_id;
		$location_id=$this->location_id;
		$subcategoriesForCategory =  $this->subcategory->getSubcategoriesForCategory($category_id);
		$localitiesForLocation = $this->locality->getlocalitiesForLocation($location_id);
		$subcategories=explode(",",$subcategoriesString);
		$localities=explode(",", $localitiesString);
		if(!$subcategories[0])
		{
			$subcategoryArray= $subcategoriesForCategory->lists('subcategory');
			$subcategories=$this->subcategory->getSubcategoriesForCategory($category_id)->lists('id');
			$subcategory = $this->category->first()->category;
			$subArr=[];
		}
		else
		{
			if(sizeof($subcategories)==1)
			{
				$subcategory = $subcategories[0];
				$subcategoryArray = $subcategories;
			}
			else
			{
				$subcategory = $this->category->first()->category;
				$subcategoryArray = $subcategoriesForCategory->lists('subcategory');
			}
			$subArr = Subcategory::whereIn('subcategories.subcategory', $subcategories)->lists('id');
		}
		if(!$localities[0])
		{
			$localityArray= $localitiesForLocation->lists('locality');
			$localities=$localitiesForLocation->lists('id');
			$locality = $this->location->first()->location;
			$locArr=[];
		}
		else
		{
			if(sizeof($localities)==1)
			{
				$locality = $localities[0];
				$localityArray = $localities;
			}
			else
			{
				$locality = $this->location->first()->location;
				$localityArray = $localitiesForLocation->lists('locality');
			}
			$locArr = Locality::whereIn('localities.locality_url', $localities)->lists('id');
		}
		$subcategoriesString = implode(" in $locality, ",$subcategoryArray);
		$localitiesString = implode(", $subcategory in " ,$localityArray);
		$batchesForCategoryLocation= $this->batch->getBatchForFilter($subcategories,$localities);
	
		//For Meta data in the Filter Page when no result come.
		if($subcategory==$category)
		{
			$metaContent[0] = "Gyms, Zumba, Yoga, Swimming, Boxing in $locality :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding Gyms, Zumba, Yoga, Swimming, Boxing in $locality. Get access to all the activities with Hobbyix Membership.";
			$metaContent[2] = "$subcategory, $locality, $subcategory in $localitiesString, $subcategoriesString in $locality";
			$metaContent[3] = "$subcategory Activities in $locality";
		}
		else
		{
			$metaContent[0] = "$subcategory in $locality :: Hobbyix";
			$metaContent[1] = "Hobbyix helps you in finding $subcategory in $locality. Get access to all the activities with Hobbyix Membership.";
			$metaContent[2] = "$subcategory, $locality, $subcategory in $localitiesString, $subcategoriesString in $locality";
			$metaContent[3] = "$subcategory in $locality";
		}
		if(empty($batchesForCategoryLocation->getTotal()))
		{
			$batchesForCategoryLocation="";
			$localities = $this->locality->getAllLocalities();
			$subcategories = $this->subcategory->getAllSubcategories();
		}
		else
		{
			if(!empty($subArr))
				$localities = $this->locality->getLocalitiesInSubcategory($subArr[0]);
			else
				$localities = $this->locality->getAllLocalities();
			if(!empty($locArr))
				$subcategories= $this->subcategory->getSubcategoryInLocality($locArr[0]);
			else
				$subcategories= $this->subcategory->getAllSubcategories();
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
			return View::make('Filters.show',compact('batchesForCategoryLocation','localitiesForLocation','subcategoriesForCategory','category_id','location_id','subArr','locArr','locality','subcategory','location','subcategories','localities','metaContent'));
		}
	}

}