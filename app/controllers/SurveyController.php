<?php

class SurveyController extends BaseController {

	
	// Question List
	public static $questions = array(
		'name'		=> "Please enter your name:",
		'q1' 		=> "Is high quality important here or is a good solution absolutely critical? 
						(is this a case where it would not be acceptable having lots of equal alternatives?)",
		'q2'		=> "Is team commitment important to the decision?",
		'q3'		=> "Do you have enough information of your own to make a good decision?",
		'q4'		=> "Is the problem structured in such a way that it is clearly defined & organized with potential 
								solutions identified?",
		'q5'		=> "If you make this decision yourself, are you sure the group will accept and support it?",
		'q6'		=> "Does the team have the same organizational goals?",
		'q7'		=> "Is conflict amongst the team over the decision likely?"
	);


	public function getName(){

		return View::make('survey')->nest('form', 'form2', array(
			'question' 	=> self::$questions['name'], 
			'q'			=> 'name',
			'url' 		=> 'process'
		));
	}

	public function getQ1(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q1'],
				'q' 		=> 'q1',
				'url' 		=> 'process',
			));
	}
	public function getQ2(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q2'],
				'q' 		=> 'q2',
				'url' 		=> 'process',
			));
	}

	public function getQ3(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q3'],
				'q' 		=> 'q3',
				'url' 		=> 'process',
			));
	}

	public function getQ4(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q4'],
				'q' 		=> 'q4',
				'url' 		=> 'process',
			));
	}

	public function getQ5(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q5'],
				'q' 		=> 'q5',
				'url' 		=> 'process',
			));
	}

	public function getQ6(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q6'],
				'q' 		=> 'q6',
				'url' 		=> 'process',
			));
	}

	public function getQ7(){
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions['q7'],
				'q' 		=> 'q7',
				'url' 		=> 'process',
			));
	}

	public function getResults(){
		return View::make('results', array(
				'heading' =>  'Here are your results:', 
				'results' =>  'No results at this time'
		));
	}



	// Main logic is here. Determines where to go next based on track and question number
	 public function process(){
	 	// Error handler. Do not proceed if you cannot retrieve the question number
		if (Input::has('q')){
			$q = Input::get('q');
		}
		else {
			return View::make('results', array(
					'heading' => 'We\'re sorry. Something has gone wrong.',
					'results' => 'Unable to identify the question you responded to. Please start the survey over or contact support.'
			));
		}

		// Get the current track from session or assign a default
		if (Session::has('track')){
			$track = Session::get('track');
		}
		else {
			$track = 'track0';
		}

		switch ($q){
			// Handles the unique first case where user submits their name
			case 'name':
				if(Input::has('name')){
					$name = Input::get('name');
				}
				else {
					$name = 'anonymous';
				}
				Session::put('name', $name);
				return Redirect::to('question1');

			// All the "q" cases handle the answer submissions
			case 'q1':
				Log::info("The current track is: $track");
				return Redirect::to('question2');
			case 'q2':
				return Redirect::to('question3');
			case 'q3':
				return Redirect::to('question4');
			case 'q4':
				return Redirect::to('question5');
			case 'q5':
				return Redirect::to('question6');
			case 'q6':
				return Redirect::to('question7');
			case 'q7':
				return Redirect::to('results');
		}
	}

}