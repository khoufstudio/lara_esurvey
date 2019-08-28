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

// Route::prefix('direktorat')->group(function() {
//     Route::get('/', 'DirektoratController@index');
// });

use Illuminate\Http\Request;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/direktorat', 'DirektoratController@index')->name('direktorat');
    Route::post('/direktorat', 'DirektoratController@index')->name('direktorat.post');
    Route::get('/direktorat/{id}/edit', 'DirektoratController@edit')->name('direktorat.edit');
    Route::post('/direktorat/store', 'DirektoratController@store')->name('direktorat.store');
    Route::post('/direktorat/subdit/store', 'SubditController@store')->name('subdit.store');
    Route::post('/direktorat/update/{id}', 'DirektoratController@update')->name('direktorat.update');
    Route::get('/direktorat/delete/{id}', 'DirektoratController@destroy')->name('direktorat.delete');

    Route::get('/cleardata/direktorat', function (Request $request) {
        $request->session()->forget('search_direktorat');
        return redirect()->back();
    })->name('cleardata.direktorat');

    //subdit route
    Route::get('/direktorat/subdit/{id}', 'DirektoratController@subdit_index')->name('direktorat.subdit');
    Route::post('/direktorat/subdit/{id}', 'DirektoratController@subdit_index')->name('subdit.post');
    Route::get('/direktorat/{id}/edit/subdit', 'SubditController@edit')->name('subdit.edit');
    Route::post('/direktorat/subdit/update/{id}', 'SubditController@update')->name('subdit.update');
    Route::get('/direktorat/subdit/delete/{id}', 'SubditController@destroy')->name('subdit.delete');
    // Route::post('/direktorat/subdit/submit', 'DirektoratController@subdit_store')->name('subdit.subdit_submit');

    //jneis surat route
    Route::get('/direktorat/jenis_surat', 'DirektoratController@jenis_surat')->name('direktorat.jenis_surat');

    Route::get('/cleardata/subdit', function (Request $request) {
        $request->session()->forget('search_subdit');
        return redirect()->back();
    })->name('cleardata.subdit');
});
