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

// Route::prefix('runningtext')->group(function() {
//     Route::get('/', 'RunningTextController@index');
// });

use Illuminate\Http\Request;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    
    Route::get('/runningtext', 'RunningTextController@index')->name('runningtext.index');
    Route::post('/runningtext', 'RunningTextController@index')->name('runningtext.post');
    Route::post('/runningtext/store', 'RunningTextController@store')->name('runningtext.store');
    Route::get('/runningtext/{id}/edit', 'RunningTextController@edit')->name('runningtext.edit');
    Route::post('/runningtext/update/{id}', 'RunningTextController@update')->name('runningtext.update');
    Route::post('/runningtext/delete/{id}', 'RunningTextController@destroy')->name('runningtext.delete');
    
    Route::get('/cleardata/runningtext', function(Request $request){
        $request->session()->forget('search_runningtext');

        return redirect()->back(); 
    })->name('cleardata.runningtext');

});

