<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'course'], function () {
    Route::get('{id}/about', 'CourseController@about');
    Route::get('{id}/buy', 'CourseController@buy');
    Route::get('{id}/pay', 'CourseController@pay');
});

Route::group(['prefix' => 'transaction'], function () {
    Route::any('callback', 'TransactionController@callback');
});

Auth::routes();

