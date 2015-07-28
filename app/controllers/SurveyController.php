<?php

class SurveyController extends BaseController {

	/**
	* Questions array
	*
	* These are the main questions asked during the survey
	* The array index maps to the question number presented to the user.
	*/
	public static $questions = array(
		//0 => 'Please enter your name:',
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

	/**
	* Seems redundant since the qustions array can be counted, but there was
	* a possibility we would use a "name" question to collect names. The DB allows for it.
	* There was also a possibility other non-survey related questions would get added.
	* This property fixes that potential problem.
	*/
 	private static $total_questions = 7;


 	/**
 	* Displays the view
 	*
 	*/
	public static function get_question(){
	   /* if('name' === Route::currentRouteName()){
			$id = 0;
			$form = 'forms/form2';
		}*/
		if(Route::input('id')) {
			$id = Route::input('id');
		}
		elseif('home' === Route::currentRouteName()) {
			$id = 1;
		}
		else {
			Log::error('Unable to get question. No question id was located.');
			return Redirect::to('error');
		}
		$form = 'forms/form1';
		$question = self::$questions[$id];
		$restart = route('home');

		return View::make('survey', array('question' => $question, 'restart' => $restart))
			->nest('form', $form, array('url' => "question/$id",));
	}


	/**
	* @id - integer or numeric string
	*
	* Collects the user submissions and stores in the session
	* returns a redirect to the next step in the survey
	*/
	public static function post_question($id){
		// Get the user response or assign to NULL
		$answer = Input::has('answer') ? Input::get('answer') : NULL;

		/*if($id == 0){
			Session::put('name', $answer);
			return Redirect::to('question/1');
		}*/
		if($id > 0 && $id <= self::$total_questions){
			Session::put('answers.' . $id, $answer);
			$answers = Session::get('answers');
			$next = TracksController::get_next($answers);
			return Redirect::to($next);
		}

		Log::error('Unable to process submitted question.  ID of: ' . $id . ' is not valid.');
		return Redirect::to('error');
	}
}
