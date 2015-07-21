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
		$id = Route::input('id');
		$responses = self::clean_results(Session::all());

		//Session::flush();
		return View::make('results', array(
				'heading' =>  'Thank you! Your outcome is provided below',
				'outcome' =>  self::$outcomes[$id],
                'responses' => $responses
               ));
	}

	private function clean_results($results){
		$clean_results = array();
		foreach($results as $key => $value){
			if($key === 'name'){
				$clean_results['name'] = $value;
			}
			elseif($key === 'answers'){
				foreach($value as $k => $v){
					if($v == '1'){
						$v = 'Yes';
					}
					if($v == '0'){
						$v = 'No';
					}
					$clean_results[SurveyController::$questions[$k]] = $v;
				}
			}
		}
		
		return $clean_results;
	}




}