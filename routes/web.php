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

// uid - user id
// jid - job id
// cid - company


Auth::routes();

Route::get('/register', 'UsersController@index');


Route::get('/', 'HomeController@getHome')->name('getHome');

//User(applicant) related routes
Route::get('/profile', 'UserController@getProfile')->name('getUserProfile');
Route::get('/profile/{uid}', 'UserController@getProfile')->name('getUserProfile');
Route::post('/profile', 'UserController@postProfile')->name('postUserProfile');
Route::get('/jobs', 'JobController@getJobs')->name('getAllJobs');
Route::get('/job/{uid}', 'JobController@getJob')->name('getSpecificJob');
Route::get('/profile/{uid}/favorites', 'UserController@getFavorites')->name('getUserFavorites');
Route::post('/profile/{uid}/favorites/{jid}', 'UserController@postFavorite')->name('postUserFavorites');


//Company routes
Route::get('/company', 'CompanyController@getProfile')->name('getCompanyProfile');
Route::post('/profile', 'CompanyController@postProfile')->name('postCompanyProfile');
