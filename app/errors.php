<?php

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

use Illuminate\Database\Eloquent\ModelNotFoundException;
App::fatal(function($exception)
{
   	Log::error($exception);
   	return View::make('Errors.fatal');
});


App::error(function(ModelNotFoundException $exception)
{
   Log::error($exception);
   return View::make('Errors.fatal');
});

App::error(function($exception)
{
   Log::error($exception);
   return View::make('Errors.fatal');
});
 
App::missing(function($exception)
{
   Log::error($exception);
   return Response::view('Errors.pageNotFound', array(), 404);
});
