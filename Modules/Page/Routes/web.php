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

// Route::prefix('page')->group(function() {
//     Route::get('/', 'PageController@index');
// });

use Illuminate\Http\Request;
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/pages', [
        'as'    => 'cms.pages',
        'uses'  => 'PageController@index'
    ]);

    Route::post('/pages', [
        'as'    => 'cms.pages.post',
        'uses'  => 'PageController@index'
    ]);

    Route::get('/pages/create', [
        'as'    => 'cms.pages.create',
        'uses'  => 'PageController@create'
    ]);

    Route::post('/pages/store', [
        'as'    => 'cms.page.store',
        'uses'  => 'PageController@store'
    ]);

    Route::get('/pages/{id}/edit', [
        'as'    => 'cms.page.edit',
        'uses'  => 'PageController@edit'
    ]);

    Route::post('/pages/update/{id}', [
        'as'    => 'cms.page.update',
        'uses'  => 'PageController@update'
    ]);

    Route::post('/pages/delete/{id}', [
        'as'    => 'cms.page.delete',
        'uses'  => 'PageController@destroy'
    ]);

    Route::get('/cleardata/page', function(Request $request){
        $request->session()->forget('search_page');
        return redirect()->back();
    })->name('cleardata.page');

});
