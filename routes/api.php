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

Route::group(['middleware' => ['cors', 'json.response']], function () {
    // Route Login
    Route::namespace('Api')
        ->name('api.user.')
        ->prefix('auth')
        ->group(function () {
            Route::post('login', 'AuthController@login')->name('login');
            Route::post('register', 'AuthController@register')->name('register');

            Route::middleware(['auth:sanctum'])
                ->group(function () {
                    Route::get('logout', 'AuthController@logout')->name('logout');
                });
        });

    // Route Pins
    Route::namespace('Api')
        ->name('pins.')
        ->prefix('pins')
        ->middleware(['auth:sanctum'])
        ->group(function () {
            Route::get('/', 'PinController@index')->name('index');
            Route::get('/moderation', 'PinController@moderation')->name('moderation');
            Route::get('/favorites', 'PinController@favorites')->name('favorites');
            Route::get('/like/{pin}', 'PinController@like')->name('like');
            Route::get('/publish/{pin}', 'PinController@publish')->name('publish');
            Route::post('/', 'PinController@store')->name('store');
        });
});
