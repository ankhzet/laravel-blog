<?php

	Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);

	// users
	Route::get('/login', ['as' => 'users.login-form', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/login', ['as' => 'users.login', 'uses' => 'Auth\LoginController@login']);
	Route::get('/logout', ['as' => 'users.logout', 'uses' => 'Auth\LoginController@logout']);


	Route::get('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@showAdminLoginForm']);
	Route::post('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@login']);
