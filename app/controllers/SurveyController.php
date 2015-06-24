<?php

class SurveyController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	public function getName(){

		return View::make('survey')->nest('form', 'form2', array(
			'question' 	=> parent::$questions['name'], 
			'url' 		=> 'name'
		));
	}

	public function postName(){
		if (Input::has('name')){
			$name = Input::get('name');
		}
		else {
			$name = 'Anonymous';
		}
		Session::put('name', $name);
		return Redirect::to('track1');
	}

	public function process(){
		$q = Input::get('q');
		$track = Input::get('track');
		$answer = Input::get('answer');

		switch ($track){
			case '1':
				if($answer === 'yes'){

				}
				elseif($answer === 'no'){

				}
				else {

				}
			case '2':
				if($answer === 'yes'){

				}
				elseif($answer === 'no'){

				}
				else {
					
				}
			case '3':
				if($answer === 'yes'){

				}
				elseif($answer === 'no'){

				}
				else {
					
				}
			case '4':
			case '5':
			case '6':
			case '7':
			case '8':
			case '9':
			case '10':
			case '11':
			case '12':
			case '13':
			case '14':
		}

		Session::put('q', $q);
		Session::put('track', $track);
		return View::make('summary', array('summary' => 'Hella nice job!'));
	}

	
	// All yeses
	public function track1(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> parent::$questions['q1'],
				'q' 		=> 'q1',
				'url' 		=> 'process',
				'track' 	=> '1' 
			));
	}

	// All nos
	public function track2(){
		return View::make('survey', array('question' => parent::$questions['q2']));
	}

	public function track3(){
		return View::make('survey', array('question' => parent::$questions['q3']));
	}

}