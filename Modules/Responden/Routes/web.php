<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/responden', [
        'as' => 'cms.responden',
        'uses' => 'RespondenController@index'
    ]);

    Route::get('/responden/create', [
        'as' => 'cms.responden.create',
        'uses' => 'RespondenController@create'
    ]);

    Route::post('/responden/store', [
        'as' => 'cms.responden.store',
        'uses' => 'RespondenController@store'
    ]);

    Route::get('/responden/{id}/edit', [
        'as' => 'cms.responden.edit',
        'uses' => 'RespondenController@edit'
    ]);

    Route::get('/responden/{id}/show', [
        'as' => 'cms.responden.show',
        'uses' => 'RespondenController@show'
    ]);

    Route::post('/responden/update/{id}', [
        'as' => 'cms.responden.update',
        'uses' => 'RespondenController@update'
    ]);

    Route::post('/responden/delete/{id}', [
        'as' => 'cms.responden.delete',
        'uses' => 'RespondenController@destroy'
    ]);

    Route::get('/responden/download/{id}', [
        'as' => 'cms.responden.download',
        'uses' => 'RespondenController@download'
    ]);

});
