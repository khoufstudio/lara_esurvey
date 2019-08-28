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

// Route::prefix('slider')->group(function() {
//     Route::get('/', 'SliderController@index');
// });

use Illuminate\Http\Request;

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/sliders', [
        'as'    => 'sliders.index',
        'uses'  => 'SliderController@index'
    ]);

    Route::post('/sliders', [
        'as'    => 'sliders.post',
        'uses'  => 'SliderController@index'
    ]);

    Route::get('/slider/{id}/edit', [
        'as'    => 'slider.edit',
        'uses'  => 'SliderController@edit'
    ]);

    Route::post('/slider/store', [
        'as'    => 'slider.store',
        'uses'  => 'SliderController@store'
    ]);

    Route::post('/slider/update/{id}', [
        'as'    => 'slider.update',
        'uses'  => 'SliderController@update'
    ]);

    Route::post('/slider/delete/{id}', [
        'as'    => 'slider.delete',
        'uses'  => 'SliderController@destroy'
    ]);

    Route::get('/cleardata/slider', function(Request $request){
        $request->session()->forget('search_slider');
        return redirect()->back();
    })->name('cleardata.slider');


});
