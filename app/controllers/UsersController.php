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
	
	//Not going use now. But can use it in future, in admin panel.
	public function index()
	{
		$users=User::all();
		$tableName="$_SERVER[REQUEST_URI]";
		return View::make('Users.index',compact('users','tableName'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Users.create');
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
	public function show()
	{
		$id=Auth::id();
		$userDetails=User::find($id);
		return View::make('Users.show',compact('userDetails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		return View::make('Users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id=Auth::id();
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


	public function enable($id)
	{
		$user=Institute::withTrashed()->find($id);
		if($user){
			$userDisabled=Institute::onlyTrashed()->find($id);
			if($userDisabled){
				$userDisabled->restore();	
				return Redirect::to('/users')->with('success',Lang::get('user.user_enabled'));
			}
			else{
					return Redirect::to('/users')->with('failure',Lang::get('user.user_enable_failed'));
			}
		}
		else
			return Redirect::to('/users')->with('failure',Lang::get('user.user_not_exist'));
	}

	public function disable($id)
	{
		$user=Institute::find($id);	
		//dd($user);
		if($user){
			$user->delete();
			return Redirect::to('/users')->with('success',Lang::get('user.user_disabled'));
		}
		else{
			return Redirect::to('/users')->with('failure',Lang::get('user.user_disable_failed'));
		}
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
		$user=Institute::withTrashed()->find($id);
		if($user){
			$user->forceDelete();
			return Redirect::to('/users')->with('success',Lang::get('user.user_deleted'));
		}
		else{
			return Redirect::to('/users')->with('failure',Lang::get('user.user_delete_failed'));
		}
	}


	public function getLogin()
	{
        if(Auth::check())
		{
 	 		return Redirect::to("/");
 		}
		return View::make('Users.login');
	}

	/**
	 * [postAuthenticate description]
	 * @return Route
	 */
	public function postAuthenticate()
	{	
		$remember=(Input::has('remember'))?true:false;
		$credentials=$this->getCredentials();
		// dd($credentials);
		$userDetails=$this->user->where('email','=',Input::get('email'))->first();
		if(!$userDetails)
		{
			return Redirect::to('/users/signup')->with('failure',Lang::get('user.user_not_registered'));
		}
		/* To check whether the user has verified his/her email or not. */
		if(isset($userDetails))
		{
			if($userDetails->user_confirmed==0)
			{
				return Redirect::back()->with('failure',Lang::get('user.verify_email'));
			}
		}
		if(Auth::attempt($credentials,$remember))
		{
			/*
			|$id is used to store the the unique 'id'
			|of the logged in user in session varible so that
			|later this can be used.
			|
			*/
			//$data=$this->user->getid(Input::get('email'));
    		return Redirect::intended('/')->with('success','Welcome '.$userDetails['user_first_name'].' '.$userDetails['user_last_name']);
		}
		else
		{
			return Redirect::to('/users/login')->with('failure',Lang::get('user.invalid_login'))->withInput(Input::except('password'));
		}
	}


	/**
	 * Function to get credentials from View
	 * @return array of email,password,confirmed status
	 */
	public function getCredentials()
	{
		return [
			"email"=>Input::get('email'),
			"password"=>Input::get('password'),
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
	*This function is to redirect to the signup page
	*
	*@param
	*@return View to signup page
	*/
	public function getSignup()
	{
		return View::make('Users.signup');
	}
	/**
	*Function to add new user to the database.
	*
	*@param
	*@return Route to login page with message
	*/
	public function postSignUp()
	{
		$newUserData=Input::all();
        /*dd($newUserData);*/
        $validator=Validator::make($newUserData,User::$rules);
		if($validator->fails())
		{
			return Redirect::to('/users/signup')->withErrors($validator)->withInput(Input::except('password'));
		}
		else
		{
			$confirmationCode=str_random();
			$password=Input::get('password');
			$newUserData['password']=Hash::make($password);
			if (Hash::needsRehash($newUserData['password']))
			{
			    $newUserData['password'] = Hash::make($password);
			}
			$newUserData['user_confirmation_code']=$confirmationCode;
			$newUserData['user_subscription_token']=true;
			$email=$newUserData['email'];
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
			$subject="Welcome to Hobby";
			Mail::later(15,'Emails.welcome', $data, function($message) use ($email,$name,$subject)
			{
    			$message->to($email,$name)->subject($subject);
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
				return Redirect::to('/users/signup')->with('failure',Lang::get('user.email_verification_failed')); 
			}
		}
	}
	
	/**
	 * To go to "Change Password" page
	 * @return View
	 */
	public function getChangePassword()
	{
		return View::make('Users.changePassword');
	}
	/**
	*This function is to get all the current logged in user details which is passed to
	*the 'View' in the form of 'userPersonalDetail'.
	*@param Redirect to view 
	*/


	/**
	 * Logic for changing the password
	 * @return Routes
	 */
	public function postChangePassword()
	{
        $id=Auth::id();
		$validator = Validator::make(Input::all(),User::$rulesChangePassword);
		if($validator->fails())
		{
			return Redirect::back()->withErrors($validator);
		}
		else
		{
			$userDetails = User::find($id);
			$current_password = Input::get('current_password');
			$password = Input::get('password');
			if(Hash::check($current_password,$userDetails->password))
			{
				$userDetails->password = Hash::make($password);
				$userDetails->save();
				return Redirect::back()->with('success', Lang::get('user.user_password_changed'));
			}
			else
			{
				return Redirect::back()->with('failure', Lang::get('user.user_password_change_failed'));
			}
		}
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
    		$profiledata['email']=$me['email'];
    		$profiledata['user_confirmed']=1;
    		if(isset($me['username']))
    		{
    			$profiledata['user_username']=$me['username'];
    			
    		}
    		$checkEmail=Validator::make(array("email"=>$me['email']),User::$uniqueEmail);
    		if($checkEmail->fails())
    		{
    			if(isset($me['username']))
    			{
    				$user=$this->user->where('email','=',$me['email'])->update(array(
    						"user_fb_id"=>$uid,
    						"user_username"=>$me['username'],
    					));
    			}
    			else
    			{
    				
    				$user=$this->user->where('email','=',$me['email'])->update(array(
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
	
}