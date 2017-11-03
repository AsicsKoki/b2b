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

Route::group(['middleware'=>['guest','notusersession']],function (){

// Authentication routes...
Route::get('/userLogin', 'UserController@getUserLogin')->name('getUserLogin');
Route::post('/userLogin', 'UserController@postUserLogin')->name('postUserLogin');
Route::get('/userRegister', 'UserController@getUserRegister')->name('getUserRegister');
Route::post('/userRegister', 'UserController@postUserRegister')->name('postUserRegister');


// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/companyLogin', 'CompanyController@getLogin')->name('getCompanyLogin');
Route::post('/companyLogin', 'CompanyController@authenticate')->name('authenticate');
Route::get('/companyRegister', 'CompanyController@getRegister')->name('getCompanyRegister');
Route::post('/companyRegister', 'CompanyController@postRegister')->name('postCompanyRegister');
Route::get('/companyRegister-Step-2', 'CompanyController@getRegisterStep2')->name('getCompanyRegisterStep2');
Route::post('/companyRegister-Step-2', 'CompanyController@postRegisterStep2')->name('postCompanyRegisterStep2');
Route::get('/companyRegister-Step-3', 'CompanyController@getRegisterStep3')->name('getCompanyRegisterStep3');
Route::post('/companyRegister-Step-3', 'CompanyController@postRegisterStep3')->name('postCompanyRegisterStep3');


});

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('getHome');
Route::get('/404', 'HomeController@get404')->name('get404');


//User(applicant) related routes
Route::group(['middleware'=>'usersession'],function (){

Route::get('/profile', 'UserController@getUserProfile')->name('getUserProfile');
Route::post('/profile', 'UserController@postProfile')->name('postUserProfile');
Route::get('/profile/{uid}/favorites', 'UserController@getFavorites')->name('getUserFavorites');
Route::post('/profile/{uid}/favorites/{jid}', 'UserController@postFavorite')->name('postUserFavorites');
Route::get('/cvCreator', 'UserController@getCvCreator')->name('getCvCreator');
Route::get('/myFiles', 'UserController@getMyFiles')->name('getMyFiles');
Route::get('/history', 'UserController@getHistory')->name('getHistory');
Route::get('/history', 'UserController@getHistory')->name('getHistory');
Route::get('/messages', 'UserController@getMessages')->name('getMessages');
Route::get('/userConversation/{aid}', 'UserController@getUserConversation')->name('getUserConversation');
Route::get('/applicationHistory', 'UserController@getHistory')->name('getHistory');
Route::post('/postUserMessage', 'UserController@postUserMessage')->name('postUserMessage');

Route::post('/updateEducation', 'UserController@updateEducation')->name('updateEducation');
Route::post('/updateCountry', 'UserController@updateCountry')->name('updateCountry');
Route::post('/updateCity', 'UserController@updateCity')->name('updateCity');
Route::post('/updateRegion', 'UserController@updateRegion')->name('updateRegion');
Route::post('/updateBirthdate', 'UserController@updateBirthdate')->name('updateBirthdate');
Route::post('/updateGender', 'UserController@updateGender')->name('updateGender');
Route::post('/updatePhone', 'UserController@updatePhone')->name('updatePhone');
Route::post('/updateDescription', 'UserController@updateDescription')->name('updateDescription');
Route::post('/updateAvatar', 'UserController@updateAvatar')->name('updateAvatar');

});


// Route::get('/profile/{uid}', 'UserController@getProfile')->name('getUserProfile');

Route::get('/jobs', 'JobController@getJobs')->name('getAllJobs');
Route::get('/job/{jid}/{cid}', 'JobController@getJob')->name('getSpecificJob');

Route::post('/searchResults', 'UserController@getSearchResults')->name('getSearchResults');

//Company routes

Route::group(['middleware'=>'auth'],function (){

Route::post('/profile', 'CompanyController@postProfile')->name('postCompanyProfile');
Route::get('/controlPanel', 'CompanyController@getControlPanel')->name('getControlPanel');
Route::get('/editBusinessCard', 'CompanyController@editBusinessCard')->name('editBusinessCard');
Route::post('/updateAboutUs', 'CompanyController@updateAboutUs')->name('updateAboutUs');
Route::post('/updateCareer', 'CompanyController@updateCareer')->name('updateCareer');

Route::get('/addNewJob', 'JobController@getNewJob')->name('addNewJob');
Route::get('/addNewJobStandard', 'JobController@getNewJobStandard')->name('addNewJobStandard');
Route::get('/addNewJobCustom', 'JobController@getNewJobCustom')->name('addNewJobCustom');
Route::get('/addNewJobFullCustomaddNewJobConfidental', 'JobController@getNewJobFullCustom')->name('addNewJobFullCustom');
Route::get('/addNewJobConfidental', 'JobController@getNewJobConfidental')->name('addNewJobConfidental');
Route::post('/postNewJob', 'JobController@postNewJob')->name('postNewJob');

Route::get('/conversation/{aid}', 'JobController@getConversation')->name('getConversation');
});

Route::get('/company/{cid}', 'CompanyController@getProfile')->name('getCompanyProfile');

Route::get('/applyForJob/{jid}/{cid}', 'JobController@getJobApplication')->name('getJobApplication');
Route::post('/applyForJob', 'JobController@postJobApplication')->name('postJobApplication');

Route::get('/today', 'JobController@getToday')->name('getToday');

Route::post('/sendMessage', 'JobController@postSendMessage')->name('postSendMessage');

Route::post('/updateMessages', 'JobController@getRefresh')->name('getRefresh');

// middleware for showing errors on companyRegister-Step-3
// Route::group(['middleware'=>'web'],function (){

// 	Route::resource('/post', 'CompanyController');
// });





