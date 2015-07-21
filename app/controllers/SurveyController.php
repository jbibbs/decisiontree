<?php

class SurveyController extends BaseController {

	// Question List
	public static $questions = array(
		'name'	=> "Please enter your name:",
		'1' 	=> "Is high quality important here or is a good solution absolutely critical? 
						(is this a case where it would not be acceptable having lots of equal alternatives?)",
		'2'		=> "Is team commitment important to the decision?",
		'3'		=> "Do you have enough information of your own to make a good decision?",
		'4'		=> "Is the problem structured in such a way that it is clearly defined & organized with potential 
								solutions identified?",
		'5'		=> "If you make this decision yourself, are you sure the group will accept and support it?",
		'6'		=> "Does the team have the same organizational goals?",
		'7'		=> "Is conflict amongst the team over the decision likely?"
	);


	public function getName(){
		Session::flush();
		return View::make('survey')->nest('form', 'form2', 
			array(
				'question' 	=> self::$questions['name'], 
				'q'			=> 'name',
				'url' 		=> 'question/name'
		));
	}

	public function get_question(){
		$q = Route::input('id');
		return View::make('survey')->nest('form', 'form1', 
			array(
				'question' 	=> self::$questions[$q],
				'q' 		=> $q,
				'url' 		=> "question/$q"
			));
	}

	// Handles the survey submissions
	public function post_question($id){

		// Get the user response or assign to NULL
		$answer = Input::has('answer') ? Input::get('answer') : NULL;

		switch($id){
			case 'name':
				Session::put('name', $answer);
				return Redirect::to('question/1');
			default:
				Session::put('answers.q' . $id, $answer);
				$answers = self::flatten();
				$next = TracksController::get_next($answers);
				return Redirect::to($next);
		}
         
	}

	private function flatten(){
		$answers = Session::get('answers');
		foreach($answers as $answer){
			$flat_array[] = $answer;
		}
		return $flat_array;
	}

}	
