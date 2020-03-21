<?php

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

Route::prefix('v1')->group(function () {

    Route::post('post', 'Api\PostController@store');
    Route::get('posts', 'Api\PostController@index');
    Route::get('post/show/{id}', 'Api\PostController@show');

    Route::post('login', 'Api\LoginController@login');
    Route::post('register', 'Api\RegisterController@register');
});
