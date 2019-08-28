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

// Route::prefix('bankmateri')->group(function() {
//     Route::get('/', 'BankMateriController@index');
// });

use Illuminate\Http\Request;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/bankmateri', 'BankMateriController@index')->name('bankmateri');
    Route::post('/bankmateri', 'BankMateriController@index')->name('bankmateri.post');
    Route::get('/bankmateri/create', 'BankMateriController@create')->name('bankmateri.create');
    Route::post('/bankmateri/store', 'BankMateriController@store')->name('bankmateri.store');
    Route::get('/bankmateri/download', 'BankMateriController@download')->name('bankmateri.download');
    Route::get('/bankmateri/{id}/edit', 'BankMateriController@edit')->name('bankmateri.edit');
    Route::post('/bankmateri/delete', 'BankMateriController@destroy')->name('bankmateri.delete');
    Route::post('/bankmateri/update/{id}', 'BankMateriController@update')->name('bankmateri.update');
    Route::get('/bankmateri/getsubdit/{id}', 'BankMateriController@getSubdit')->name('bankmateri.getsubdit');

    Route::get('/cleardata/arsips', function(Request $request){
        $request->session()->forget(['sess_direktorat', 'sess_subdit', 'sess_kategori_surat', 'sess_jenis_surat', 'sess_status', 'sess_periodedari', 'sess_periodesampai', 'sess_keyword']);
        return redirect()->back();
    })->name('cleardata.arsips');
});