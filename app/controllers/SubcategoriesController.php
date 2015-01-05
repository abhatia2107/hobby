<?php

class SubcategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /localities
	 *
	 * @return Response
	 */
	public function index()
	{
		$subcategories=$this->subcategory->getAllSubcategories();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Subcategories.index',compact('subcategories','tableName'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /localities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Subcategories.create');
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
		$subcategoryDetails=Subcategory::find($id);
		return View::make('Subcategories.create',compact('subcategoryDetails'));
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

	// TO DO: Category table should also be affected by this.
	public function enable($id)
	{
		$category=Category::withTrashed()->find($id);
		if($category){
			$categoryDisabled=Category::onlyTrashed()->find($id);
			if($categoryDisabled){
				$categoryDisabled->restore();	
				return Redirect::to('/categories')->with('success',Lang::get('category.category_enabled'));
			}
			else{
					return Redirect::to('/categories')->with('failure',Lang::get('category.category_enable_failed'));
			}
		}
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_user_not_exist'));
	}

	public function disable($id)
	{
		$category=Category::find($id);	
		//dd($category);
		if($category){
			$category->delete();
			return Redirect::to('/categories')->with('success',Lang::get('category.category_disabled'));
		}
		else{
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_disable_failed'));
		}
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
		$category=Category::withTrashed()->find($id);
		if($category){
			$category->forceDelete();
			return Redirect::to('/categories')->with('success',Lang::get('category.category_deleted'));
		}
		else{
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_delete_failed'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*public function destroy($id)
	{
		$category=$this->subcategory->getSubcategory($id);
		$this->category->decrement_no($category[0]->subcategory_category_id);
		$deleted=Subcategory::destroy($id);
		if($deleted)
			return Redirect::to('/subcategories')->with('success',Lang::get('subcategory.subcategory_deleted'));
		else
			return Redirect::to('/subcategories')->with('failure',Lang::get('subcategory.subcategory_delete_failed'));
	}*/
}