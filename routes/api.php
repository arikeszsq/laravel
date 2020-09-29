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
});

Route::group(['namespace' => 'Vue', 'middleware' => 'cors', 'prefix' => 'vue'], function () {
    Route::any('money/delete', 'MoneyController@delete');
});

/**
 * 因为我们 Api 控制器的命名空间是 App\Http\Controllers\Api,
 * 而 Laravel 默认只会在命名空间 App\Http\Controllers 下查找控制器，所以需要我们给出 namespace。
 * 同时，添加一个 prefix 是为了版本号，方便后期接口升级区分。
 * 打开 postman, 用 get 方式请求你的域名/api/v1/users
 */
//Route::namespace('Api')->prefix('v1')->group(function () {
//    Route::get('/users', 'UserController@index')->name('users.index');
//});
