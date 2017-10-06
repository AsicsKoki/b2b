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

Route::get('/', 'HomeController@index')->name('getHome');
// Route::get('/register', 'UserController@getRegister')->name('getRegister');
// Route::get('/login', 'UserController@getLogin')->name('getLogin');
// Route::get('/logout', 'UserController@getLogout')->name('getLogout');

// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin')->name('getUserLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');


//User(applicant) related routes
Route::get('/profile', 'UserController@getProfile')->name('getUserProfile');
Route::get('/profile/{uid}', 'UserController@getProfile')->name('getUserProfile');
Route::post('/profile', 'UserController@postProfile')->name('postUserProfile');
Route::get('/jobs', 'JobController@getJobs')->name('getAllJobs');
Route::get('/job/{uid}', 'JobController@getJob')->name('getSpecificJob');
Route::get('/profile/{uid}/favorites', 'UserController@getFavorites')->name('getUserFavorites');
Route::post('/profile/{uid}/favorites/{jid}', 'UserController@postFavorite')->name('postUserFavorites');
Route::get('/cvCreator', 'UserController@getCvCreator')->name('getCvCreator');
Route::get('/myFiles', 'UserController@getMyFiles')->name('getMyFiles');
Route::get('/history', 'UserController@getHistory')->name('getHistory');
Route::get('/history', 'UserController@getHistory')->name('getHistory');



//Company routes
Route::get('/company/{cid}', 'CompanyController@getProfile')->name('getCompanyProfile');
Route::post('/profile', 'CompanyController@postProfile')->name('postCompanyProfile');
Route::get('/controlPanel', 'CompanyController@getControlPanel')->name('getControlPanel');
Route::get('/companyLogin', 'CompanyController@getLogin')->name('getCompanyLogin');
Route::post('/companyLogin', 'CompanyController@authenticate')->name('authenticate');
Route::get('/companyRegister', 'CompanyController@getRegister')->name('getCompanyRegister');
Route::post('/companyRegister', 'CompanyController@postRegister')->name('postCompanyRegister');
Route::get('/companyRegister-Step-2', 'CompanyController@getRegisterStep2')->name('getCompanyRegisterStep2');
Route::post('/companyRegister-Step-2', 'CompanyController@postRegisterStep2')->name('postCompanyRegisterStep2');
Route::get('/companyRegister-Step-3', 'CompanyController@getRegisterStep3')->name('getCompanyRegisterStep3');
Route::post('/companyRegister-Step-3', 'CompanyController@postRegisterStep3')->name('postCompanyRegisterStep3');
Route::get('/editBusinessCard', 'CompanyController@editBusinessCard')->name('editBusinessCard');
Route::post('/updateAboutUs', 'CompanyController@updateAboutUs')->name('updateAboutUs');
Route::post('/updateCareer', 'CompanyController@updateCareer')->name('updateCareer');

Route::get('/addNewJob', 'CompanyController@getNewJob')->name('addNewJob');

