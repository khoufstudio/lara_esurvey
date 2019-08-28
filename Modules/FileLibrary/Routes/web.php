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

// Route::prefix('filelibrary')->group(function() {
//     Route::get('/', 'FileLibraryController@index');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/filelibraries', [
        'as'    => 'cms.filelibraries',
        'uses'  => 'FileLibraryController@index'
    ]);

    Route::post('/filelibrary/store', 'FileLibraryController@store')->name('filelibrary.store');

    Route::get('filelibrary/delete/{id}', 'FileLibraryController@destroy')->name('filelibrary.delete');

});
