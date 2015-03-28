<?php

use Carbon\Carbon;

class PromosController extends \BaseController {

	/**
	 * Display a listing of promos
	 *
	 * @return Response
	 */
	public function index()
	{
		$promos = Promo::all();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Promos.index',compact('promos','tableName','count','adminPanelListing'));
	}

	/**
	 * Store a newly created promo in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Promo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Promo::create($data);

		return Redirect::route('Promos.index')->with('success',Lang::get('promo.promo_created'));
	}

	/**
	 * Update the specified promo in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$promo = Promo::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Promo::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$promo->update($data);

		return Redirect::route('Promos.index')->with('success',Lang::get('promo.promo_updated'));
	}

	/**
	 * Remove the specified promo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Promo::destroy($id);

		return Redirect::route('Promos.index');
	}

	/**
	 * To check if the Promo code entered by user is valid or not.
	 * @param  string  $promocode 
	 * @return boolean            [description]
	 */
	public function isValid($promocode)
	{
		$promo=Promo::where('promocode','=',$promocode)->valid()->first();

		return($promo->users);
	}
}
