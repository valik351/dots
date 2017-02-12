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
Route::group(['middleware' => 'access:web,1,'], function () {
    Route::group(['prefix' => 'course/{course_id}'], function () {
        Route::get('/', 'CourseController@show')->middleware('course_check');
        Route::get('about', 'CourseController@about');
        Route::get('buy', 'CourseController@buy');
        Route::get('required', 'CourseController@required');

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
        Route::get('result/{id}', 'TransactionController@result');
    });
});
Route::get('/', 'HomeController@index');
Auth::routes();