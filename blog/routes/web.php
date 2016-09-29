<?php

	Route::any('/', ['as' => 'home', 'uses' => 'PostsController@index']);

	// users
	Route::get('/login', ['as' => 'users.login-form', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/login', ['as' => 'users.login', 'uses' => 'Auth\LoginController@login']);
	Route::get('/logout', ['as' => 'users.logout', 'uses' => 'Auth\LoginController@logout']);
	Route::get('/registration', ['as' => 'users.registration-form', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('/registration', ['as' => 'users.register', 'uses' => 'Auth\RegisterController@register']);


	Route::get('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@showAdminLoginForm']);
	Route::post('admin/login', ['as' => 'users.admin-login-form', 'uses' => 'Auth\LoginController@login']);

	// posts
	Route::resource('posts', 'PostsController');
	Route::get('posts/{post}/delete', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);

	// comments
	Route::resource('posts.comments', 'CommentsController', ['only' => ['store', 'destroy']]);
	Route::get('comments/{comment}/delete', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);

	Route::get('posts/{post}#comments', ['as' => 'comments.index', 'uses' => 'PostsController@show']);
	Route::get('posts/{post}#comment{comment}', ['as' => 'comments.show', 'uses' => 'PostsController@show']);
