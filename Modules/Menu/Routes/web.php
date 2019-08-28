<?php


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

		Route::get('/menus', [
			'as'	=> 'menu.index',
			'uses'		=> 'MenuController@index'
		]);

		Route::get('/menu/{id}/edit', [
			'as'	=> 'menu.edit',
			'uses'		=> 'MenuController@edit'
		]);

		Route::post('/menu/update/{id}', [
			'as'	=> 'menu.update',
			'uses'		=> 'MenuController@update'
		]);

		Route::post('/menu/delete/{id}', [
			'as'	=> 'menu.delete',
			'uses'		=> 'MenuController@destroy'
		]);

		Route::post('/menu/store', [
			'as'	=> 'menu.store',
			'uses'		=> 'MenuController@store'
		]);

		Route::get('/menu/list_menu', [
			'as'	=> 'menu.list_menu',
			'uses'		=> 'MenuController@list_menu'
		]);
});