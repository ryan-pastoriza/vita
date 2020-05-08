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


Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('ajx/recentalumnus', 'ProfileController@recentAlumnus');
    Route::get('/dashboard/ajx/fetchfeed', 'DashboardController@ajxfetchfeed');
    Route::get('/dashboard/ajx/fetchreplies', 'DashboardController@ajxfetchreplies');
    Route::get('/dashboard/ajx/singlefeed', 'DashboardController@ajxsinglefeed');
    Route::post('/dashboard/ajx/postreply', 'DashboardController@ajxPostReply');


    Route::group(['middleware' => 'is_alumnus'], function(){
        
        Route::get('profile', 'ProfileController@index')->name('profile');
        Route::get('ajxprov', 'ProfileController@province');
        Route::get('ajxcity', 'ProfileController@provcity');
        Route::get('ajxbrgy', 'ProfileController@citybrgy');
        Route::get('ajxsetage', 'ProfileController@setage');
        Route::post('ajxsavepersonalinfo', 'ProfileController@savePersonalInfo');
        Route::post('ajxsavefamilyinfo', 'ProfileController@saveFamilyInfo');
        Route::get('ajxgetedu', 'ProfileController@getedu');
        Route::get('ajxgeteligibilities', 'ProfileController@geteligibilities');
        Route::post('ajxsaveeligibility', 'ProfileController@saveeligibility');
        Route::get('ajxgetworkexperience', 'ProfileController@getworkexperience');
        Route::post('ajxsaveworkexperience', 'ProfileController@saveworkexperience');
        Route::get('ajxgetservices', 'ProfileController@getservices');
        Route::post('ajxsaveservice', 'ProfileController@saveservice');
    
        
    
        Route::get('jobs', 'JobsController@index')->name('jobs');
        Route::get('inbox', 'InboxController@index')->name('inbox');
        Route::get('inbox/delete', 'InboxController@deleteMessages');
        Route::get('inbox/all', 'InboxController@fetchInbox');
        Route::get('inbox/savereply', 'InboxController@saveReply');
        Route::post('ajxsetreadmessage', 'InboxController@readmessage');
    
        Route::get('tor', 'TorController@index')->name('tor');
        Route::get('application', 'ApplicationController@index')->name('application');
    
        Route::get('myaccount', 'MyAccountController@index')->name('myaccount');
        Route::post('myaccount/ajx/updateusername', 'MyAccountController@updateUsername');
        Route::post('myaccount/ajx/updatepassword', 'MyAccountController@updatePassword');
        Route::post('myaccount/ajx/updatecontactno', 'MyAccountController@updateContactNo');
        Route::post('myaccount/ajx/updateemail', 'MyAccountController@updateEmail');
    
        Route::get('aboutus', 'AboutUsController@index')->name('aboutus');
        Route::get('help', 'HelpController@index')->name('help');
    });  

    Route::group(['middleware' => 'is_company'], function(){
        Route::get('/company/profile', 'CompanyProfileController@index')->name('company');
    });  
});
