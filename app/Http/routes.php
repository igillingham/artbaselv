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
Route::get('galleries/delete/{id}', array('uses' => 'GalleriesController@destroy', 'as' => 'gallery.delete'));
Route::get('galleries/create', array( 'as' => 'gallery.showcreate', 'uses' =>'GalleriesController@show_create'));
Route::patch('galleries-update-submit/{id}', array('as' => 'gallery.update', 'uses' => 'GalleriesController@update'));
Route::post('galleries-update-submit', array('as' => 'gallery.create', 'uses' => 'GalleriesController@update'));

Route::get('media/list', 'MediaController@index');
Route::get('media/edit/{id}', 'MediaController@edit');
Route::get('media/delete/{id}', array('uses' => 'MediaController@destroy', 'as' => 'medium.delete'));
Route::get('media/create', array( 'as' => 'medium.showcreate', 'uses' =>'MediaController@show_create'));
Route::patch('media-update-submit/{id}', array('as' => 'medium.update', 'uses' => 'MediaController@update'));
Route::post('media-update-submit', array('as' => 'medium.create', 'uses' => 'MediaController@update'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
