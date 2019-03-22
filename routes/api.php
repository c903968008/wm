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

//登录注册
Route::post('/login','Auth\LoginController@login');
Route::post('/regist','Auth\RegisterController@register');

//user接口
Route::post('editAvatar','UserController@editAvatar');
Route::post('editUserName','UserController@editName');
Route::post('editPassword','UserController@editPassword');

//shop接口
Route::get('/getAllShop','ShopController@showAll');
Route::post('/getShopById','ShopController@getById');

//collection接口
Route::post('/collect','CollectionController@collect');
Route::post('/isCollect','CollectionController@isCollect');
Route::post('/ncollect','CollectionController@ncollect');
Route::post('/getCollection','CollectionController@getByUserId');

//good接口
Route::post('/getGood','GoodController@getByShopId');

//evaluation接口
Route::post('/getEvaluationWithUser','EvaluationController@getByShopId');

//coupon接口
Route::post('/getCouponByUserId','CouponController@getWithShopByUserId');

Route::get('/test','Controller@json2');