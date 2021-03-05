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
//listing articles
Route::get('articles/','ArticleController@index');
Route::get('article/{id}','ArticleController@show');
Route::post('article/','ArticleController@store');
Route::put('article/','ArticleController@store');
Route::delete('article/{id}','ArticleController@destroy');

//listing persons
Route::get('persons/','PersonController@index');
Route::get('person/{id}','PersonController@show');
Route::post('person/','PersonController@store');
Route::put('person/','PersonController@store');
Route::delete('person/{id}','PersonController@destroy');
