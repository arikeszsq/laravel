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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', 'IndexController@index');
Route::post('/getData', 'IndexController@getData');
Route::post('/add', 'IndexController@add');

Route::group(['prefix' => 'charts'], function () {
    Route::any('weight', 'ChartsController@weight')->name('weight');
});

Route::group(['prefix' => 'blog'], function () {
    Route::any('blog', 'BlogController@index')->name('blog');
});

