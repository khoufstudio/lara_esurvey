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

// Route::prefix('blog')->group(function() {
//     Route::get('/', 'BlogController@index');
// });

use Illuminate\Http\Request;
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/blogs', [
        'as'    => 'cms.blog.post',
        'uses'  => 'BlogController@index'
    ]);
    
    Route::post('/blogs', [
        'as'    => 'cms.blog.search',
        'uses'  => 'BlogController@index'
    ]);

    Route::get('/blog/post/create', [
        'as'    => 'cms.blog.create',
        'uses'  => 'BlogController@create'
    ]);

    Route::get('/blog/post/{id}/edit', [
        'as'    => 'cms.blog.edit',
        'uses'  => 'BlogController@edit'
    ]);

    Route::post('/blog/post/store', [
        'as'    => 'cms.blog.store',
        'uses'  => 'BlogController@store'
    ]);

    Route::post('/blog/post/update/{id}', [
        'as'    => 'cms.blog.update',
        'uses'  => 'BlogController@update'
    ]);

    Route::post('/blog/post/delete/{id}', [
        'as'    => 'cms.blog.delete',
        'uses'  => 'BlogController@destroy'
    ]);

    Route::get('/cleardata/blog', function(Request $request){
        $request->session()->forget('search_blog');
        return redirect()->back();
    })->name('cleardata.blog');


});


