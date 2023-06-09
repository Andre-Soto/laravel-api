<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



Route::post('/user', 'App\Http\Controllers\AuthController@store');
Route::post('/login', 'App\Http\Controllers\AuthController@login' );


Route::group(['middleware' => 'auth.token'], function () {
    Route::get('/customer', 'App\Http\Controllers\CustomerController@index');
    Route::post('/customer', 'App\Http\Controllers\CustomerController@store');
    Route::get('/customer/{customer}', 'App\Http\Controllers\CustomerController@show');
    Route::put('/customer/{customer}', 'App\Http\Controllers\CustomerController@update');
    Route::delete('/customer/{customer}', 'App\Http\Controllers\CustomerController@destroy');
 });