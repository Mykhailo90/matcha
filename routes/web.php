<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('start');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/my_profile', 'MyProfileController@index')->name('profile')->middleware('auth');

Route::post('/my_profile/change_avatar', 'MyProfileController@imageUpdate')->name('imageUpdate')->middleware('auth');

Route::get('/start', 'StartController@index');
Route::get('/start/get-json', 'StartController@getJson');

