<?php

Route::group(['middleware' => ['web']], function () {
	Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);

	Route::get('/login', ['as' => 'users.login-form', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/login', ['as' => 'users.login', 'uses' => 'Auth\LoginController@login']);
	Route::get('/logout', ['as' => 'users.logout', 'uses' => 'Auth\LoginController@logout']);

});

