<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => 'auth:api'], function () {
Route::apiResource('survey', 'API\SurveyController');
// Route::apiResource('survey', 'API\SurveyController')->only('show');
    // Route::apiResources([
    //     'survey' => 'API\SurveyController',
    // ]);
// ->only(['show'])
    // Route::get('kegiatankomponen', 'API\SurveyController@listkomponen')->name('api.listkomponen');
    Route::post('survey_result', 'API\SurveyController@survey_result')->name('api.survey_result');
// });