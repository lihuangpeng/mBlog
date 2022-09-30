<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/**
 * 博客后台路由
 */
Route::namespace('\\App\\Http\\Admin\\')->group(function (){
    Route::get('/','IndexController@index');

    Route::prefix('index')->group(function (){
        Route::get('/','IndexController@index');
        Route::get('/welcome','IndexController@welcome');
    });


});
