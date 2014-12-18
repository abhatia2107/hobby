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

/*Route::get('/institute/create','InstituteController@getCreate');
Route::post('/institute/store','InstituteController@postStore');
Route::get('/class/create','InstituteController@getCreateClass');
Route::post('/class/store','InstituteController@postStoreClass');
Route::get('/venue/create','InstituteController@getCreateVenue');
Route::post('/venue/store','InstituteController@postStoreVenue');
*/
Route::resource('Institutes', 'InstitutesController');
Route::resource('Venues', 'VenuesController');
Route::resource('admins', 'AdminsController');
Route::resource('comments', 'CommentsController');
Route::resource('categories', 'CategoriesController');
Route::resource('users', 'UsersController');
