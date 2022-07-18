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

/**
 * 博客请求api
 */
Route::namespace('\\App\\Http\\Api\\')->group(function (){
    Route::prefix('user/')->group(function (){
        Route::match(['post','get'],'sdkLogin','UserController@sdkLogin');
        Route::post('refreshToken','UserController@refreshToken');
    });
    Route::post('posts/index','PostsController@index')->middleware('auth:api');
});

