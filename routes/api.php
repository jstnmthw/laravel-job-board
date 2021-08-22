<?php

use App\Http\Controllers\api\UserController;
use App\Http\Resources\UserDataResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\auth\LoginController;

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

/**
 * Protected API
 */
Route::group(['middleware' => ['auth:sanctum', 'throttle:60,1']], function () {
    Route::get('/user', function () {
        return new UserResource(Auth::user());
    })->name('user');
    Route::get('/user/data', function () {
        return new UserDataResource(Auth::user());
    })->name('user.data');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::apiResource('users', UserController::class);
});

/**
 * Unprotected API
 */
Route::post('/login', [LoginController::class, 'login']);

/** Geo API */
Route::group(['prefix' => 'geo'], function() {
//    Route::get('search/{name}/{parent_id?}', 	'\Igaster\LaravelCities\GeoController@search');
    Route::get('item/{id}', 		'\Igaster\LaravelCities\GeoController@item');
    Route::get('children/{id}', 	'\Igaster\LaravelCities\GeoController@children');
    Route::get('parent/{id}', 	'\Igaster\LaravelCities\GeoController@parent');
    Route::get('country/{code}',	'\Igaster\LaravelCities\GeoController@country');
    Route::get('countries', 		'\Igaster\LaravelCities\GeoController@countries');
    Route::get('ancestors/{id}','\Igaster\LaravelCities\GeoController@ancestors');
    Route::get('breadcrumbs/{id}','\Igaster\LaravelCities\GeoController@breadcrumbs');
});