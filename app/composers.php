<?php

/**
* Composer class for having some variables required in Layout File to be rendered
* for all views.
*/
class Composer
{
	
	private $category;	
	private $location;
		
	public function __construct(Category $categoryObject, Location $locationObject)
	{
		$this->category = $categoryObject;
		$this->location = $locationObject;
		//dd($all_locations);

		View::composer('*', function($view)
		{
			//$this->category->all()
			$all_categories=array(1,2,3);
			$all_locations=$this->location->all();
		    $homeLang =Lang::get('home');
			$view->with($all_categories, $all_locations,$homeLang);
		});
	}

	public function compose($view)
    {
		$all_categories=$this->category->all();
		$all_locations=$this->location->all();
	    $homeLang =Lang::get('home');
		$view->with($all_categories, $all_locations,$homeLang);
	}
}
/*
View::composer('hello', function($view)
{
	$all_categories=array(1,2,3);			
	$view->with($all_categories);
});*/