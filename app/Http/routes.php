<?php

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

Route::get('/', 'Auth\AuthController@getLogin');
Route::get('/inbox', ['as' => 'inbox', 'uses' => 'TasksController@getInbox']);

Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login.get']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'login.post']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

Route::get('password/email', ['uses' => 'Auth\PasswordController@getEmail', 'as' => 'forgot-password.get']);
Route::post('password/email', ['uses' => 'Auth\PasswordController@postEmail', 'as' => 'forgot-password.post']);

// Password reset routes...
Route::get('password/reset/{token}', ['uses' =>'Auth\PasswordController@getReset', 'as' => 'reset-password.get']);
Route::post('password/reset', ['uses' => 'Auth\PasswordController@postReset', 'as' => 'reset-password.post']);

Route::get('home', ['as' => 'home', 'uses' => 'WelcomeController@getHome']);
Route::get('search', ['as' => 'search', 'uses' => 'WelcomeController@getSearch']);

Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'TasksController');
Route::get('/projects/{projects}', ['uses' => 'ProjectsController@show', 'as' => 'projects']);
