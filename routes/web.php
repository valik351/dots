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

Route::group(['prefix' => 'course/{course_id}'], function () {
    Route::get('/', 'CourseController@show');
    Route::get('about', 'CourseController@about');
    Route::get('buy', 'CourseController@buy');

    Route::group(['prefix' => 'module/{module_id}'], function () {
        Route::get('/', 'ModuleController@show');

        Route::group(['prefix' => 'problem/{problem_id}'], function () {
            Route::get('/', 'ProblemController@show');
            Route::post('/', 'ProblemController@submitSolution');
        });

        Route::group(['prefix' => 'solution/{solution_id}'], function () {
            Route::get('/', 'SolutionController@show');
        });

    });
});

Route::group(['prefix' => 'transaction'], function () {
    Route::any('callback', 'TransactionController@callback');
});

Auth::routes();

