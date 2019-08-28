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

// Route::prefix('imagelibrary')->group(function() {
//     Route::get('/', 'ImageLibraryController@index');
// });



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/imagelibraries', [
        'as'    => 'cms.imagelibraries',
        'uses'  => 'ImageLibraryController@index'
    ]);

    Route::get('/imagelibrary/{id}/edit', [
        'as'    => 'cms.imagelibrary.edit',
        'uses'  => 'ImageLibraryController@edit'
    ]);

    Route::post('/imagelibrary/store', [
        'as'    => 'cms.imagelibrary.store',
        'uses'  => 'ImageLibraryController@store'
    ]);

    Route::post('/imagelibrary/update/{id}', [
        'as'    => 'cms.imagelibrary.update',
        'uses'  => 'ImageLibraryController@update'
    ]);

    Route::post('/imagelibrary/delete/{id}', [
        'as'    => 'cms.imagelibrary.delete',
        'uses'  => 'ImageLibraryController@destroy'
    ]);

});