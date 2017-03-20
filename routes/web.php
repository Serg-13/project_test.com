<?php

Auth::routes();

Route::group(['prefix' => '/', 'middleware' => ['web', 'auth']], function(){

	Route::get('/', ['uses'=>'Admin\AdminController@show', 'as' => 'home']);

	Route::get('/add_task', ['uses' => 'Admin\AdminCreateController@show', 'as' => 'add_task']);
	Route::post('/add_task', ['uses' => 'Admin\AdminCreateController@create', 'as' => 'add_task_post']);

	Route::get('/update/{id}', ['uses' => 'Admin\AdminUpdateController@show', 'as' => 'update']);
	Route::post('/update/{id}', ['uses' => 'Admin\AdminUpdateController@update', 'as' => 'update_post']);

	Route::get('/done_yes/{id}', ['uses' => 'Admin\AdminDoneController@done_yes', 'as' => 'done_yes']);	
	Route::get('/done_no/{id}', ['uses' => 'Admin\AdminDoneController@done_no', 'as' => 'done_no']);

});

