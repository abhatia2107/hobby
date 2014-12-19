<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('admins', 'AdminsController');
Route::resource('batches', 'BatchesController');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::resource('institutes', 'InstitutesController');
Route::resource('Subscriptions', 'SubscriptionsController');
Route::resource('users', 'UsersController');
Route::resource('venues', 'VenuesController');

//Route for AdminsController
Route::get('/admins','AdminsController@index');
Route::get('/admins/create','AdminsController@create');
Route::post('/admins/store','AdminsController@store');
Route::get('/admins/{id}','AdminsController@show');
Route::get('/admins/{id}/edit','AdminsController@edit');
Route::put('/admins/{id}','AdminsController@update');
Route::delete('/admins/{id}','AdminsController@destroy');

//Route for BatchesController
Route::get('/batches','BatchesController@index');
Route::get('/batches/create','BatchesController@create');
Route::post('/batches/store','BatchesController@store');
Route::get('/batches/{id}','BatchesController@show');
Route::get('/batches/{id}/edit','BatchesController@edit');
Route::put('/batches/{id}','BatchesController@update');
Route::delete('/batches/{id}','BatchesController@destroy');

//Route for CategoriesController
Route::get('/categories','CategoriesController@index');
Route::get('/categories/create','CategoriesController@create');
Route::post('/categories/store','CategoriesController@store');
Route::get('/categories/{id}','CategoriesController@show');
Route::get('/categories/{id}/edit','CategoriesController@edit');
Route::put('/categories/{id}','CategoriesController@update');
Route::delete('/categories/{id}','CategoriesController@destroy');

//Route for CommentsController
Route::get('/comments','CommentsController@index');
Route::get('/comments/create','CommentsController@create');
Route::post('/comments/store','CommentsController@store');
Route::get('/comments/{id}','CommentsController@show');
Route::get('/comments/{id}/edit','CommentsController@edit');
Route::put('/comments/{id}','CommentsController@update');
Route::delete('/comments/{id}','CommentsController@destroy');

//Route for InstitutesController
Route::get('/institutes','InstitutesController@index');
Route::get('/institutes/create','InstitutesController@create');
Route::post('/institutes/store','InstitutesController@store');
Route::get('/institutes/{id}','InstitutesController@show');
Route::get('/institutes/{id}/edit','InstitutesController@edit');
Route::put('/institutes/{id}','InstitutesController@update');
Route::delete('/institutes/{id}','InstitutesController@destroy');

//Route for SubscriptionsController
Route::post('/subscriptions/{id}','SubscripitonsController@store');
Route::delete('/subscriptions/{id}','SubscripitionsController@destroy');

//Route for VenuesController
Route::get('/venues','VenuesController@index');
Route::get('/venues/create','VenuesController@create');
Route::post('/venues/store','VenuesController@store');
Route::get('/venues/{id}','VenuesController@show');
Route::get('/venues/{id}/edit','VenuesController@edit');
Route::put('/venues/{id}','VenuesController@update');
Route::delete('/venues/{id}','VenuesController@destroy');

//Route for UsersController
Route::get('/users','UsersController@index');
Route::get('/users/create','UsersController@create');
Route::post('/users/store','UsersController@store');
Route::get('/users/{id}','UsersController@show');
Route::get('/users/{id}/edit','UsersController@edit');
Route::put('/users/{id}','UsersController@update');
Route::delete('/users/{id}','UsersController@destroy');


Route::get('/aboutus', function()
{
	return View::make('aboutus');
});

Route::get('/support', function()
{
	return View::make('support');
});

Route::get('/terms', function()
{
	return View::make('terms');
});
Route::get('/contactus', function()
{
	return View::make('contactus');
});

Route::get('/subscribed', function()
{
	return View::make('message');
});

Route::get('/dummy', function()
{
	return View::make('create');
});

