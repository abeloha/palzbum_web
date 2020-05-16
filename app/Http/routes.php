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

Route::get('/', 'LandingController@index');
Route::get('index', 'LandingController@index');

Route::get('newuser', array('uses' => 'LandingController@newuser'));
Route::get('register', array('uses' => 'LandingController@newregister'));
Route::get('login', array('uses' => 'LandingController@newuser'));
Route::post('register', array('uses' => 'LandingController@register'));
Route::post('login', array('uses' => 'LandingController@login'));

Route::get('logout', array('uses' => 'LandingController@logout'));

Route::controller('api', 'ApiController'); //must come first

Route::controller('home', 'HomeController');
Route::controller('palz', 'PalzController');
Route::controller('group', 'GroupController');
Route::controller('me', 'MeController');

//added Abel - 23/10/2018
Route::controller('admin', 'AdminController');
Route::get('test', array('uses' => 'LandingController@test'));
//end added

Route::get('/{id}', 'LandingController@group');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Abel and Dammy Development