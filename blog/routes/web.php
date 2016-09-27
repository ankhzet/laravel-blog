<?php

Route::group(['middleware' => ['web']], function () {
	Route::any('/', ['as' => 'home', 'uses' => 'HomeController@index']);

});

