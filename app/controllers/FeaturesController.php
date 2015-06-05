<?php

class FeaturesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /features
	 *
	 * @return Response
	 */
	public function index()
	{
		$features=$this->feature->getAllFeaturedBatches();
		// dd($features);
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Features.index',compact('features','tableName','count','adminPanelListing'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /features/store
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$feature['feature_batch_id']=$id;
		$created=Feature::create($feature);
		if ($created)
			return Redirect::to('/features')->with('success',Lang::get('feature.feature_created'));
		else
			return Redirect::to('/features')->with('failure',Lang::get('feature.feature_already_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /features/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /features/{id}/edit
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
	 * PUT /features/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	public function enable($id)
	{
		$feature=Feature::withTrashed()->find($id);
		if($feature){
			$featureDisabled=Feature::onlyTrashed()->find($id);
			if($featureDisabled){
				$featureDisabled->restore();	
				return Redirect::to('/features')->with('success',Lang::get('feature.feature_enabled'));
			}
			else{
					return Redirect::to('/features')->with('failure',Lang::get('feature.feature_enable_failed'));
			}
		}
		else
			return Redirect::to('/features')->with('failure',Lang::get('feature.feature_batch_not_exist'));
	}

	public function disable($id)
	{
		$feature=Feature::find($id);	
		//dd($feature);
		if($feature){
			$feature->delete();
			return Redirect::to('/features')->with('success',Lang::get('feature.feature_disabled'));
		}
		else{
			return Redirect::to('/features')->with('failure',Lang::get('feature.feature_disable_failed'));
		}
	}


	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /features/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
		$feature=Feature::withTrashed()->find($id);
		if($feature){
			$feature->forceDelete();
			return Redirect::to('/features')->with('success',Lang::get('feature.feature_deleted'));
		}
		else{
			return Redirect::to('/features')->with('failure',Lang::get('feature.feature_delete_failed'));
		}
	}

}