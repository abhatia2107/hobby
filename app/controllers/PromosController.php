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
		return View::make('Promos.index',compact('promos','tableName','count','adminPanelListing'));
	}

    /**
     * Display the form for creating a promo.
     *
     * @return View for the form.
     */
    public function create()
    {
        return View::make('Promos.create');
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
        return View::make('Promos.show',compact('promo'));
    }

    public function edit($id)
    {
        $promo=Promo::withTrashed()->findOrFail($id);
        return View::make('Promos.edit',compact('promo'));
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
	 * If the code is expired.
	 * If the code is used max no of times allowed per user.
	 * If the code is applicable for membership or batch.
	 * @param  string  $promo_code
	 * @return boolean            [description]
	 */
	public function isValid($promo_code="",$no_of_session="1")
	{
		if(!$promo_code)
			return Lang::get('promo.promo_empty');
		$referrer = URL::previous();
		if($referrer==url("/memberships"))
		{
			$page='membership';
			$payment=$this->membershipVal['payment'];
		}
		else if(strpos($referrer,"/batch"))
		{
			$page='batch';
			$batch_id = substr($referrer, strrpos($referrer, '/') + 1);
			$batch=$this->batch->getbatch($batch_id);
			$payment=$batch->batch_single_price*$no_of_session;
		}
		else
		{
			return Lang::get('promo.promo_invalid_request');
		}
		$promo=Promo::where('promo_code','=',$promo_code)->valid()->first();
		if($promo)
		{
			if($page=="batch")
			{
				if(!$promo->coupon_valid_on_single_class)
				{
					return Lang::get('promo.promo_not_applicable');
				}
			}
			else
			{
				if($promo->coupon_valid_on_single_class)
				{
					return Lang::get('promo.promo_not_applicable');
				}	
			}
			$user_id=Auth::id();
			if(isset($promo->max_allowed_count_per_user))
			{
				if($promo->codeUsedByUser($promo,$user_id))
				{
					return Lang::get('promo.promo_max_per_user',['count'=>$promo->max_allowed_count_per_user]);
				}
			}
			$promo->count++;
			$promo->users()->attach($user_id);
			$promo->save();
			if(isset($promo->discount_percentage))
			{
				$discount=$payment*$promo->discount_percentage/100;
				if(isset($promo->max_discount))
				{
					if($discount>$promo->max_discount)
					{
						$final=$payment-$promo->max_discount;
					}
					else
					{
						$final=$payment-$discount;
					}
				}
				else
				{
					$final=$payment-$discount;
				}
			}
			else if(isset($promo->cash_discount))
			{
				$final=$payment-$promo->cash_discount;
			}
			else
			{
					return Lang::get('promo.promo_invalid');
			}
		}
		else
		{
			$expired=Promo::where('promo_code','=',$promo_code)->expired()->first();
			if($expired)
			{
				return Lang::get('promo.promo_expired');
			}
			else
			{
				return Lang::get('promo.promo_invalid');
			}

		}
		$user_id=Auth::id();
		if($user_id)
		{
			$user=User::find($user_id);
			$wallet_amount=$user->user_wallet;
			if($wallet_amount)
				$final=$final-$wallet_amount;
		}
		if($final<0)
			return 0;
		else
			return $final;
	}
}
