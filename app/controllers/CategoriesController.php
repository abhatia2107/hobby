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
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Category::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$category=Category::create($credentianls);
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
		$categoryDetails=Category::find($id);
		return View::make('Categories.show',compact('categoryDetails'));
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Category::destroy($id);
		if($deleted)
			return Redirect::to('/categories')->with('success',Lang::get('category.category_deleted'));
		else
			return Redirect::to('/categories')->with('failure',Lang::get('category.category_delete_failed'));
	}

}