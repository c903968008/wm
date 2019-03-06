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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login','Auth\LoginController@login');
Route::post('/regist','Auth\RegisterController@register');

//shop接口
Route::get('/getAllShop','ShopController@showAll');
Route::post('/getShopById','ShopController@getById');

//collection接口
Route::post('/collect','CollectionController@collect');
Route::post('/isCollect','CollectionController@isCollect');
Route::post('/ncollect','CollectionController@ncollect');