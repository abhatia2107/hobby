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
	return View::make('Miscellaneous.home');
});

Route::get('/hello',function() { return View::make('layout'); });

Route::resource('admins', 'AdminsController');
Route::resource('batches', 'BatchesController');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::resource('institutes', 'InstitutesController');
Route::resource('locations', 'LocationsController');
Route::resource('subcategories', 'SubcategoriesController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('keywords', 'KeywordsController');
Route::resource('localities', 'LocalitiesController');
Route::resource('users', 'UsersController');
Route::resource('venues', 'VenuesController');

//Route for AdminsController
Route::get('/admins','AdminsController@index');
Route::get('/admins/create','AdminsController@create');
Route::post('/admins/store','AdminsController@store');
Route::get('/admins/{id}','AdminsController@show');
Route::get('/admins/edit/{id}','AdminsController@edit');
Route::post('/admins/update/{id}','AdminsController@update');
Route::get('/admins/delete/{id}','AdminsController@destroy');

//Route for BatchesController
Route::get('/batches','BatchesController@index');
Route::get('/batches/create','BatchesController@create');
Route::post('/batches/store','BatchesController@store');
Route::get('/batches/{id}','BatchesController@show');
Route::get('/batches/edit/{id}','BatchesController@edit');
Route::post('/batches/update/{id}','BatchesController@update');
Route::get('/batches/delete/{id}','BatchesController@destroy');

//Route for CategoriesController
Route::get('/categories','CategoriesController@index');
Route::get('/categories/create','CategoriesController@create');
Route::post('/categories/store','CategoriesController@store');
Route::get('/categories/{id}','CategoriesController@show');
Route::get('/categories/edit/{id}','CategoriesController@edit');
Route::post('/categories/update/{id}','CategoriesController@update');
Route::get('/categories/delete/{id}','CategoriesController@destroy');

//Route for CommentsController
Route::get('/comments','CommentsController@index');
Route::get('/comments/create','CommentsController@create');
Route::post('/comments/store','CommentsController@store');
Route::get('/comments/{id}','CommentsController@show');
Route::get('/comments/edit/{id}','CommentsController@edit');
Route::post('/comments/update/{id}','CommentsController@update');
Route::get('/comments/delete/{id}','CommentsController@destroy');

//Route for InstitutesController
Route::get('/institutes','InstitutesController@index');
Route::get('/institutes/create','InstitutesController@create');
Route::post('/institutes/store','InstitutesController@store');
Route::get('/institutes/{id}','InstitutesController@show');
Route::get('/institutes/edit/{id}','InstitutesController@edit');
Route::post('/institutes/update/{id}','InstitutesController@update');
Route::get('/institutes/delete/{id}','InstitutesController@destroy');

//Route for KeywordsController
Route::get('/keywords','KeywordsController@index');
Route::get('/keywords/create','KeywordsController@create');
Route::post('/keywords/store','KeywordsController@store');
Route::get('/keywords/{id}','KeywordsController@show');
Route::get('/keywords/edit/{id}','KeywordsController@edit');
Route::post('/keywords/update/{id}','KeywordsController@update');
Route::get('/keywords/delete/{id}','KeywordsController@destroy');

//Route for LocationsController
Route::get('/locations','LocationsController@index');
Route::get('/locations/create','LocationsController@create');
Route::post('/locations/store','LocationsController@store');
Route::get('/locations/{id}','LocationsController@show');
Route::get('/locations/edit/{id}','LocationsController@edit');
Route::post('/locations/update/{id}','LocationsController@update');
Route::get('/locations/delete/{id}','LocationsController@destroy');

//Route for SubcategoriesController
Route::get('/subcategories','SubcategoriesController@index');
Route::get('/subcategories/create','SubcategoriesController@create');
Route::post('/subcategories/store','SubcategoriesController@store');
Route::get('/subcategories/{id}','SubcategoriesController@show');
Route::get('/subcategories/edit/{id}','SubcategoriesController@edit');
Route::post('/subcategories/update/{id}','SubcategoriesController@update');
Route::get('/subcategories/delete/{id}','SubcategoriesController@destroy');

//Route for SubscriptionsController
Route::get('/subscriptions','SubscripitonsController@index');
Route::post('/subscriptions/{id}','SubscripitonsController@store');
Route::get('/subscriptions/delete/{id}','SubscripitionsController@destroy');

//Route for VenuesController
Route::get('/venues','VenuesController@index');
Route::get('/venues/create','VenuesController@create');
Route::post('/venues/store','VenuesController@store');
Route::get('/venues/{id}','VenuesController@show');
Route::get('/venues/edit/{id}','VenuesController@edit');
Route::post('/venues/update/{id}','VenuesController@update');
Route::get('/venues/delete/{id}','VenuesController@destroy');

//Route for UsersController
Route::get('/users','UsersController@index');
Route::get('/users/create','UsersController@create');
Route::post('/users/store','UsersController@store');
Route::get('/users/{id}','UsersController@show');
Route::get('/users/edit/{id}','UsersController@edit');
Route::post('/users/update/{id}','UsersController@update');
Route::get('/users/delete/{id}','UsersController@destroy');


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

