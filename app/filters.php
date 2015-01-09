<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/



App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});


Route::filter('auth', function()
{
	if (!(Auth::id()))
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::guest('/users/login');
	}
});


/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('csrf_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

// To check if a user own the batch, he's trying to edit.
Route::filter('batchOwn',function()
{
	$user_id=Auth::id();
	$batch_id=Request::segment(3);
	$batch_user_id=Batch::getUserforCommentforBatch($batch_id);
	if(is_null($batch_user_id))
	{
		return Redirect::to('/')->with('failure',Lang::get('batch.batch_disabled_by_admin'));
	}
	if($user_id!=$batch_user_id)
	{
		return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
	}
});

// To check if a user own the comment, he's trying to edit.
Route::filter('commentOwn',function()
{
	$user_id=Auth::id();
	$comment_id=Request::segment(3);
	$comment_user_id=Comment::getUserforComment($comment_id);
	if($user_id!=$comment_user_id)
	{
		return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
	}
});

// To check if a user has not added institute.
Route::filter('institute', function()
{
	$user_id=Auth::id();
	$institute_id=Institute::getInstituteforUser($user_id);
	if(is_null($institute_id))
	{
		return Redirect::to('/')->with('failure',Lang::get('institute.institute_disabled_by_admin'));
	}
	if(!$institute_id)
	{
		return Redirect::to('/institutes/create');
	}
});

// To check if a user own the institute, he's trying to edit.
Route::filter('instituteOwn',function()
{
	$user_id=Auth::id();
	$institute_id=Request::segment(3);
	$institute_user_id=Institute::getUserforInstitute($institute_id);
	if(is_null($institute_user_id))
	{
		return Redirect::to('/')->with('failure',Lang::get('institute.institute_disabled_by_admin'));
	}
	if($user_id!=$institute_user_id)
	{
		return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
	}
});

// To check if a user has added institute.
Route::filter('instituteNotOwn', function()
{
	$id=Auth::id();
	$institute_id=Institute::getInstituteforUser($id);
	if(is_null($institute_id))
	{
		return Redirect::to('/')->with('failure',Lang::get('institute.institute_disabled_by_admin'));
	}
	if($institute_id)
	{
		return Redirect::to('/institutes/'.$institute_id);
	}
});

// To check if a user own the venue, he's trying to edit.
Route::filter('venueOwn',function()
{
	$user_id=Auth::id();
	$venue_id=Request::segment(3);
	$venue_user_id=Venue::getUserforVenue($venue_id);
	if(is_null($venue_user_id))
	{
		return Redirect::to('/')->with('failure',Lang::get('venue.venue_disabled_by_admin'));
	}
	if($user_id!=$venue_user_id)
	{
		return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
	}
});


// To check if user is an admin or not.
Route::filter('admin',function()
{
	$id=Auth::id();
	$admin=Admin::where('admin_user_id','=',$id)->get()->toarray();
	if(!count($admin))
		return Redirect::to('/')->with('failure',Lang::get('validation.permission_denied'));
});

// To check if user is main admin or not. There will be 2 main admins, with id->1,2. 
Route::filter('mainAdmin',function()
{	
	$id=Auth::id();
	$admin=Admin::where('admin_user_id','=',$id)->get()->toarray();
	if(($admin[0]['id']!=1)&&($admin[0]['id']!=2))
		return Redirect::to('/admin')->with('failure',Lang::get('validation.permission_denied'));
});

/*
To check if subscription request is coming from valid email.
To be done later on basis of a subscriptionID, email ID combo.
 */
Route::filter('subscriptionOwn',function()
{

});


Route::filter('institute-or-admin', function () 
{
    $value = call_user_func('institute');
    if ($value) 
    	return $value;
    else 
    	return call_user_func('admin');
});