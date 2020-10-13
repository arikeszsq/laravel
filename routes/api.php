<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any('money/add', 'MoneyController@add');
Route::any('money/getCountMoney', 'MoneyController@getCountMoney');
Route::any('money/getList', 'MoneyController@getList');
Route::any('basic/info', 'BasicInfoController@info');
Route::any('mail/send', 'MailController@send');

Route::group(['namespace' => 'Vue', 'prefix' => 'vue'], function () {
    Route::any('basic/info', 'BasicInfoController@info');
    Route::any('money/list', 'MoneyController@list');
    Route::any('money/add', 'MoneyController@add');
    Route::any('money/delete', 'MoneyController@delete');
    /**salary接口**/
    Route::group(['prefix' => 'salary'], function () {
        Route::any('add', 'SalaryController@add');
        Route::any('delete', 'SalaryController@delete');
    });
    /**Learn接口**/
    Route::group(['prefix' => 'learn'], function () {
        Route::any('list', 'LearnController@list');
    });

    /**All接口**/
    Route::group(['prefix' => 'all'], function () {
        Route::any('add', 'AllController@add');
        Route::any('list', 'AllController@list');
    });

    /**Beauty接口**/
    Route::group(['prefix' => 'beauty'], function () {
        Route::any('list', 'BeautyController@list');
    });

});

Route::group(['namespace' => 'Vue', 'middleware' => 'cors', 'prefix' => 'vue'], function () {
//    Route::any('money/delete', 'MoneyController@delete');
});

/**
 * 因为我们 Api 控制器的命名空间是 App\Http\Controllers\Api,
 * 而 Laravel 默认只会在命名空间 App\Http\Controllers 下查找控制器，所以需要我们给出 namespace。
 * 同时，添加一个 prefix 是为了版本号，方便后期接口升级区分。
 * 打开 postman, 用 get 方式请求你的域名/api/v1/users
 */
