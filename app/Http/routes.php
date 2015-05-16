<?php
use App\Schools;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::controller('users', 'UsersController');
Route::post('/users/register','UsersController@postRegister');
Route::get('/users/login', 'UsersController@getLogin');
Route::group(['middleware' => 'check'], function(){
	Route::get('/users/logout','UsersController@getLogout');
	Route::get('/users/data','UsersController@getData');
	Route::put('/users/data','UsersController@putData');
	Route::put('/users/password','UsersController@putPassword');
});
Route::get('/schools', function(){
	$schools = Schools::all();
	$result = array('message' => 'success', 'code' => 1, 'data' => $schools);
	return response()->json($result);	
});