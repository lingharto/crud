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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Modules\Auth\Http\Controllers\JwtAuthController@login');
    Route::post('logout', 'Modules\Auth\Http\Controllers\JwtAuthController@logout');
    Route::post('refresh', 'Modules\Auth\Http\Controllers\JwtAuthController@refresh');
    Route::post('me', 'Modules\Auth\Http\Controllers\JwtAuthController@me');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'admin'
], function ($router) {

    Route::prefix('user')->group(function() {
        Route::post('all', 'Modules\User\Http\Controllers\Admin\UserController@index');
        Route::post('create', 'Modules\User\Http\Controllers\Admin\UserController@create');
        Route::post('update/{id}', 'Modules\User\Http\Controllers\Admin\UserController@update');
        Route::get('find/{id}', 'Modules\User\Http\Controllers\Admin\UserController@find');
        Route::get('delete/{id}', 'Modules\User\Http\Controllers\Admin\UserController@delete');
    });

    Route::prefix('common')->group(function() {
        Route::post('entityFields', 'Modules\CommonAdmin\Http\Controllers\CommonAdminController@entityFields');
    });
});



