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
		$subcategories=Subcategory::all();
		return View::make('Subcategories.index',compact('subcategories'));
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
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, Subcategory::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$comment=Subcategory::create($credentianls);
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

	/**
	 * Remove the specified resource from storage.
	 * DELETE /localities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=Subcategory::destroy($id);
		if($deleted)
			return Redirect::to('/subcategories')->with('success',Lang::get('subcategory.subcategory_deleted'));
		else
			return Redirect::to('/subcategories')->with('failure',Lang::get('subcategory.subcategory_delete_failed'));
	}

}