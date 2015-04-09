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


Route::get('/', 'PostController@index');

Route::get('login/{id}', 'SocialController@login');
Route::get('logout', 'SocialController@logout');

Route::get('user/{id}', 'SocialController@getUser');

Route::resource('post', 'PostController');

Route::get('post', ['as' => 'post', 'uses' => 'PostController@create']);
Route::post('post', ['as' => 'post_store', 'uses' => 'PostController@store']);

Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
Route::post('admin', ['as' => 'admin_store', 'uses' => 'AdminController@store']);

Route::get('tags', 'TagController@index');
Route::get('tag/{id}', 'TagController@show');

Route::post('click', 'DataController@postClick');

