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

Route::get('/', function () {
    return view('welcome');
});

/** round 2 questions route */

Route::get('/sortUsingFactoryPattern', 'SortController@index');
Route::post('/getResultForStudent', 'SortController@getResultForStudent');
Route::get('/student', 'StudentController@index');
Route::get('/subject', 'SubjectController@index');
Route::post('/addSubject', 'SubjectController@store');
Route::get('/fibonacci', 'FibonacciController@index');
Route::get('/getFibonacciSeries', 'FibonacciController@showFibonacciSeries');

