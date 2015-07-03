<?php


class HomeController extends BaseController {


	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{		
	   	$featuredBatches=$this->feature->getFeaturedBatches();
		$institutes = $this->institute->getAllInstitutesWithLocality();
		// dd($this->institute->getInstituteForCategory([1,2]));
		$subcategories = $this->subcategory->all();
		$localities = $this->locality->all();
		$user_id=Auth::id();
		if($user_id)
		{
			$user = User::find($user_id);
			$favorite= array(
				"id" => $user->user_favorite,
				"name" => $user->user_name,
				"email" => $user->email,
				"contact_no" => $user->user_contact_no,
				);
			if($favorite['id'])
			{
				$batch = $this->batch->getBatch($favorite['id']);
				$favorite['institute'] = $batch->institute;
				$favorite['batch_id'] = $batch->id;
				$favorite['payment'] = $batch->batch_single_price;
			}
			$booking = Booking::where('user_id',$user_id)->orderBy('created_at', 'desc')->first();
			$booking_institute = null;
			if($booking)
			{
				if(!$booking->reviewed)
				{
					$institute_id = Batch::find($booking->batch_id)->batch_institute_id;
					$booking_institute = Institute::find($institute_id);	
				}
			}
		}
		$homeLang =Lang::get('ViewsLang/home');
		return View::make('Miscellaneous.home',compact('homeLang','featuredBatches','institutes','subcategories','localities','favorite','booking_institute'));
	}

	public function showAdminHome()
	{
		$homeAdminLang =Lang::get('homeAdmin');
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Miscellaneous.Admin.home',compact('homeAdminLang','tableName','count','adminPanelListing'));
	}

}
