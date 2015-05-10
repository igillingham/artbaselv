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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('galleries/list', 'GalleriesController@index');
Route::get('galleries/edit/{id}', 'GalleriesController@edit');
//Route::post('galleries/update', 'GalleriesController@update');
Route::post('galleries-update-submit/{id}', 'GalleriesController@update');

Route::get('media/list', 'MediaController@index');
Route::get('media/edit/{id}', 'MediaController@edit');
Route::get('media/create', array( 'as' => 'medium.showcreate', 'uses' =>'MediaController@show_create'));
//Route::post('media/update', 'MediaController@update');
Route::patch('media-update-submit/{id}', array('as' => 'medium.update', 'uses' => 'MediaController@update'));
Route::post('media-update-submit', array('as' => 'medium.create', 'uses' => 'MediaController@update'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
