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

	public static $outcomes = array(
		'a1' => 'Autocratic 1 (A1) - You, the decision maker, use the information available to make the decision yourself.'
		'a2' => 'Autocratic 2 (A2) - You request information from members of your team. They may or may not know why 
					you want such information. They neither define the situation, alternatives or final choice.'
		'c1' => 'Consultative 1 (C1) - You explain the situation to the individual members of the group but they do not
					get together as a group. You make the final decision.'
		'c2' => 'Consultative 2 (C2) - There is group discussion where you explain the situation and gather ideas and
					suggestions. Again, you\'re responsible for the final decision making.'
		'g2' => 'Group 2 (G2) - The group as a whole make the decision. You as the leader present the situation and the
					group defines alternatives and reaches a consensus decision. The leader acts more as a facilitator in this
					process and allows the group to agree on the final choice.'

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
			Log::error('Unable to retrieve referenced (q)uestion')
			return View::make('results', array(
					'heading' => 'We\'re sorry. Something has gone wrong.',
					'results' => 'Unable to identify the question you responded to. Please start the survey over or contact support.'
			));
		}

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
				$step = $this->get_next_step($q, $answer, $track);
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

	protected function get_next_step($question, $answer, $track){
			switch ($track){
				case 'track1':
					if( $question === 'q1'){
						if ($answer === 'yes'){
							Session::set('track', 'track1');
							return('question2')
						}
						elseif ($answer === 'no'){
							Session::set('track', 'track2');
							return('question2');
						}
						else {
							Log::error('Answer was not provided or undefined.');
						}
					}
					if( $question === 'q2'){
						if ($answer === 'yes'){
							Session::set('track', 'track1');
							return('question3');
						}
						elseif ($answer === 'no'){
							Session::set('track', 'track7');
							return('question3');
						}
						else {
							Log::error('Answer was not provided or undefined.');
						}
					}
					if( $question === 'q3'){
						if ($answer === 'yes'){
							Session::set('track', 'track1');
							return('question5');
						}
						elseif ($answer === 'no'){
							Session::set('track', 'track4');
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
							return Redirect::route('results', array(
								'heading' => 'Thank you. Here are your results:', 
								'results' => $this->outcomes['a2']
							));
						}
						elseif ($answer === 'no'){
							// Do something else
						}
						else {
							// Default
						}
					}
					if( $question === 'q6'){
						if ($answer === 'yes'){
							// Do something
						}
						elseif ($answer === 'no'){
							// Do something else
						}
						else {
							// Default
						}
					}
					if( $question === 'q7'){
						if ($answer === 'yes'){
							// Do something
						}
						elseif ($answer === 'no'){
							// Do something else
						}
						else {
							// Default
						}
					}
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
				case 'track14':



















			}
	}
}