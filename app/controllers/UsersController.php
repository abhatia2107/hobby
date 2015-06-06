<?php

use Carbon\Carbon;

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\GraphLocation;
use Facebook\GraphSessionInfo;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;

session_start();


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
	
	
	public function index()
	{
		$users=User::withTrashed()->get();
		$tableName="$_SERVER[REQUEST_URI]";
		$count=$this->getCountForAdmin();
		$adminPanelListing=$this->adminPanelList;
		return View::make('Users.index',compact('users','tableName','count','adminPanelListing'));
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
		return Redirect::to('users/changepassword');
	}

	public function profile()
	{
		return View::make('Users.profile');
	}

	public function orders()
	{
		return View::make('Users.orders');
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
		$user=User::withTrashed()->find($id);
		if($user){
			$userDisabled=User::onlyTrashed()->find($id);
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
		$user=User::find($id);
			
		// dd($user);
		if($user){
			$user->delete();
			return Redirect::to('/users')->with('success',Lang::get('user.user_disabled'));
		}
		else{
			return Redirect::back()->with('failure',Lang::get('user.user_disable_failed'));
		}
	}

	public function subscribe($id)
	{
		$user=User::find($id);
		if($user)
		{
			$user->user_subscription_token=true;
			$user->save();
			return Redirect::back()->with('success',Lang::get('user.user_subscribed'));
		}
		else
		{
			return Redirect::back()->with('failure',Lang::get('user.user_not_exist'));
		}
	}

	public function unsubscribe($email,$id)
	{
		$user=User::find($id);
		if($user)
		{
			if($user->email==$email)
			{
				$user->user_subscription_token=false;
				$user->save();
				return Redirect::back()->with('success',Lang::get('user.user_unsubscribed'));
			}
			else
			{
				return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
			}
		}
		else
		{
			return Redirect::back()->with('failure',Lang::get('user.user_not_exist'));
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
		$user=User::withTrashed()->find($id);
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
		$loginPage = true;
		return View::make('Users.login',compact('loginPage'));
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
			$userDetails=User::onlyTrashed()->where('email','=',Input::get('email'))->first();
			if($userDetails)
				return Redirect::back()->with('failure',Lang::get('user.user_disabled_by_admin'));
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
    		return Redirect::intended('/')/*->with('success','Welcome '.$userDetails['user_first_name'].' '.$userDetails['user_last_name'])*/;
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
    	// Session::flash('success', Lang::get('user.logout'));
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
//        dd($newUserData);
		if(isset($newUserData['user_referee_code']))
		{
			$referee=User::where('user_referral_code','=',$newUserData['user_referee_code'])->first();
//			dd($referee);
			if(empty($referee))
			{
				return Redirect::to('/users/signup')->with('failure',Lang::get('user.user_referral_error'))->withInput(Input::except('password'));
			}
            else
            {
                $newUserData['user_referee_id']=$referee->id;
                $newUserData['user_classes_left']=3;
            }
		}
		unset($newUserData['user_referee_code']);
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
			if($newUserData['user_fb_id'])
            {
                $newUserData['user_confirmed']=true;
            }
            else
            {
                $newUserData['user_confirmation_code']=$confirmationCode;
            }
			$newUserData['user_subscription_token']=true;
			$newUserData['user_referral_code']=$this->makeReferralCode();
			$this->user->create($newUserData);
			$userId=$this->user->max('id');
            if(isset($referee))
            {
                $referee->user_pending_referral++;
                $referee->save();
                $email = $referee->email;
                $name = $referee->user_first_name.' '.$referee->user_last_name;
                $data = [
                    'name'=>$name,
                    'friend_name' => $newUserData['user_first_name'],
                ];
                /*Confirmation mail is to be send to the user for pending referral*/
                $subject = Lang::get('user.user_pending_referral_subject',array("name"=>$newUserData['user_first_name']));
                Mail::later(15, 'Emails.user.pending_referral', $data, function ($message) use ($email, $name, $subject) {
                    $message->to($email, $name)->subject($subject);
                });
            }

            if($newUserData['user_fb_id'])
            {
                $id=$this->user->getUid($newUserData['user_fb_id']);
                Auth::loginUsingId($id);
                return Redirect::to('/')->with('success','Welcome '.$newUserData['user_first_name'].' '.$newUserData['user_last_name']);
            }
            else {
                /**
                 * $data contains the name of the user registered and the confirmation code in the form
                 * of array which will be used to confirm the email.
                 *
                 */
                $email=$newUserData['email'];
                $name=$newUserData['user_first_name'];
                $data = [
                    'name' => $newUserData['user_first_name'],
                    'confirmationcode' => $confirmationCode,
                    'userId' => $userId,
                ];
                /*Confirmation mail is to be send to the newly registered user*/
                $subject = Lang::get('user.user_signup_mail_subject');
                Mail::later(15, 'Emails.user.welcome', $data, function ($message) use ($email, $name, $subject) {
                    $message->to($email, $name)->subject($subject);
                });
                return Redirect::to('/')->with('success', Lang::get('user.user_signup_success'));
            }
		}
	}

    public function account($id){

    }

	public function makeReferralCode($length = 6){
        $password = "";
        $possible = "0123456789abcdfghjkmnpqrstvwxyz";
        $i = 0;
        while ($i < $length) {
            $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
        $user_referral=User::where('user_referral_code','=',$password)->get()->toArray();
		if(empty($user_referral))
		{
	        return $password;
		}
		else
			$this->makeReferralCode();
    }
	/**
	*Function to verify the email of the newly registered user. 
	*
	*@param integer userId and string confirmation code;
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
				return Redirect::to('/')->with('success',Lang::get('user.welcome_verify',array("name"=>$validate->user_first_name)));
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
		// dd("G");
		return View::make('Users.changePassword');
	}

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
		FacebookSession::setDefaultApplication(Config::get('facebook.appId'),Config::get('facebook.secret'));
	    $helper = new FacebookRedirectLoginHelper(url('/login/fb/callback'));
	    $loginUrl = $helper->getLoginUrl( array('scope' => 'user_birthday, email, user_location, publish_actions' ));
	    return Redirect::to($loginUrl);
	}

	public function loginFbCallback(){
		FacebookSession::setDefaultApplication(Config::get('facebook.appId'),Config::get('facebook.secret'));
	    $helper = new FacebookRedirectLoginHelper(url('/login/fb/callback'));
		// try {
		  $session = $helper->getSessionFromRedirect();
		/*} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
		} catch(\Exception $ex) {
			dd("test");
		  // When validation fails or other local issues
		}
		*/
		
		if ($session) {
		  	// Logged in
			$object = (new FacebookRequest(
		    $session, 'GET', '/me'
	    	))->execute()->getGraphObject();
    		// dd($object);
	    	$userFb = $object->cast(GraphUser::className())->asArray();
	 		// $location=$user->getLocation()->asArray()['name'];
	 		// $city=explode(',',$location)[0];
	 		// dd($city);
	 		// dd($userFb);
	 		$user_fb_id=$userFb['id'];
	    	$user=$this->user->getUid($user_fb_id);
	    	if(!$user)
	    	{
	    		// dd(false);
	    		$profileData['user_fb_id']=$user_fb_id;
	    		$profileData['user_first_name']=$userFb['first_name'];
	    		$profileData['user_last_name']=$userFb['last_name'];
    			$profileData['email']=$userFb['email'];
    			if(isset($userFb['location'])) {
	    			$profileData['user_location']=$userFb['location']->name;
    			}
    			$profileData['user_confirmed']=true;
    			$checkEmail=Validator::make(array("email"=>$userFb['email']),User::$fbRules);
	    		// dd($checkEmail->fails());
	    		if($checkEmail->fails())
	    		{
					// dd($profileData);
					$user=User::where('email','=',$userFb['email'])
					// dd($user->get()->toArray());
					->update($profileData);
	    		}
	    		else
	    		{
	    			// Redirect::to('/');
	    			$userDetails=new User($profileData);
//                    return $userDetails->email;
//                    return Redirect::to('/signup/fb/')->with($userDetails);
//	    			return View::make('Modals.signup2',compact('userDetails'));
	    			return View::make('Users.signup', compact('userDetails'));
//	    			User::create($profileData);
	    		}
	    		try {
				    $response = (new FacebookRequest(
				      $session, 'POST', '/me/feed', array(
				        'link' => 'www.'.Lang::get('ViewsLang/home.home_name').'.com',
				        'message' => 'User provided message'
				      )
				    ))->execute()->getGraphObject();

				    // $msg= "Posted with id: " . $response->getProperty('id');

				} catch(FacebookRequestException $e) {

				    echo "Exception occured, code: " . $e->getCode();
				    echo " with message: " . $e->getMessage();

			    } 
    			// dd($msg);
    		}
	    	/*$accessToken=$session->getAccessToken();
    	 	$longLivedAccessToken = $accessToken->extend();
	    	dd($longLivedAccessToken);
	    	$this->user->where('user_fb_id','=',$user_fb_id)->update(array('user_facebook_access_token'=>$longLivedAccessToken));
	    	*/
	    	$id=$this->user->getUid($user_fb_id);
	    	Auth::loginUsingId($id);
    		return Redirect::to('/')/*->with('success','Welcome '.$userFb['first_name'].' '.$userFb['last_name'])*/;
    	}
    	else
    	{
			return Redirect::to('/')/*->with('failure',Lang::get('user.user_permission_failed'))*/;	
    	}
	}

	public function history()
	{
		$date=Carbon::now()->subDay();
		$history['oneDay'] = $this->user->getUserOneDay($date);
		$history['active'] = $this->user->getUserActive();
		$history['disabled'] = $this->user->getUserDisabled();
		$history['subscription'] = $this->subscription->getSubscribe();
		return $history;
	}

	public function loginViaId($id)
	{
		if(User::find($id))
		{
			Auth::logout();
			Auth::loginUsingId($id);
            return Redirect::intended('/')->with('success','Welcome '.'Admin');
		}
		else
		{
			return Redirect::intended('/')->with('failure','User does not exist');
		}
	}
}

