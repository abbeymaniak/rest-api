<?php

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

Route::prefix('v1')->group(function () {

    Route::get('predictions', 'Predictions\PredictionController@index');
    Route::get('predictions', 'Predictions\PredictionController@index');
    Route::post('predictions', 'Predictions\PredictionController@store');
    Route::patch('predictions/{prediction}', 'Predictions\PredictionController@updateStatus');
});
