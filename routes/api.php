<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('taxies', 			'TaxyinfoApiController@allRecords');
Route::get('taxies/{id}', 		'TaxyinfoApiController@oneRecord');
Route::post('taxies', 			'TaxyinfoApiController@createRecord');
Route::put('taxies/{id}', 		'TaxyinfoApiController@updateRecord');
Route::delete('taxies/{id}',	'TaxyinfoApiController@deleteRecord');


