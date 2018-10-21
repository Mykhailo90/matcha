<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->post('/start/message', 'Test2Controller@postMessage');

// Route::group(['prefix' => 'ws'], function(){
	Route::get('check-auth', function(){
		return response()->json([
			'auth' => \Auth::check()
		]);

	// });


});