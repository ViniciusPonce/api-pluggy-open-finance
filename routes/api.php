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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function ($router) {

    Route::post('register/admin', 'App\Http\Controllers\UserController@createUser');
    Route::post('office/create', 'App\Http\Controllers\UserController@createUser');
    Route::post('office/register', 'App\Http\Controllers\UserController@updateOfficeTerm'); 
    Route::post('business/register', 'App\Http\Controllers\UserController@createUser'); 
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'user'
// ], function ($router) {

//     Route::post('register', 'UserController@register');

// });

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'account'
// ], function ($router) {

//     // Route::post('register', 'AccountController@register');

// });

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'transaction'
// ], function ($router) {

//     // Route::post('register', 'TransactionController@register');

// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'pluggy-item'
], function ($router) {

    Route::post('create', 'App\Http\Controllers\ItemController@createItem');

});