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
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/my_profile', 'MyProfileController@index')->name('profile')->middleware('verified');
Route::post('/my_profile', 'MyProfileController@ajaxImageUploadPost')->name('ajaxImageUpload')->middleware('verified');
Route::post('/my_profile/del_img', 'MyProfileController@ajaxImageDeletePost')->name('ajaxImageDelete')->middleware('verified');
Route::post('/my_profile/update_info', 'MyProfileController@ajaxUpdateInfoPost')->name('ajaxUpdateInfo')->middleware('verified');
Route::post('/my_profile/get_interests', 'MyProfileController@ajaxLoadInterests')->name('loadInterests')->middleware('verified');
Route::post('/my_profile/del_interest', 'MyProfileController@delInterest')->name('delInterest')->middleware('verified');
Route::post('/my_profile/add_interest', 'MyProfileController@addInterest')->name('addInterest')->middleware('verified');
Route::get('profile/{id}', 'ProfileController@showProfile')->where('id', '[0-9]+')->name('profileShow')->middleware('verified');


Route::post('/profile/add_friend', 'ProfileController@add_friend')->name('addFriend')->middleware('verified');
Route::post('/profile/del_friend', 'ProfileController@del_friend')->name('delFriend')->middleware('verified');
Route::post('/profile/del_invitation', 'ProfileController@del_invitation')->name('delInvitation')->middleware('verified');
Route::post('/profile/get_invitation', 'ProfileController@get_invitation')->name('getInvitation')->middleware('verified');

Route::post('/profile/add_ignore', 'ProfileController@add_ignore')->name('addIgnore')->middleware('verified');
Route::post('/profile/del_ignore', 'ProfileController@del_ignore')->name('delIgnore')->middleware('verified');
