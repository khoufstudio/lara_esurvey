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

// Route::prefix('berita')->group(function() {
//     Route::get('/', 'BeritaController@index');
// });


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    // Route::get('/berita', [
    //     'as'  => 'berita.index',
    //     'uses'  => 'BeritaController@index'
    // ]);


    // Route::get('/berita/create', [
    //     'as'    => 'berita.create',
    //     'uses'  => 'BeritaController@create'
    // ]);

    // Route::post('/berita/store', [
    //     'as'    => 'berita.store',
    //     'uses'  => 'BeritaController@store'
    // ]);

    // Route::post('/berita/delete/{id}', [
    //     'as'    => 'berita.delete',
    //     'uses'  => 'BeritaController@destroy'
    // ]);

    // Route::post('/berita/update/{id}', [
    //     'as'    => 'berita.update',
    //     'uses'  => 'BeritaController@update'
    // ]);
    
 

    // Route::get('/berita/{id}/edit', [
    //     'as'    => 'berita.edit',
    //     'uses'  => 'BeritaController@edit'
    // ]);




});

Route::post('/berita/comment/{id}', [
    'as'    => 'berita.comment',
    'uses'  => 'BeritaController@comment'
]);

