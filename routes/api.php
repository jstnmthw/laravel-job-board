<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/**
 * Protected API
 */
Route::group(['middleware' => ['auth:sanctum', 'throttle:60,1']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

/**
 * Unprotected API
 */
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $remember = $request->input('remember');
    Auth::attempt($credentials, $remember)
        ? response()->json('Successfully Authenticated')
        : response()->json('Failed Authenticating', 401);
});
Route::post('/logout', function(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return response()->json('Logged out');
});