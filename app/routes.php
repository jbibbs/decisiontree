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

Route::get('question/{id}', "SurveyController@get_question_$id");
Route::post('question/{id}', "SurveyController@post_question_$id");

Route::get('results/{id}', array('as' => 'results', 'uses' => 'ResultsController@get_results'));


Route::get('error', function(){
	return View::make('error');
});

