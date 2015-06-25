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

Route::get('question1', 'SurveyController@getQ1');
Route::get('question2', 'SurveyController@getQ2');
Route::get('question3', 'SurveyController@getQ3');
Route::get('question4', 'SurveyController@getQ4');
Route::get('question5', 'SurveyController@getQ5');
Route::get('question6', 'SurveyController@getQ6');
Route::get('question7', 'SurveyController@getQ7');
Route::get('results', array('as' => 'results', 'uses' => 'SurveyController@getResults'));

Route::post('process', 'SurveyController@process');
Route::get('track1', 'SurveyController@track1');
Route::get('track2', 'SurveyController@track2');
Route::get('track3', 'SurveyController@track3');


