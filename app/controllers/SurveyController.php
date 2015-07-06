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



	// Main logic is here. Determines where to go next based on track and question number
	 public function process(){
	 	// Error handler. Do not proceed if you cannot retrieve the question number
		if (Input::has('q')){
			$q = Input::get('q');
		}
		else {
			Log::error('Unable to retrieve referenced (q)uestion');
			return View::make('results', array(
					'heading' => 'We\'re sorry. Something has gone wrong.',
					'results' => 'Unable to identify the question you responded to. Please start the survey over or contact support.'
			));
		}
         
         // Get the user response or assign to NULL
		if (Input::has('answer')){
			$answer = Input::get('answer');
		}
		else {
			$answer = NULL;
		}

		// Get the current track from session or assign a default
		if (Session::has('track')){
			$track = Session::get('track');
		}
		else {
			$track = '1';
		}
         
         // q variable is the string name of the submitted question passed by a hidden field
		switch ($q){
			// Handles the unique first case where user submits their name
			case 'name':
				if(Input::has('name')){
					$name = Input::get('name');
                    Session::put('name', $name);
				    return Redirect::to('question1');
				}
				break;

			// All the "q" cases handle the answer submissions
			case 'q1':
				Session::put('answer1', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q2':
				Session::put('answer2', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q3':
				Session::put('answer3', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q4':
				Session::put('answer4', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q5':
				Session::put('answer5', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q6':
				Session::put('answer6', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
			case 'q7':
				Session::put('answer7', $answer);
				$step = $this->get_next_step($q, $answer, $track);
				return Redirect::to($step);
		}
	}

	// There is a screw up here that needs to be addressed.
	// Somehow I was being presented with question 1, but the system was trying to save
	// the answer as for question 5. Need to button up how questions/answers are being saved in 
	// session to make sure questions answers have an iron tight relationship.
	
	protected function get_next_step($question, $answer, $track){
			switch ($track){   
				case '1':
					if( $question === 'q1'){
						if ($answer === 'yes'){
							Session::put('track', '1');
							return('question2');
						}
						elseif ($answer === 'no'){
							Session::put('track', '2');
							return('question2');
						}
						else {
							Log::error('Answer was not provided or undefined.');
						}
					}
					if( $question === 'q2'){
						if ($answer === 'yes'){
							Session::put('track', '1');
							return('question3');
						}
						elseif ($answer === 'no'){
							Session::put('track', '7');
							return('question3');
						}
						else {
							Log::error('Answer was not provided or undefined.');
						}
					}
					if( $question === 'q3'){
						if ($answer === 'yes'){
							Session::put('track', '1');
							return('question5');
						}
						elseif ($answer === 'no'){
							Session::put('track', '4');
							return('question5');
						}
						else {
							Log::error('Answer was not provided or undefined.');
						}
					}
					if( $question === 'q4'){
							Log::error('Question 4 should not appear as part of track 1');
						}
					}
					if( $question === 'q5'){
						if ($answer === 'yes'){
							return 'results/track/1';
						}
						elseif ($answer === 'no'){
							Log::error('The current track ' . $track . ' does not allow a ' . $answer . 
								' response from question ' . $question);
							return 'error';
						}
						else {
							// Default
						}
					}
			/*
				case 'track2':
				case 'track3':
				case 'track4':
				case 'track5':
				case 'track6':
				case 'track7':
				case 'track8':
				case 'track9':
				case 'track10':
				case 'track11':
				case 'track12':
				case 'track13':
				case 'track14':*/
			}

}	
