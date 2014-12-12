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
	return View::make('messages.home');
});

Route::get('/home', function()
{
	return View::make('messages.home');
});

Route::get('/showall', 'MessageController@show');

Route::get('/edit/{id}', 'MessageController@edit');

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('messages', 'MessageController', 
		array('only' => array('index', 'store', 'destroy', 'update')));
});

//Route::resource('messages', 'MessageController');

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});