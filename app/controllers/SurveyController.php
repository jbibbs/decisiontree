<?php

class SurveyController extends BaseController {

	/**
	* Questions array
	*
	* These are the main questions asked during the survey
	* The array index maps to the question number presented to the user.
	*/

	//NEW
	public static $questions = array(
		1 => 'Is the technical quality of the decision very important? Meaning, are the consequences of failure significant?',
	    2 => 'Does a successful outcome depend on your team members\' commitment to the decision? (Must there be buy-in for the solution to work?)',
	    3 => 'Do you have sufficient information to be able to make the decision on your own?',
	    4 => 'Is the problem well-structured so that you can easily understand what needs to be addressed and what defines a good solution?',
		5 => 'Are you reasonably sure that your team will accept your decision even if you make it yourself?',
		6 => 'Are the goals of the team consistent with the goals the organization has set to define a successful solution?',
		7 => 'Will there likely be conflict among the team as to which solution is best?',
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
