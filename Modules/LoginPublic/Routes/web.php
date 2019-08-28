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

// Route::prefix('loginpublic')->group(function() {
//     Route::get('/', 'LoginPublicController@index');
// });

Route::get('/login/public', 'LoginPublicController@showPublicLoginForm');
Route::post('/login/public', 'LoginPublicController@publicLogin');
Route::post('/logout/public', 'LoginPublicController@logout')->name('logout.public');

// Route::post('/login/writer', 'Auth\LoginController@writerLogin');
