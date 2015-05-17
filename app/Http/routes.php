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
	//users after logined
	Route::get('/users/logout','UsersController@getLogout');
	Route::get('/users/data','UsersController@getData');
	Route::put('/users/data','UsersController@putData');
	Route::put('/users/password','UsersController@putPassword');
	//missions after logined
	Route::get('/missions/all', 'MissionsController@getAll');
	Route::get('/missions/me/receiver/now', 'MissionsController@getRecNow');
	Route::get('/missions/me/creator/now', 'MissionsController@getCreNow');
	Route::get('/missions/me/receiver/history', 'MissionsController@getRecHis');
	Route::get('/missions/me/Creator/history', 'MissionsController@getCreHis');
	Route::get('/missions/id', 'MissionsController@getId');
	Route::get('/missions/coordinate', 'MissionsController@getCoor');
	Route::post('/missions', 'MissionsController@postMission');
	Route::put('/missions/edit', 'MissionsController@putMission');
	Route::put('/missions/cancel', 'MissionsController@putMissCan');
	Route::put('/missions/accept', 'MissionsController@putMissAcc');
	Route::put('/missions/finish', 'MissionsController@putMissFin');

});

Route::get('/schools', function(){
	$schools = Schools::all();
	$result = array('message' => 'success', 'code' => 1, 'data' => $schools);
	return response()->json($result);	
});

// Frontend
Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::group(['middleware'=>'permission'], function(){
    Route::get('/', function(){
        return view('main');
    });

    Route::get('/member', function(){
        return view('member');
    });

    Route::get('/mission', function(){
        return view('mission');
    });

    Route::get('/point', function(){
        return view('point');
    });

    Route::get('/intro', function(){
        return view('intro');
    });

    Route::get('/logout', function(){
        return view('logout');
    });

});
