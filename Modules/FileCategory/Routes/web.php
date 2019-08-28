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

// Route::prefix('filecategory')->group(function() {
//     Route::get('/', 'FileCategoryController@index');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
    Route::get('/file_categories', [
        'as'    => 'file_categories.index',
        'uses'  => 'FileCategoryController@index'
    ]);

    Route::post('/file_categories/store', [
        'as'    => 'file_category.store',
        'uses'  => 'FileCategoryController@store'
    ]);

    Route::get('/file_categories/{id}/edit', [
        'as'    => 'file_category.edit',
        'uses'  => 'FileCategoryController@edit'
    ]);

    Route::post('/file_categories/update/{id}', [
        'as'    => 'file_category.update',
        'uses'  => 'FileCategoryController@update'
    ]);

    Route::post('/file_categories/delete/{id}', [
        'as'    => 'file_category.delete',
        'uses'  => 'FileCategoryController@destroy'
    ]);



});