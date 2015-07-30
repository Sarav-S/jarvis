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

Route::get('auth/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login.get']);
Route::post('auth/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'login.post']);
Route::get('auth/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

Route::get('home', 'WelcomeController@getHome');
