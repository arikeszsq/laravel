<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace'=>'Pc','prefix' => 'pc'], function () {
    Route::group(['prefix' => 'common'], function () {
        Route::any('list', 'CommonController@list')->name('list');
        Route::any('detail', 'CommonController@detail')->name('detail');
    });
});

Route::get('/', 'IndexController@index');
Route::post('/getData', 'IndexController@getData');
Route::post('/add', 'IndexController@add');

Route::group(['prefix' => 'charts'], function () {
    Route::any('weight', 'ChartsController@weight')->name('weight');
});

Route::group(['prefix' => 'blog'], function () {
    Route::any('blog', 'BlogController@index')->name('blog');
});

Route::group(['prefix' => 'upload'], function () {
    Route::any('index', 'UploadController@index')->name('index');
});

