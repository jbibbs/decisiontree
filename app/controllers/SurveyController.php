<?php

class SurveyController extends BaseController {

	public static $questions = array(
			0 => 'Please enter your name:',
			1 => 'Is high quality important here or is a good solution absolutely critical? 
				     (is this a case where it would not be acceptable having lots of equal alternatives?)',
		    2 => 'Is team commitment important to the decision?',
		    3 => 'Do you have enough information of your own to make a good decision?',
		    4 => 'Is the problem structured in such a way that it is clearly defined & organized 
				     with potential solutions identified?',
			5 => 'If you make this decision yourself, are you sure the group will accept and support it?',
			6 => 'Does the team have the same organizational goals?',
			7 => 'Is conflict amongst the team over the decision likely?',
		);

 	private static $total_questions = 7;

	public static function get_question(){
	    if('name' === Route::currentRouteName()){
			$id = 0;
			$form = 'form2';
		}
		elseif(Route::input('id')) {
			$id = Route::input('id');
			$form = 'form1';
		}
		else{
			Log::error('Unable to get question. No question id was located.');
			return Redirect::to('error');
		}

		$question = self::$questions[$id];
		$restart = route('name');
		return View::make('templates/survey')->nest('form', $form, 
			array(
				'question' 	=> $question,
				'url' 		=> "question/$id",
				'restart'   => $restart,
			));
	}

	// Handles the survey submissions
	public static function post_question($id){
		// Get the user response or assign to NULL
		$answer = Input::has('answer') ? Input::get('answer') : NULL;

		if($id == 0){
			Session::put('name', $answer);
			return Redirect::to('question/1');
		}
		if($id > 0 && $id <= self::$total_questions){
			Session::put('answers.' . $id, $answer);
			$answers = self::flatten();
			$next = TracksController::get_next($answers);
			return Redirect::to($next);
		}

		Log::error('Unable to process submitted question.  ID of: ' . $id . ' is not valid.');
		return Redirect::to('error');
	}


	public static function flatten(){
		$answers = Session::get('answers');
		foreach($answers as $answer){
			$flat_array[] = $answer;
		}
		return $flat_array;
	}

}	
