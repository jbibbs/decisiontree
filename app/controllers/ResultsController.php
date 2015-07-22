<?php

class ResultsController extends BaseController {


	public static $outcomes = array(
			'a1' 		=> 'Autocratic 1 (A1) - You, the decision maker, use the information available to make the decision yourself.',
			'a2'		=> 'Autocratic 2 (A2) - You request information from members of your team. They may or may not know why 
						you want such information. They neither define the situation, alternatives or final choice.',
			'c1' 		=> 'Consultative 1 (C1) - You explain the situation to the individual members of the group but they do not
						get together as a group. You make the final decision.',
			'c2' 		=> 'Consultative 2 (C2) - There is group discussion where you explain the situation and gather ideas and
						suggestions. Again, you\'re responsible for the final decision making.',
			'g2' 		=> 'Group 2 (G2) - The group as a whole make the decision. You as the leader present the situation and the
						group defines alternatives and reaches a consensus decision. The leader acts more as a facilitator in this
						process and allows the group to agree on the final choice.',
	);


	public function get_results(){
		if(!$id = Route::input('id')){
			Log::error('Unable to display results. Route ID not found.');
	    	return Redirect::to('error');
		}
		if(!$answers = Session::get('answers')){
			Log::error('Unable to display results. Unable to retreive answers from session.');
	    	return Redirect::to('error');
		}
		if(!$restart = route('home')){
			Log::error('Unable to assign the restart button to a route.');
	    	return Redirect::to('error');
		}
		
		$responses = self::clean_results($answers);
		$submission = self::prepare_submission($id, $answers);
		if(Submission::create_submission($submission)){

			return View::make('results', array(
					'heading' =>  'Thank you! Your outcome is provided below',
					'outcome' =>  self::$outcomes[$id],
	                'responses' => $responses,
	                'restart' => $restart,
	        ));
	    }

	    Log::error('Unable to create submission. Database insertion failed');
	    return Redirect::to('error');
	}

	private function clean_results($results){
		$clean_results = array();
			foreach($results as $k => $v){
				if($v == '1'){
					$v = 'Yes';
				}
				if($v == '0'){
					$v = 'No';
				}
				$clean_results[SurveyController::$questions[$k]] = $v;
			}
		
		return $clean_results;
	}

	private function prepare_submission($id, $responses){
		$submission['outcome'] = self::$outcomes[$id];

		foreach($responses as $question => $answer){
			$submission['answer' . $question] = $answer;
		}

		return $submission;
	}



}