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
Route::group(['namespace' => 'Api'], function() {
    Route::post('clients/auth/', 'ClientController@getToken')->middleware('auth.api_custom:null,App\Client,basic');
    Route::post('testing-servers/auth/', 'TestingServerController@getToken')->middleware('auth.api_custom:null,App\TestingServer,basic');

    Route::group(['middleware' => 'auth.api_custom:null,App\TestingServer,bearer'], function () {
        Route::get('problems/{id}/tests-archive.tar.gz', 'ProblemController@getArchive');
        Route::group(['prefix' => 'solutions'], function () {
            Route::get('{id}', 'SolutionController@show')->where('id', '[0-9]+');
            Route::patch('{id}', 'SolutionController@update')->where('id', '[0-9]+');
            Route::get('{id}/source-code', 'SolutionController@show_source_code')->where('id', '[0-9]+');
            Route::get('latest-new', 'SolutionController@latest_new');
            Route::post('{id}/report', 'SolutionController@store_report')->where('id', '[0-9]+');
        });
        Route::get('/programming-languages', 'ProgrammingLanguageController@index');
    });
});

Route::group(['prefix' => 'transaction'], function () {
    Route::any('callback', 'TransactionController@callback');
});
