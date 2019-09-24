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

    Route::get('/surveyresult', [
        'as' => 'cms.surveyresult',
        'uses' => 'SurveyResultController@index'
    ]);

    Route::get('/surveyresult/create', [
        'as' => 'cms.surveyresult.create',
        'uses' => 'SurveyResultController@create'
    ]);

    Route::post('/surveyresult/store', [
        'as' => 'cms.surveyresult.store',
        'uses' => 'SurveyResultController@store'
    ]);

    Route::get('/surveyresult/{id}/edit', [
        'as' => 'cms.surveyresult.edit',
        'uses' => 'SurveyResultController@edit'
    ]);

    Route::get('/surveyresult/{id}/show', [
        'as' => 'cms.surveyresult.show',
        'uses' => 'SurveyResultController@show'
    ]);

    Route::post('/surveyresult/update/{id}', [
        'as' => 'cms.surveyresult.update',
        'uses' => 'SurveyResultController@update'
    ]);

    Route::post('/surveyresult/delete/{id}', [
        'as' => 'cms.surveyresult.delete',
        'uses' => 'SurveyResultController@destroy'
    ]);

    Route::get('/surveyresult/download/{id}', [
        'as' => 'cms.surveyresult.download',
        'uses' => 'SurveyResultController@download'
    ]);

});
