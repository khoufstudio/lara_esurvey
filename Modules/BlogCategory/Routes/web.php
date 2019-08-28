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

// Route::prefix('blogcategory')->group(function() {
//     Route::get('/', 'BlogCategoryController@index');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/blogcategories', [
        'as'    => 'cms.blogcategories',
        'uses'  => 'BlogCategoryController@index'
    ]);

    Route::post('/blogcategories/store', [
        'as'    => 'cms.blogcategories.store',
        'uses'  => 'BlogCategoryController@store'
    ]);

    Route::get('/blogcategories/{id}/edit', [
        'as'    => 'cms.blogcategories.edit',
        'uses'  => 'BlogCategoryController@edit'
    ]);

    Route::post('/blogcategories/update/{id}', [
        'as'    => 'cms.blogcategories.update',
        'uses'  => 'BlogCategoryController@update'
    ]);

    Route::post('/blogcategories/delete/{id}', [
        'as'    => 'cms.blogcategories.delete',
        'uses'  => 'BlogCategoryController@destroy'
    ]);


});

