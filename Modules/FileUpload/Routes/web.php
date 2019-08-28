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

// Route::prefix('fileupload')->group(function() {
//     Route::get('/', 'FileUploadController@index');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/file_uploads', [
        'as'    => 'file_upload.index',
        'uses'  => 'FileUploadController@index'
    ]);

    Route::get('/file_uploads/{id}/edit', [
        'as'    => 'file_upload.edit',
        'uses'  => 'FileUploadController@edit'
    ]);

    Route::post('/file_uploads/store', [
        'as'    => 'file_upload.store',
        'uses'  => 'FileUploadController@store'
    ]);

    Route::post('/file_uploads/update/{id}', [
        'as'    => 'file_upload.update',
        'uses'  => 'FileUploadController@update'
    ]);

    Route::post('/file_uploads/delete/{id}', [
        'as'    => 'file_upload.delete',
        'uses'  => 'FileUploadController@destroy'
    ]);





});