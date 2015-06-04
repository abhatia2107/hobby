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
		$promos = Promo::withTrashed()->get();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Promos.'.$this->device.'.index',compact('promos','tableName','count','adminPanelListing'));
	}

    /**
     * Display the form for creating a promo.
     *
     * @return View for the form.
     */
    public function create()
    {
        return View::make('Promos.'.$this->device.'.create');
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

		return Redirect::route('promos.index')->with('success',Lang::get('promo.promo_created'));
	}

    /**
     * Display the details for the specific promo.
     * @param $id
     * @return View for show page.
     */
    public function show($id)
    {
        $promo=Promo::withTrashed()->findOrFail($id);
        return View::make('Promos.'.$this->device.'.show',compact('promo'));
    }

    public function edit($id)
    {
        $promo=Promo::withTrashed()->findOrFail($id);
        return View::make('Promos.'.$this->device.'.edit',compact('promo'));
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

		return Redirect::route('promos.index')->with('success',Lang::get('promo.promo_updated'));
	}

    public function enable($id)
    {
        $promo=Promo::withTrashed()->find($id);
        if($promo){
            $promoDisabled=Promo::onlyTrashed()->find($id);
            if($promoDisabled){
                $promoDisabled->restore();
                return Redirect::to('/promos')->with('success',Lang::get('promo.promo_enabled'));
            }
            else{
                return Redirect::to('/promos')->with('failure',Lang::get('promo.promo_enable_failed'));
            }
        }
        else
            return Redirect::to('/promos')->with('failure',Lang::get('promo.promo_user_not_exist'));
    }

    public function disable($id)
    {
        $promo=Promo::find($id);
        //dd($promo);
        if($promo){
            $promo->delete();
            return Redirect::to('/promos')->with('success',Lang::get('promo.promo_disabled'));
        }
        else{
            return Redirect::to('/promos')->with('failure',Lang::get('promo.promo_disable_failed'));
        }
    }


    /**
	 * Remove the specified promo from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$promo=Promo::withTrashed()->findOrFail($id);
        $promo->forceDelete();
		return Redirect::route('promos.index');
	}

	/**
	 * To check if the Promo code entered by user is valid or not.
	 * @param  string  $promo_code
	 * @return boolean            [description]
	 */
	public function isValid()
	{
		$promo_code=Input::get('promo_code');
		$promo=Promo::where('promo_code','=',$promo_code)->valid()->first();
		if(is_null($promo)){
			return 'Invalid Promo Code';
		}
		$user_id=Auth::id();
		if($promo->codeUsedByUser($promo,$user_id)){
			return 'You can use this code only once.';
		}
		return($promo);
	}
}
