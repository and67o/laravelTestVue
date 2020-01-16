<?php

use Illuminate\Http\Request;

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
    Route::post('login', 'Api\AuthController@login');
    Route::get('posts', 'Api\PostController@posts');
    Route::get('post/show/{id}', 'Api\PostController@show');

    Route::post('register', 'Api\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('getUser', 'Api\AuthController@getUser');
    });
});
