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


Route::get('/', 'HomeController@showWelcome');

//To allow access only to admin.
Route::group(array('before' => "auth|admin"), function() {
	Route::get('/original', 'HomeController@showWelcome');
	Route::get('/admin','HomeController@showAdminHome');
});

/*
	Routes for Main Admin section of admin panel.
	Only Main Admin is allowed access here.  
 */
Route::group(array('before' => "auth|admin|mainAdmin"), function() {
	Route::get('/admins','AdminsController@index');
	Route::post('/admins/store','AdminsController@store');
	Route::get('/admins/enable/{id}','AdminsController@enable');
	Route::get('/admins/disable/{id}','AdminsController@disable');
	Route::get('/admins/delete/{id}','AdminsController@destroy');
	Route::get('/admins/show/{id}','AdminsController@show');
});

/*
	Routes for BatchesController
	There are different type of check required for every route.
 */
Route::group(array('before' => "auth|institute-or-admin"), function() {
	Route::get('/batches','BatchesController@index');
	Route::get('/batches/create','BatchesController@create');
	Route::post('/batches/store','BatchesController@store');
});


Route::group(array('before' => "auth|institute-or-admin|batchOwn-or-admin"), function() {	
	Route::get('/batches/edit/{id}','BatchesController@edit');
	Route::post('/batches/update/{id}','BatchesController@update');
	Route::get('/batches/disable/{id}','BatchesController@disable');
});

Route::group(array('before' => "auth|admin"), function() {	
	Route::get('/batches/enable/{id}','BatchesController@enable');
	Route::get('/batches/delete/{id}','BatchesController@destroy');
	Route::get('/batches/history','BatchesController@history');
	Route::get('/batches/approve/history','BatchesController@approvalHistory');
	Route::get('/batches/approve','BatchesController@pending');
	Route::get('/batches/approve/{id}','BatchesController@approve');
});

// Route::group(array('before' => "approved-or-admin"), function() {
Route::group(array('before' => "admin"), function() {
	/*Route::get('/batches/increment/{id}','BatchesController@increment');
	Route::get('/batches/show/{id}','BatchesController@show');
	// Route::get('/batches/order/{id}','BatchesController@order');*/
});

Route::get('/batches/increment/{id}','BatchesController@increment');
Route::get('/bookings/payment/{id}','BookingsController@payment');
Route::get('/batches/show/{id}','BatchesController@show');

Route::get('/bookings/sms','BookingsController@sms');
Route::get('/test', 'BookingsController@test');
Route::get('/test2', 'BookingsController@test2');
Route::get('/email', 'BookingsController@sms_email');
Route::post('/bookings/redirect','BookingsController@redirect');
Route::post('/bookings/cancel','BookingsController@cancel');

Route::get('/success', 'BookingsController@success');
Route::get('/aborted', 'BookingsController@aborted');
Route::get('/failure', 'BookingsController@failure');

Route::resource('bookings', 'BookingsController');
Route::get('bookings/create/{id}', 'BookingsController@create');

//Route for CategoriesController

Route::group(array('before' => "auth|admin"), function() {	
	Route::get('/categories','CategoriesController@index');
	Route::post('/categories/store','CategoriesController@store');
	Route::post('/categories/update/{id}','CategoriesController@update');
	Route::get('/categories/enable/{id}','CategoriesController@enable');
	Route::get('/categories/disable/{id}','CategoriesController@disable');
	Route::get('/categories/delete/{id}','CategoriesController@destroy');
	Route::get('/categories/show/{id}','CategoriesController@show');
});

//Route for CommentsController
Route::group(array('before' => "auth|commentOwn-or-admin"), function() {	
	Route::get('/comments/edit/{id}','CommentsController@edit');
	Route::post('/comments/update/{id}','CommentsController@update');
	Route::get('/comments/disable/{id}','CommentsController@disable');	
});

Route::group(array('before' => "auth|admin"), function() {	
	Route::get('/comments','CommentsController@index');
	Route::get('/comments/enable/{id}','CommentsController@enable');
	Route::get('/comments/delete/{id}','CommentsController@destroy');
});
Route::get('/comments/show/{id}','CommentsController@show');

//Route for FeaturesController
Route::group(array('before' => "auth|admin"), function() {	
	Route::get('/features','FeaturesController@index');
	Route::post('/features/store/{id}','FeaturesController@store');
	Route::get('/features/enable/{id}','FeaturesController@enable');
	Route::get('/features/disable/{id}','FeaturesController@disable');
	Route::get('/features/delete/{id}','FeaturesController@destroy');
	Route::get('/features/show/{id}','FeaturesController@show');
});

//Route for FeedbacksController
Route::get('/feedbacks/create','FeedbacksController@create');
Route::post('/feedbacks/store','FeedbacksController@store');	

Route::group(array('before' => "auth|admin"), function() {	
	Route::get('/feedbacks','FeedbacksController@index');
	Route::get('/feedbacks/delete/{id}','FeedbacksController@destroy');
	Route::get('/feedbacks/read/{id}','FeedbacksController@read');
	Route::get('/feedbacks/unread/{id}','FeedbacksController@unread');
	Route::get('/feedbacks/done/{id}','FeedbacksController@done');
	Route::get('/feedbacks/undone/{id}','FeedbacksController@undone');
	Route::get('/feedbacks/show/{id}','FeedbacksController@show');
});

//Route for InstitutesController
Route::group(array('before'=>"auth|instituteNotOwn-or-admin"),function(){
	Route::get('/institutes/create','InstitutesController@create');
	Route::post('/institutes/store','InstitutesController@store');
});

Route::group(array('before' => "auth|admin"), function() {
	Route::get('/institutes','InstitutesController@index');
	Route::get('/institutes/enable/{id}','InstitutesController@enable');
	Route::get('/institutes/delete/{id}','InstitutesController@destroy');
	Route::get('/institutes/history','InstitutesController@history');
});

Route::group(array('before' => "auth|instituteOwn-or-admin"), function() {
	Route::get('/institutes/edit/{id}','InstitutesController@edit');
	Route::post('/institutes/update/{id}','InstitutesController@update');
	Route::get('/institutes/disable/{id}','InstitutesController@disable');
	Route::get('/institutes/show/{id}','InstitutesController@show');
});


Route::group(array('before' => "auth|admin"), function() {

	//Route for LocalitiesController
	Route::get('/localities','LocalitiesController@index');
	Route::post('/localities/store','LocalitiesController@store');
	Route::post('/localities/update/{id}','LocalitiesController@update');
	Route::get('/localities/enable/{id}','LocalitiesController@enable');
	Route::get('/localities/disable/{id}','LocalitiesController@disable');
	Route::get('/localities/delete/{id}','LocalitiesController@destroy');
	Route::get('/localities/show/{id}','LocalitiesController@show');

	//Route for LocationsController
	Route::get('/locations','LocationsController@index');
	Route::post('/locations/store','LocationsController@store');
	Route::post('/locations/update/{id}','LocationsController@update');
	Route::get('/locations/enable/{id}','LocationsController@enable');
	Route::get('/locations/disable/{id}','LocationsController@disable');
	Route::get('/locations/delete/{id}','LocationsController@destroy');
	Route::get('/locations/show/{id}','LocationsController@show');

    //Route for PromosController
    Route::resource('promos', 'PromosController');
    Route::get('promos/{promo_code}/disable','PromosController@disable');
    Route::get('promos/{promo_code}/enable','PromosController@enable');

	//Route for SubcategoriesController
	Route::get('/subcategories','SubcategoriesController@index');
	Route::post('/subcategories/store','SubcategoriesController@store');
	Route::post('/subcategories/update/{id}','SubcategoriesController@update');
	Route::get('/subcategories/enable/{id}','SubcategoriesController@enable');
	Route::get('/subcategories/disable/{id}','SubcategoriesController@disable');
	Route::get('/subcategories/delete/{id}','SubcategoriesController@destroy');
	Route::get('/subcategories/show/{id}','SubcategoriesController@show');


	//Route for SubscriptionsController
	Route::get('/subscriptions','SubscriptionsController@index');
	Route::get('/subscriptions/enable/{id}','SubscriptionsController@enable');
	Route::get('/subscriptions/disable/{id}','SubscriptionsController@disable');
	Route::get('/subscriptions/delete/{id}','SubscripitionsController@destroy');
});

Route::post('/subscriptions','SubscriptionsController@store');
Route::get('/subscriptions/unsubscribe/{email}/{id}', 'SubscriptionsController@disable');

Route::group(array('before' => "auth|institute-or-admin"), function() {
Route::get('/venues/create','VenuesController@create');
Route::post('/venues/store','VenuesController@store');
Route::get('/venues','VenuesController@index');
});

//Route for VenuesController
Route::group(array('before' => "auth|institute-or-admin|venueOwn-or-admin"), function() {
Route::get('/venues/edit/{id}','VenuesController@edit');
Route::post('/venues/update/{id}','VenuesController@update');
Route::get('/venues/delete/{id}','VenuesController@destroy');
});

//Route for UsersController

Route::group(array('before' => "auth|admin"), function() {
	Route::get('/users','UsersController@index');
	Route::get('/users/enable/{id}','UsersController@enable');
	Route::get('/users/disable/{id}','UsersController@disable');
	Route::get('/users/delete/{id}','UsersController@destroy');
	Route::get('/users/history','UsersController@history');
});

Route::group(array('before' => "auth"), function() {
	Route::get('/users/MyProfile','UsersController@profile');
	Route::get('/users/MyOrders','UsersController@orders');
	Route::get('/users/changepassword','UsersController@getChangePassword');
	Route::get('/users/edit','VenuesController@edit');
	Route::post('/users/update','UsersController@update');
	Route::get('/users/logout','UsersController@getLogout');
	Route::get('/users/subscribe/{id}','UsersController@subscribe');
	Route::get('/users/show/{id}','UsersController@show');
});

/*  To verify that unsubscribe request came from a valid email only,
 	we check user id and email both.
 */

Route::get('/users/unsubscribe/{email}/{id}','UsersController@unsubscribe');

Route::group(array('before' => "guest-or-admin"), function() {
	Route::get('/users/login', 'UsersController@getLogin');
	Route::get('/users/signup','UsersController@getSignUp');
	Route::get('/users/registration/verify/{userId}/{confirmationCode}','UsersController@getEmailVerify');
	Route::get('/users/password/remind','RemindersController@getRemind');
	Route::get('/users/password/reset/{token}','RemindersController@getReset');
	//Routes for facebook signin of user

	Route::get('/login/fb','UsersController@loginFb');
	Route::get('/login/fb/callback','UsersController@loginFbCallback');
});


Route::group(array('before' => "csrf"), function() {
	Route::post('/comments/store','CommentsController@store');
	Route::post('/users/login/submit','UsersController@postAuthenticate');
	Route::post('/users/signup/submit','UsersController@postSignup');
	Route::post('/users/changepassword/submit','UsersController@postChangePassword');
	Route::post('/users/password/remind/submit','RemindersController@postRemind');
	Route::post('/batches/sendMessage','BatchesController@sendMessage');
	Route::post('/users/password/reset/submit','RemindersController@postReset');
    Route::post('promos/isValid','PromosController@isValid');
});

Route::get('/privacy', function()
{
    return View::make('Miscellaneous.privacy');
});

Route::get('/terms', function()
{
    return View::make('Miscellaneous.terms');
});

Route::group(array('before' => "admin"), function() {

Route::get('/users/login/{id}','UsersController@loginViaId');


});

Route::get('/aboutus', function()
{
	return View::make('Miscellaneous.aboutus');
});

Route::get('/Membership', function()
{
	return View::make('Miscellaneous.membership');
});

Route::get('/filter/categories/{category_id}/locations/{location_id?}','FiltersController@show');

Route::get('/filter/categories/{category_id}/locations/{location_id?}/chunk/{chunk_id}','FiltersController@show');


Route::get('/filters/search','FiltersController@search');

Route::get('/filter/institute/{id}','FiltersController@institute');

Route::get('/filter/locality/{id}','FiltersController@locality');

Route::get('/filter/subcategory/{id}','FiltersController@subcategory');

Route::get('/users/account/{id}','UsersController@account');

Route::resource('memberships', 'MembershipsController');

Route::get('/filter/{subcategoriesString}/{localitiesString}/{category_id?}/{location_id?}/{chunk?}','FiltersController@filter');
