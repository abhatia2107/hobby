<?php

class CategoriesController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories=Category::withTrashed()->get();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Categories.index',compact('categories','tableName'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Categories.create');
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
		$categoryDetails=$this->subcategory->getSubcategoriesForCategory($id);
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
		$categoryDetails=Category::find($id);
		return View::make('Categories.create',compact('categoryDetails'));
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

	// TO DO: Subcategory table should also be affected by this.
	public function enable($id)
	{
		$category=Category::withTrashed()->find($id);
		if($category){
			$categoryDisabled=Category::onlyTrashed()->find($id);
			if($categoryDisabled){
				$this->subcategory->enableSubcategoriesForCategory($id);
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
		// $category=$this->category->find($id);
		if($category){
			$this->subcategory->disableSubcategoriesForCategory($id);
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
			$this->subcategory->deleteSubcategoriesForCategory($id);
			$category->forceDelete();
			return Redirect::to('/categories')->with('success',Lang::get('category.category_deleted'));
		}
		else{
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_delete_failed'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function destroy($id)
	{
		$deleted=Category::destroy($id);
		$this->subcategory->deleteCategory($id);
		if($deleted)
			return Redirect::to('/categories')->with('success',Lang::get('category.category_deleted'));
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_delete_failed'));
	}
*/
}