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

// Route::prefix('videogallery')->group(function() {
//     Route::get('/', 'VideoGalleryController@index');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/video_galleries', [
        'as'    => 'videogalleries.index',
        'uses'  => 'VideoGalleryController@index'
    ]);

    Route::get('/video_galleries/{id}/edit', [
        'as'    => 'videogallery.edit',
        'uses'  => 'VideoGalleryController@edit'
    ]);

    Route::post('/video_gallery/store', [
        'as'    => 'videogallery.store',
        'uses'  => 'VideoGalleryController@store'
    ]);

    Route::post('/video_gallery/update/{id}', [
        'as'    => 'videogallery.update',
        'uses'  => 'VideoGalleryController@update'
    ]);

    Route::post('/video_gallery/delete/{id}', [
        'as'    => 'videogallery.delete',
        'uses'  => 'VideoGalleryController@destroy'
    ]);

});
