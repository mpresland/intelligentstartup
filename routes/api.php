<?php

use App\Region;
use App\Occupation;
use Illuminate\Http\Request;
use App\Http\Resources\Regions;
use App\Http\Resources\Occupations;

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

Route::get('/regions', function () {
    return new Regions(Region::all());
});

Route::get('/occupations', function () {
    return new Occupations(Occupation::all());
});

Route::post('/search', '\App\Http\Controllers\Api\SearchController@search');
