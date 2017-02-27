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
            Route::get('required', 'ModuleController@required');
//            Route::group(['middleware' => 'course_check'], function () {
            Route::get('/', 'ModuleController@show');

            Route::group(['prefix' => 'problem/{problem_id}'], function () {
                Route::get('/', 'ProblemController@show');
                Route::post('/', 'ProblemController@submitSolution');
                Route::group(['prefix' => 'solution/{solution_id}'], function () {
                    Route::get('/', 'SolutionController@show');
                });
            });
//            });
        });
    });
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('result/{id}', 'TransactionController@result');
    });
});
Route::group(['middleware' => 'access:web,0,' . App\User::ROLE_ADMIN, 'prefix' => 'dashboard'], function () {
    Route::get('/', 'Backend\DashboardController@index');

    Route::group(['prefix' => 'users'], function() {
       Route::get('/', 'Backend\UserController@index');
       Route::get('/form/{id?}', 'Backend\UserController@showForm');
       Route::post('/{id}', 'Backend\UserController@update');
       Route::post('/', 'Backend\UserController@create');
       Route::post('/delete/{id}', 'Backend\UserController@delete');
    });

    Route::group(['prefix' => 'transactions'], function() {
        Route::get('/', 'Backend\TransactionController@index');
    });
});
Route::get('/', 'HomeController@index');
Auth::routes();