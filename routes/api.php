<?php

use App\Http\Middleware\CorsPassport;
use App\Http\Middleware\Cors;
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


Route::apiResource('/offres', 'OffreController')->middleware('cors');

Route::apiResource('/candidats', 'CandidatController')->middleware('cors');

Route::apiResource('/likes', 'LikeController')->middleware('cors');

//Route::apiResource('/stories', 'StorieController')->middleware('corspassport');

Route::post('/stories/{id}', 'StorieController@store');
Route::get('/stories', 'StorieController@index')->middleware('cors');
Route::get('/stories/{id}', 'StorieController@show')->middleware('cors');
Route::put('/stories/{id}', 'StorieController@update');


