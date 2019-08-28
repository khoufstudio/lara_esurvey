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

// Route::prefix('photogallery')->group(function() {
//     Route::get('/', 'PhotoGalleryController@index');
// });

use Illuminate\Http\Request;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/album_photos', [
        'as'    => 'album_photo.index',
        'uses'  => 'PhotoGalleryController@index'
    ]);

    Route::post('/album_photos', [
        'as'    => 'album_photo.post',
        'uses'  => 'PhotoGalleryController@index'
    ]);

    Route::get('/album_photos/{id}/edit', [
        'as'    => 'album_photo.edit',
        'uses'  => 'PhotoGalleryController@edit'
    ]);

    Route::post('/album_photos/update/{id}', [
        'as'    => 'album_photo.update',
        'uses'  => 'PhotoGalleryController@update'
    ]);

    Route::post('/album_photos/store', [
        'as'    => 'album_photo.store',
        'uses'  => 'PhotoGalleryController@store'
    ]);

    Route::post('/album_photos/delete/{id}', [
        'as'    => 'album_photo.delete',
        'uses'  => 'PhotoGalleryController@destroy'
    ]);

    Route::get('/album_photos/create_album', [
        'as'    => 'album_photo.create_album',
        'uses'  => 'PhotoGalleryController@create'
    ]);


    Route::get('/album_photos/{id}/image_galleries', [
        'as'    => 'album_photo.image_galleries',
        'uses'  => 'PhotoGalleryController@galery'
    ]);

    Route::post('/album_photos/image_galleries/store/{id}', [
        'as'    => 'album_photo.image_galleries.store',
        'uses'  => 'PhotoGalleryController@galery_store'
    ]);

    Route::post('/album_photos/image_galleries/delete/{id}', [
        'as'    => 'album_photo.image_galleries.delete',
        'uses'  => 'PhotoGalleryController@galery_delete'
    ]);

    Route::post('/album_photos/image_galleries/update/{id}', [
        'as'    => 'album_photo.image_galleries.update',
        'uses'  => 'PhotoGalleryController@galery_update'
    ]);

    Route::get('/cleardata/photo', function(Request $request){
        $request->session()->forget('search_photogal');
        return redirect()->back();
    })->name('cleardata.photo');



});
