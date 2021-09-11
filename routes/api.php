<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;
use App\Http\Resources\UserDataResource;
use App\Http\Resources\UserResource;
use Igaster\LaravelCities\GeoController;
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

    /** Return currently logged-in user */
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return new UserResource(Auth::user());
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

/** Geo API */
Route::group(['prefix' => 'geo'], function() {
    Route::get('countries', [GeoController::class, 'countries']);
    Route::get('children/{id}', [GeoController::class, 'children']);
});