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

Route::prefix('surveystat')->group(function() {
    Route::get('/', 'SurveyStatController@index');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
  
  Route::get('/surveystat', [
    'as' => 'cms.surveystat',
    'uses' => 'SurveyStatController@index'
  ]);
    
  Route::get('/surveystat/create', [
    'as' => 'cms.surveystat.create',
    'uses' => 'SurveyStatController@create'
  ]);
  
  Route::post('/surveystat/store', [
    'as' => 'cms.surveystat.store',
    'uses' => 'SurveyStatController@store'
  ]);
    
  Route::get('/surveystat/{id}/edit', [
    'as' => 'cms.surveystat.edit',
    'uses' => 'SurveyStatController@edit'
  ]);
    
  Route::get('/surveystat/{id}/show', [
    'as' => 'cms.surveystat.show',
    'uses' => 'SurveyStatController@show'
  ]);
    
  Route::post('/surveystat/update/{id}', [
    'as' => 'cms.surveystat.update',
    'uses' => 'SurveyStatController@update'
  ]);
    
  Route::post('/surveystat/delete/{id}', [
    'as' => 'cms.surveystat.delete',
    'uses' => 'SurveyStatController@destroy'
  ]);
    
  Route::get('/surveystat/download/{id}', [
    'as' => 'cms.surveystat.download',
    'uses' => 'SurveyStatController@download'
  ]);
      
});
