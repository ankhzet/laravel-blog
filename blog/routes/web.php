<?php

Route::group(['middleware' => ['web']], function () {
	Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);

	Route::get('/login', ['as' => 'user.logout', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/login', ['as' => 'user.logout', 'uses' => 'Auth\LoginController@login']);
	Route::get('/logout', ['as' => 'user.logout', 'uses' => 'Auth\LoginController@logout']);

});

