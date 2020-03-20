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

Route::prefix('v1')->group(function() {
    Route::post('login', 'Api\LoginController@login');
    Route::get('posts', 'Api\PostController@index');
    Route::get('post/show/{id}', 'Api\PostController@show');

    Route::post('register', 'Api\RegisterController@register');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('getUser', 'Api\AuthController@getUser');
    });
});
