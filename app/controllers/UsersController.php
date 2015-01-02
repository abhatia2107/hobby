<?php

class UsersController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| This UserController controls all the behaviour related to user like,
	| login,logout,updateProfile,prfileDeactivation
	|
	|
	*/
	/**
	 *Constructor to initialize the instance of Model User
	 */

	private $admin;
	private $batch;
	private $category;
	private $comment;
	private $institute;
	private $keyword;
	private $locality;
	private $location;
	private $subcategory;
	private $subscription;
	private $user;
	private $venue;

	public function __construct(Admin $adminObject, Batch $batchObject, Category $categoryObject, Comment $commentObject, Institute $instituteObject, Keyword $keywordObject, Locality $localityObject, Location $locationObject, Subcategory $subcategoryObject, Subscription $subscriptionObject, User $userObject, Venue $venueObject)
	{
		$this->admin = $adminObject;
		$this->batch = $batchObject;
		$this->category = $categoryObject;
		$this->comment = $commentObject;
		$this->institute = $instituteObject;
		$this->keyword = $keywordObject;
		$this->locality=$localityObject;
		$this->location = $locationObject;
		$this->subcategory = $subcategoryObject;
		$this->subscription = $subscriptionObject;
		$this->user = $userObject;
		$this->venue = $venueObject;
	}



	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users=User::all();
		return View::make('User.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('User.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentianls=Input::all();
		$validator = Validator::make($credentianls, User::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$user=User::create($credentianls);
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$userDetails=User::find($id);
		return View::make('User.show',compact('userDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$userDetails=User::find($id);
		return View::make('User.create',compact('userDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$credentials=Input::all();
	
		$validator = Validator::make($credentials, User::$rules);
		if($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		$updated=$this->user->updateUser($credentials,$id);
		if ($updated) 
			return Redirect::to('/users')->with('success',Lang::get('user.user_updated'));
		else
			return Redirect::to('/users')->with('failure',Lang::get('user.user_already_failure'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$deleted=User::destroy($id);
		if($deleted)
			return Redirect::to('/users')->with('success',Lang::get('user.user_deleted'));
		else
			return Redirect::to('/users')->with('failure',Lang::get('user.user_delete_failure'));
	}



	public function getLogin()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        if(Auth::check())
		{
			
 	 		return Redirect::to("/");
 		}
		return View::make('Users.login',compact('all_categories','all_locations'));
	}

	/**
	 * [postAuthenticate description]
	 * @return Route
	 */
	public function postAuthenticate()
	{	
		$remember=(Input::has('remember'))?true:false;
		$credentials=$this->getCredentials();
		$email_verification=$this->user->where('user_email','=',Input::get('user_email'))->first();
		if(!$email_verification)
		{
			return Redirect::to('/signup')->with('failure',Lang::get('user.user_not_registered'));
		}
		/* To check whether the user has verified his/her email or not. */
		if(isset($email_verification))
		{
			if($email_verification->user_confirmed==0)
			{
				return Redirect::to('/')->with('failure',Lang::get('user.verify_email'));
			}
		}
		if(Auth::attempt($credentials,$remember))
			{
				Session::flash('success','Welcome user!');
				/*
				|$id is used to store the the unique 'id'
				|of the logged in user in session varible so thar
				|latter this can be used.
				|
				*/
				$data=$this->user->getid(Input::get('user_email'));
				return Redirect::to('/');
			}
			
		else
			{
				return Redirect::to('/')->with('failure',Lang::get('user.invalid_login'))->withInput(Input::except('user_password'));
			}

	}
	/**
	 * Function to get credentials from View
	 * @return array of email,password,confirmed status
	 */
	public function getCredentials()
	{
		return [
			"user_email"=>Input::get('user_email'),
			"user_password"=>Input::get('user_password'),
			"user_confirmed"=>1,
		];
	}
	/**
	*User Gets Logged Out.
	*
	*@return redirect to route
	*/
	public function getLogout()
	{
		Auth::logout();
		Session::flush();
    	Session::flash('success', Lang::get('user.logout'));
    	return Redirect::to("/");
	}
	/**
	*This Is Used To Login Via Facebook
	*Uses Facebook API and call to facebook.com
	*@param 
	*@return Route
	*/
	public function loginFb()
	{
		 $facebook = new Facebook(Config::get('facebook'));
    	$params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    	);
    	return Redirect::to($facebook->getLoginUrl($params));
	}
	/**
	*This function is called when user is authenticated by facebook
	*This function also contains the logic of storing uniqe user to db.
	*@param 
	*@return Route
	*/
	public function loginFbCallback()
	{
		$code = Input::get('code');
    	if (strlen($code) == 0) 
    	{
    		return Redirect::to('/')->with('failure', Lang::get('user.error_fb_comm'));
    	}

    	$facebook = new Facebook(Config::get('facebook'));
    	$uid = $facebook->getUser();

    	if ($uid == 0) return Redirect::to('/')->with('failure', Lang::get('user.error'));
    	/** $me contains all the user information in the form of associative array **/
    	$me = $facebook->api('/me');
 		
    	$user=$this->user->getUid($uid);
    	/*Check Whether user exist in database with the current uid*/
    	if($user)
    	{

    	}
    	/* If the user is new, then with new facbook UID , corresponding details will be added into database*/
    	else
    	{
    		
    		$profiledata['user_fb_id']=$uid;
    		$profiledata['user_first_name']=$me['first_name'];
    		$profiledata['user_last_name']=$me['last_name'];
    		$profiledata['user_email']=$me['email'];
    		$profiledata['user_confirmed']=1;
    		if(isset($me['username']))
    		{
    			$profiledata['user_username']=$me['username'];
    			
    		}
    		$checkEmail=Validator::make(array("user_email"=>$me['email']),User::$uniqueEmail);
    		if($checkEmail->fails())
    		{
    			if(isset($me['username']))
    			{
    				$user=$this->user->where('user_email','=',$me['email'])->update(array(
    						"user_fb_id"=>$uid,
    						"user_username"=>$me['username'],
    					));
    			}
    			else
    			{
    				
    				$user=$this->user->where('user_email','=',$me['email'])->update(array(
    						"user_fb_id"=>$uid,
    					));
    			}
    		}
    		else
    		{
    			User::create($profiledata);
    			$model = User::where('user_fb_id', '=',$uid)->firstOrFail();
    			
    		}
    		//$companyname['company_id']=$model->users_id;
			//Company::create($companyname);
    	}

    	$profiledata['user_access_token']=$facebook->getAccessToken();
    	$this->user->where('user_fb_id','=',$uid)->update($profiledata);
    	$id=$this->user->getUid($uid);
    	$id=$id[0]->id;
    	Auth::loginUsingId($id);
    	return Redirect::to('/')->with('success',Lang::get('user.welcome',array('name'=>$me['first_name'])));
	}
	/**
	*This function is to get all the current logged in user details which is passed to
	*the 'View' in the form of 'userPersonalDetail'.
	*@param Redirect to view 
	*/

	public function getUpdatePersonalDetail()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        $id=Auth::id();
		$userPersonalDetail=User::find($id);
		return View::make('pages.users.personaldetail',compact('userPersonalDetail','all_categories','all_locations'));
	}
	/**
	*This function is to update the personal detail of the logged in user.
	*
	*@param
	*/

	public function postUpdatePersonalDetail()
	{
		$id=Auth::id();
		$userData = Input::all();
		$oldData=$this->user->find($id);
		$validator=Validator::make($userData,User::$rulesUpdatePersonalDetail);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}

 		if(Input::file('user_profile_pic'))
 		{
 		/*Delete the previous profile pic*/
 		if($oldData->user_profile_pic)
 		{
 			$oldExtension=explode(".",$oldData->user_profile_pic);
 			$oldExtension='.'.$oldExtension[1];
 			File::delete('public/user_profile_pic/'.$id.$oldExtension);
 		}
 			$file=Input::file('user_profile_pic');
 			$newExtension = $file->getClientOriginalExtension();
 			$fileName=$id.'.'.$newExtension;
 			if(strlen($file->getClientOriginalName())<10)
 			{
 				$userData['user_profile_pic']=$file->getClientOriginalName().'.'.$newExtension;
 			}
 			else
 			{
 				$userData['user_profile_pic']=substr($file->getClientOriginalName(),0,10).'.'.$newExtension;
 			}
			$upload_success = $file->move('public/user_profile_pic/', $fileName);
			if( $upload_success ) 
			{

			} 
			else
			{
				return "file not uploaded";
   				return Redirect::back()->with('failure',Lang::get('upload.error_profile_pic'));
			}
	}
 		/* Details are updated in database */
 		
		$oldData->update($userData);
 		return Redirect::back()->with('success',Lang::get('user.update_personal_detail'));
	}

	/**
	*This function is to redirect to the signup page
	*
	*@param
	*@return View to signup page
	*/
	public function getSignup()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        return View::make('Users.signup',compact('all_categories','all_locations'));
	}
	/**
	*Function to add new user to the database.
	*
	*@param
	*@return Route to login page with message
	*/
	public function postSignUp()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        $newUserData=Input::all();
        /*dd($newUserData);*/
        $validator=Validator::make($newUserData,User::$rulesSignup);
		if($validator->fails())
		{
			return Redirect::to('/signup')->withErrors($validator)->withInput(Input::except('password'));
		}
		else
		{
			$confirmationCode=str_random();
			$newUserData['user_password']=Hash::make(Input::get('password'));
			$newUserData['user_confirmation_code']=$confirmationCode;
			$email=$newUserData['user_email'];
			$name=$newUserData['user_first_name'];
			$this->user->create($newUserData);
			$userId=$this->user->max('id');
			/**
			 * $data contains the name of the user reggistered and the confirmation code in the form
			 * of array which will be used to confirm the email.
			 * 
			 */
			$data=[
			'name'=>$newUserData['user_first_name'],
			'confirmationcode'=>$confirmationCode,
			'userId'=>$userId,
			];
			/*Confirmation mail is to be send to the newly registerd user*/
			Mail::send('Emails.welcome', $data, function($message) use ($email,$name)
			{
    			$message->to($email,$name)->subject('Welcome!');
			});
			return Redirect::to('/')->with('success',Lang::get('user.register_success'));
		}	
	}
	/**
	*Function to verify the email of the newly registered user. 
	*
	*@param userId and confirmation code; 
	*@return Route to login
	*/
	public function getEmailVerify($userId,$confirmationCode)
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        $validate=$this->user->find($userId);
		if($validate)
		{
			/* to check whether the email has been already verified or not  */
			if($validate->user_confirmed==1)
			{
				return Redirect::to('/')->with('success',Lang::get('user.email_already_verified'));
			}
			/* to check the whether confirmation code is matching or not */
			if($validate->user_confirmation_code==$confirmationCode)
			{
				$validate->user_confirmed=1;
				$validate->user_confirmation_code="";
				$validate->save();
				Auth::loginUsingId($userId);
				return Redirect::to('/')->with('success',Lang::get('user.welcome',array("name"=>$validate->user_first_name)));
			}
			else
			{
				return Redirect::to('/signup')->with('failure','Sorry you are not an authorized user.'); 	
			}
		}
	}
	/**
	 * To visit the "My account page"
	 * @return View to myaccount.blade.php
	 */
	public function getMyAccount()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        return View::make('pages.users.myaccount',compact('all_categories','all_locations'));
	}
	/**
	 * To go to "Change Password" page
	 * @return View
	 */
	public function getChangePassword()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        return View::make('pages.users.changepassword',compact('all_categories','all_locations'));
	}
	/**
	 * Logic for changing the password
	 * @return Routes
	 */
	public function postChangePassword()
	{
		$all_categories= Category::all();
        $all_locations=Location::all();
        $id=Auth::id();
		$validator = Validator::make(Input::all(),User::$rulesChangePassword);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$user         = $this->user->find($id);
			$current_password = Input::get('current_password');
			$password     = Input::get('user_password');
			if(Hash::check($current_password,$user->password))
			{
				$user->password = Hash::make($password);
				$user->save();
				return Redirect::back()->with('success','Your password has been successfully changed');
			}
			else
			{
				return Redirect::back()->with('failure','Your current password is not same');
			}
		}
	}


}