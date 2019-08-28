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

// Route::prefix('jenissurat')->group(function() {
//     Route::get('/', 'JenisSuratController@index');
// });

use Illuminate\Http\Request;
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
    Route::get('/jenissurat', 'JenisSuratController@index')->name('jenissurat');
    Route::post('/jenissurat', 'JenisSuratController@index')->name('jenissurat.post');
    Route::get('/jenissurat/{id}/edit', 'JenisSuratController@edit')->name('jenissurat.edit');
    Route::post('/jenissurat/store', 'JenisSuratController@store')->name('jenissurat.store');
    Route::post('/jenissurat/update/{id}', 'JenisSuratController@update')->name('jenissurat.update');
    Route::get('/jenissurat/delete/{id}', 'JenisSuratController@destroy')->name('jenissurat.delete');
    Route::get('/jenissurat/getjenis/{id}', 'JenisSuratController@getSuratKeluar')->name('jenissurat.getjenis');


    Route::get('/cleardata/jenissurat', function (Request $request) {
        $request->session()->forget('search_jenissurat');
        return redirect()->back();
    })->name('cleardata.jenissurat');

});