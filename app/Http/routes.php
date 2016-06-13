<?php

    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It's a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    Route::auth ();

    Route::get('/', 'HomeController@index');
    Route::get ( '/fulltest', 'HomeController@full' );
    Route::get ( '/fulltest/wrong', 'HomeController@fullWrong' );
    Route::get ( '/twentytest/{start}', 'HomeController@twenty' );

    Route::post('/answer/check', 'HomeController@checkAnswer');
    Route::resource ( '/questions', 'QuestionController' );