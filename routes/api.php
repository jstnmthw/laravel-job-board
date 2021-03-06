<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\GeoController;
use App\Http\Controllers\api\JobController;
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
Route::group(['middleware' => ['auth:sanctum', 'throttle:120,1']], function () {

    /** Return currently logged-in user */
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return new UserResource(Auth::user()->load('avatar'));
        })->name('user');
        Route::get('data', function () {
            return new UserDataResource(Auth::user());
        })->name('user.data');
        Route::post('upload/avatar/{id}', [UserController::class, 'uploadAvatar']);
    });
    Route::apiResource('users', UserController::class);

    /** Authentication */
    Route::post('logout', [LoginController::class, 'logout']);

});

/**
 * Unprotected API
 */
Route::post('login', [LoginController::class, 'login']);

/** Category Resource */
Route::resource('categories', CategoryController::class);

/** Job Resource */
Route::get('jobs/search', [JobController::class, 'search']);
Route::get('jobs/filters', [JobController::class, 'getFilters']);
Route::apiResource('jobs', JobController::class);

/** Geo API */
Route::group(['prefix' => 'geo'], function() {
    Route::get('locations', [GeoController::class, 'searchElastic']);
    Route::get('countries', [GeoController::class, 'countries']);
    Route::get('children/{id}', [GeoController::class, 'getChildren']);
    Route::get('{id}', [GeoController::class, 'item']);
});