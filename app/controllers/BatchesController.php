<?php
/*
use Carbon\Carbon;
*/
class BatchesController extends \BaseController {

	protected $schedulesControllerObject;

	public function __construct()
	{
		$this->schedulesControllerObject=new SchedulesController; 
		parent::__construct();
	}

	public function index()
	{
		//dd($this->device);
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		$trial=$this->trial;
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$weekdays=$this->weekdays;
		$user_id=Auth::id();
		$batchDetails=$this->batch->getBatchesForUser($user_id);
		// dd($batchDetails->schedules->all());
		$institute_id=$this->institute->getInstituteforUser($user_id);
		// dd($institute_id);
		//dd($batchDetails[2]);
		return View::make('Batches.index',compact('age_group','batchDetails','difficulty_level','gender_group','institute_id','trial','weekdays'));
	}

	public function createentry()
	{
		$users=$this->user->all();
		$institutes=$this->institute->all();
		$all_subcategories=$this->subcategory->all();
		$user_id=Auth::id();
		$venuesForUser=$this->venue->all();
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		//Locations are being send for venue create form which will be called up in the modal of venue.
		$localities=$this->locality->all();
		// $recurring=$this->recurring;
		$schedule_session_month=$this->schedule_session_month;
		$trial=$this->trial;
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$institute_id=$this->institute->getInstituteforUser($user_id);
		$weekdays=$this->weekdays;
		$facilitiesAvailable= $this->facilitiesAvailable;
		return View::make('Batches.createentry',compact('institutes','users','all_subcategories','venuesForUser','difficulty_level','age_group','gender_group','institute_id','localities','schedule_session_month','trial','weekdays','facilitiesAvailable'));
	}

	public function storeentry()
	{
		$data=Input::all();
		// dd($data);
		$institute=Institute::find($data['batch_institute_id']);
		$subcategory=Subcategory::find($data['batch_subcategory_id'])->subcategory;
		$venue=Venue::find($data['batch_venue_id']);
		$locality=Locality::find($venue->venue_locality_id)->locality_url;
		if((($institute->institute_user_id)==$data['batch_user_id'])&&($venue->venue_user_id==$data['batch_user_id'])){
			$data['batch']=$institute->institute_url.'-'.$subcategory.'-'.$locality;
			$data['batch_category_id']=1;
			// $data['batch_approved']=1;
			unset($data['csrf_token']);
			dd($data);
			Batch::create($data);
			return Redirect::back()->with('success','Entry added');
		}
		else{
			return Redirect::back()->withInput()->with('failure','user, venue and institute not match');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /batches/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$all_subcategories=$this->subcategory->all();
		$user_id=Auth::id();
		$venuesForUser=$this->venue->getVenueForUser($user_id);
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		//Locations are being send for venue create form which will be called up in the modal of venue.
		$localities=$this->locality->all();
		// $recurring=$this->recurring;
		$schedule_session_month=$this->schedule_session_month;
		$trial=$this->trial;
		//For the navbar of vendor panel. It is being used in layout file to show this navbar.
		$institute_id=$this->institute->getInstituteforUser($user_id);
		$weekdays=$this->weekdays;
		$facilitiesAvailable= $this->facilitiesAvailable;
		return View::make('Batches.create',compact('all_subcategories','venuesForUser','difficulty_level','age_group','gender_group','institute_id','localities','schedule_session_month','trial','weekdays','facilitiesAvailable'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /batches
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials=Input::all();
		// dd($credentials);
		$user_id=Auth::id();
		$batch_institute_id=Institute::getInstituteforUser($user_id);
		$credentials['batch_user_id']=$user_id;
		$credentials['batch_institute_id']=$batch_institute_id;
		$institute=Institute::find($batch['batch_institute_id'])->institute_url;
		$subcategory=Subcategory::find($batch['batch_subcategory_id'])->subcategory;
		$venue=Venue::find($batch['batch_venue_id']);
		$locality=Locality::find($venue->venue_locality_id)->locality_url;
		$batch->batch=$institute.'-'.$subcategory.'-'.$locality;
		$validator = Validator::make($credentials, Batch::$rules);
		unset($credentials['csrf_token']);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		/*
		//	Date validation code for future. 
		$dateToday=date_create(Carbon::now()->toDateString());
		$startDate=date_create($credentials['batch_start_date']);
		$endDate=date_create($credentials['batch_end_date']);
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_currentDateError'));
		}
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_startEndDateError'));		
		}
		*/
		/*if (Input::hasFile('batch_photo'))
		{

		   	// for long file name 
		   	$extension = Input::file('batch_photo')->getClientOriginalExtension();
		   	$name = Input::file('batch_photo')->getClientOriginalName();
		   	$imageName = $this->getImageName($name,$extension);
		   	$credentials['batch_photo']=$imageName;

		   	$fileName = $maxEventId.'.'.$extension;
		   	$thumbnailFile=Input::file('batch_photo');
		   	$thumbnailFile->move($destinationPathForThumbnail,$fileName);
			$credentials["batch_photo"]=1;
		}*/
		$schedule_arr=$credentials['schedule'];
		unset($credentials['schedule']);
		// dd($schedule_arr);
		$batch=Batch::create($credentials);
		$batch_id=$batch->id;
		$errors=$this->schedulesControllerObject->store($schedule_arr,$batch_id);
		if(!empty((array)$errors))
		{
			$batch=Batch::find($batch_id);
			$batch->forceDelete();
			return Redirect::back()->withInput()->withErrors($errors);
		}
		if($batch) {
			/*$user=User::find(Auth::id())->toArray();
			$email=$user['email'];
			$name=$user['user_name'];
			$subject=Lang::get('batch.batch_create_mail',array("batch"=>$credentials['batch']));
			$data['name']=$name;
			$data['batch']=$credentials['batch'];
			Mail::later(15,'Emails.batch.create', $data, function($message) use ($email,$name,$subject)
			{
				$message->to($email,$name)->subject($subject);
			});*/
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_created'));
		}
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_create_failed'));
	}

	/**
	 * Display the specified resource.
	 * GET /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{		
		$batchDetails= $this->batch->getBatch($id);
		$age_group=$this->age_group;
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		// $recurring=$this->recurring;
		$trial=$this->trial;
		$weekdays=$this->weekdays;
		if(Request::segment(1)=='json')
		{
			$response['batches']=$batchDetails;
			if($batchDetails)
				$response['success']=1;
			else
				$response['success']=0;
		 	return json_encode($response);
		}
		if(!is_null($batchDetails))
		{

			$subcategory = $batchDetails->subcategory;
			$instituteName = $batchDetails->institute;
			$locality = $batchDetails->locality;
			$location = $batchDetails->location;
			$metaContent[0] = "$instituteName - $locality:: Hobbyix";
			$metaContent[1] = "$instituteName $locality, $subcategory classes in $locality - $location. Book a session, get address, contact info and reviews.";
			$metaContent[2] = "$instituteName $locality, $instituteName $location, $subcategory classes in $locality, $subcategory classes in $location, $subcategory classes $instituteName";
			$institute_id=$batchDetails->batch_institute_id;
			$comments=$this->comment->getCommentForInstitute($institute_id);
			$batchesOfInstitute=$this->batch->getBatchesForInstitute($institute_id);
			$institutesOfSubcategoryInLocality=$this->batch->getInstitutesForSubcategoryInLocality($batchDetails->batch_subcategory_id, $batchDetails->venue_locality_id);
			$subcategoriesInLocality=$this->subcategory->getSubcategoryInLocality($batchDetails->venue_locality_id);
			// dd($batchDetails->category);
			$credentials['price']=$batchDetails->batch_single_price;
			$credentials['payment']=$batchDetails->batch_single_price;
			$credentials['wallet_amount']=0;
			$credentials['wallet_balance']=0;
			if($user_id=Auth::id())
			{
				$user=User::find($user_id);
				$credentials['wallet_amount']=$user->user_wallet;
				if($credentials['wallet_amount'])
					$credentials['payment']=$credentials['price']-$credentials['wallet_amount'];
				else
					$credentials['payment']=$credentials['price'];
				if($credentials['price']<$credentials['wallet_amount'])
					$credentials['wallet_balance']=$credentials['wallet_amount']-$credentials['payment'];
			}
			// dd($credentials);
			return View::make('Batches.show',compact('batchDetails','credentials','user','difficulty_level','age_group','gender_group','trial','weekdays','metaContent','batchesOfInstitute','institutesOfSubcategoryInLocality','subcategoriesInLocality'));
		}
		else
		{
			App::abort(404);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 * GET /batches/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_id=Auth::id();
		$age_group=$this->age_group;
		$all_subcategories=$this->subcategory->all();
		$batchDetails=Batch::find($id);
		$venuesForUser=$this->venue->getVenueForUser($user_id);
		$difficulty_level=$this->difficulty_level;
		$gender_group=$this->gender_group;
		//Locations are being send for venue create form which will be called up in the modal of venue.
		$localities=$this->locality->all();
		// $recurring=$this->recurring;
		$schedule_session_month=$this->schedule_session_month;
		$trial=$this->trial;
		$institute_id=$batchDetails->batch_institute_id;
		$weekdays=$this->weekdays;
		$scheduleForBatch=$this->schedulesControllerObject->edit($id);
		// dd($batchDetails);
		// dd($scheduleForBatch['0']['id']);
		$batchDetails->schedule=$scheduleForBatch;
		// dd($batchDetails);
		return View::make('Batches.create',compact('batchDetails','all_subcategories','venuesForUser','difficulty_level','age_group','gender_group','institute_id','localities', 'schedule_session_month','trial','weekdays'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
		$user_id=Auth::id();
		$batch_institute_id=Institute::getInstituteforUser($user_id);
		$credentials['batch_institute_id']=$batch_institute_id;
		$institute=Institute::find($batch['batch_institute_id'])->institute_url;
		$subcategory=Subcategory::find($batch['batch_subcategory_id'])->subcategory;
		$venue=Venue::find($batch['batch_venue_id']);
		$locality=Locality::find($venue->venue_locality_id)->locality_url;
		$batch->batch=$institute.'-'.$subcategory.'-'.$locality;
		$validator = Validator::make($credentials, Batch::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		/*$dateToday=date_create(Carbon::now()->toDateString());
		$startDate=date_create($credentials['batch_start_date']);
		$endDate=date_create($credentials['batch_end_date']);
		if(($dateToday >= $startDate)||($dateToday >= $endDate))
		{
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_currentDateError'));
		}
		if($startDate > $endDate)
		{	
			return Redirect::back()->withInput()->with('failure',Lang::get('batch.batch_startEndDateError'));		
		}*/
		unset($credentials['csrf_token']);
		// unset($credentials["batch_photo"]);
		$schedule_arr=$credentials['schedule'];
		unset($credentials['schedule']);
		$errors=$this->schedulesControllerObject->update($schedule_arr,$id);
		if(!empty((array)$errors))
		{
			return Redirect::back()->withInput()->withErrors($errors);
		}
		$updated=$this->batch->updateBatch($credentials,$id);
		if ($updated) 
			return Redirect::to('/batches')->with('success',Lang::get('batch.batch_updated'));
		else
			return Redirect::to('/batches')->with('failure',Lang::get('batch.batch_already_failed'));

	}

	public function enable($id)
	{
		$batch=Batch::withTrashed()->find($id);
		if($batch){
			$batchDisabled=Batch::onlyTrashed()->find($id);
			if($batchDisabled){
				$batchDisabled->restore();	
				return Redirect::back()->with('success',Lang::get('batch.batch_enabled'));
			}
			else{
					return Redirect::back()->with('failure',Lang::get('batch.batch_enable_failed'));
			}
		}
		else
			return Redirect::back()->with('failure',Lang::get('batch.batch_not_exist'));
	}

	public function disable($id)
	{
		$batch=Batch::find($id);	
		//dd($batch);
		if($batch){
			$batch->delete();
			return Redirect::back()->with('success',Lang::get('batch.batch_disabled'));
		}
		else{
			return Redirect::back()->with('failure',Lang::get('batch.batch_disable_failed'));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /batches/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->schedulesControllerObject->destroy($id);
		$batch=Batch::withTrashed()->find($id);
		if($batch){
			$batch->forceDelete();
			return Redirect::back()->with('success',Lang::get('batch.batch_deleted'));
		}
		else{
			return Redirect::back()->with('failure',Lang::get('batch.batch_delete_failed'));
		}
	}


	public function pending()
	{
		$batches=$this->batch->getPendingBatches();	
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Batches.approve',compact('batches','tableName','count','adminPanelListing'));
	}

	public function approve($id)
	{
		$approved=$this->batch->ApproveBatch($id);
		if($approved)
			return Redirect::back()->with('success',Lang::get('batch.batch_approved'));
		else
			return Redirect::to()->with('failure',Lang::get('batch.batch_approve_failed'));
	}

	public function history()
	{
		$date=Carbon::now()->subDay();
		$history['oneDay'] = $this->batch->getBatchOneDay($date);
		$history['active'] = $this->batch->getBatchActive();
		$history['disabled'] = $this->batch->getBatchDisabled();
		return $history;
	}

	public function approvalHistory()
	{
		$date=Carbon::now()->subDay();
		$history['oneDay'] = $this->batch->getPendingApprovalsOneDay($date);
		$history['approved'] = $this->batch->getBatchActive();
		$history['disabled'] = $this->batch->getBatchDisabled();
		return $history;
	}

	public function sendMessage()
	{
		$credentials=Input::all();
		$validator = Validator::make($credentials, Batch::$rulesMessage);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		//To user
		$email=$credentials['msgInputEmail'];
		$name=$credentials['msgInputName'];
		$subject=Lang::get('message.message_emailSubjectRecieved');
		Mail::queue('Emails.message.messageRecieved', $credentials, function($message) use ($email,$name,$subject)
		{
			$message->to($email,$name)->subject($subject);
		});

		// To vendor.
		$email=$credentials['email'];
		$name=$credentials['institute'];
		$subject=Lang::get('message.message_subject',array("batch"=>$credentials['batch']));
		Mail::later(120,'Emails.message.sendMessage', $credentials, function($message) use ($email,$name,$subject)
		{
			$message->to($email,$name)->subject($subject);
		});

		return Redirect::back()->with('success',Lang::get('message.message_sent',array("institute"=>$credentials['institute'])));
	}

	public function increment($id)
	{
        if (is_numeric($id))
        {
            $column = 'id';
        }
        else
        {
            $column = 'batch'; // This is the name of the column you wish to search
        }
		Batch::where('batches.'.$column,'=',$id)->increment('batch_view');
	}
	/*
	public function order($id)
	{
		$user_id=Auth::id();
		// $batchDetails=$this->batch->getBatchesForUser($user_id);
		$institute_id=$this->institute->getInstituteforUser($user_id);
		$batchDetails=Batch::find($id);
		// dd($batchDetails);
		return View::make('Batches.order',compact('batchDetails','institute_id'));
	}*/
}