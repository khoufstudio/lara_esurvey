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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/survey', [
        'as' => 'cms.survey',
        'uses' => 'SurveyController@index'
    ]);

    Route::get('/survey/create', [
        'as' => 'cms.survey.create',
        'uses' => 'SurveyController@create'
    ]);

    Route::post('/survey/store', [
        'as' => 'cms.survey.store',
        'uses' => 'SurveyController@store'
    ]);

    Route::get('/survey/{id}/edit', [
        'as' => 'cms.survey.edit',
        'uses' => 'SurveyController@edit'
    ]);

    Route::get('/survey/{id}/show', [
        'as' => 'cms.survey.show',
        'uses' => 'SurveyController@show'
    ]);

    Route::post('/survey/update/{id}', [
        'as' => 'cms.survey.update',
        'uses' => 'SurveyController@update'
    ]);

    Route::post('/survey/delete/{id}', [
        'as' => 'cms.survey.delete',
        'uses' => 'SurveyController@destroy'
    ]);

    Route::get('/survey/download/{id}', [
        'as' => 'cms.survey.download',
        'uses' => 'SurveyController@download'
    ]);

});


