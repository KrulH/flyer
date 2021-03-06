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
// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@logout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/', 'PagesController@home');

Route::Resource('flyers','FlyersController');
Route::get('{zip}/{street}','FlyersController@show');

Route::post('{zip}/{street}/photos',['as' => 'store_photo_path', 'uses' => 'FlyersController@addPhoto']);

Route::post('{zip}/{street}/photos',['as' => 'store_photo_path', 'uses' =>'PhotosController@store']);