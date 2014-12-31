<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		$all_$categories= Category::all();
        $all_locations=Location::all();
        return View::make('pages.users.forgotpassword',compact('all_categories','all_locations'));
	}
		
	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('user_email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('failed', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('success', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);
		$all_$categories= Category::all();
        $all_locations=Location::all();
        return View::make('pages.users.resetpassword',compact('all_categories','all_locations'))->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$all_$categories= Category::all();
        $all_locations=Location::all();
        $credentials = Input::only(
			'user_email', 'user_password', 'user_password_confirmation', 'user_csrf_token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->user_password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('failed', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/login')->with('success',Lang::get($response));
		}
	}

}
