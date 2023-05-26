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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['cors'])->group(function () {
    Route::get('get-all', 'HumidityController@index');
    Route::post('insert-log', 'HumidityController@store');
    // Route::post('get-humidity', 'HumidityController@getHumidity');
    Route::get('get-humidity-2/{lng}/{lat}', 'HumidityController@getHumidity');
});

