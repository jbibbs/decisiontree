<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'SurveyController@getName');
Route::post('name', 'SurveyController@postName');

Route::post('process', 'SurveyController@process');
Route::get('track1', 'SurveyController@track1');
Route::get('track2', 'SurveyController@track2');
Route::get('track3', 'SurveyController@track3');


