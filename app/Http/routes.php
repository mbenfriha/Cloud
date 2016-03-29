<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
// Login Routes
    $this->get('/', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    //Register Routes

    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
    Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');


// Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/home', 'HomeController@index');
    Route::get('cloud', 'HomeController@files');
    Route::get('cloud/{path}', 'HomeController@files')->where('path', '(.*)');
    Route::post('createFolder', 'HomeController@createFolder');
    Route::post('delete', 'HomeController@delete');
    Route::get('download', 'HomeController@download');
    Route::post('edit', 'HomeController@edit');
    Route::post('dashboard', 'HomeController@getAjaxDashboard');
    Route::get('share/{path}', 'HomeController@share')->where('path', '(.*)');
    Route::get('public/{path}', 'ShareController@share')->where('path', '(.*)');
    Route::get('contact', 'HomeController@contact');
    Route::post('contact', 'HomeController@contact');





    Route::post('upload', 'HomeController@upload');

// Admin Route
    Route::get('/admin', 'AdminController@index');
    Route::get('/users', 'AdminController@users');
    Route::post('/files', 'AdminController@files');
    Route::get('/files', 'AdminController@files');
    Route::get('/admin/{name}', 'AdminController@fileUser');
    Route::post('/lock', 'AdminController@lock');
});


