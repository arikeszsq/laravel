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

Route::any('money/add','MoneyController@add');

Route::any('money/getCountMoney','MoneyController@getCountMoney');
Route::any('money/getList','MoneyController@getList');

Route::any('fund/getInfo','FundController@getInfo');

Route::any('basic/info','BasicInfoController@info');

Route::any('mail/send','MailController@send');


Route::middleware('cors')->any('vue/money/add','VueController@addMoney');
Route::middleware('cors')->any('vue/money/list','VueController@listMoney');

