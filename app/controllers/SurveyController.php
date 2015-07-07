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

	// Need to review this. Somethign wrong with question three in this series:
	// Q1. Y, Q2. Y, Q3. N
	// Q3 gets repeated at this point. I also think it's confusing with each node identified uniquely
	// Unless I'm mistaken you should be able to number the nodes beginning with #1 on each question 
	// instead of a unique id for each node
	public function post_question($id){

		// Get the user response or assign to NULL
		if (Input::has('answer')){
			$answer = Input::get('answer');
		}
		else {
			$answer = 'Not provided';
		}

		if(Session::has('track')){
			$track = Session::get('track');
		}
		else {
			$track = '0';
		}

		switch($id){
			case 'name':
				Session::put('name', $answer);
				return Redirect::to('question/1');
			case '1':
				Session::put('answer1', $answer);
				if($answer === 'yes'){
					Session::put('track', '1');
					return Redirect::to('question/2');
				}
				if($answer === 'no'){
					Session::put('track', '2');
					return Redirect::to('question/2');
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');
				
			case '2':
				Session::put('answer2', $answer);
				if($track === '1'){
					if($answer === 'yes'){
						Session::put('track', '3');
						return Redirect::to('question/3');
					}
					if($answer === 'no'){
						Session::put('track', '4');
						return Redirect::to('question/3');
					}
				}
				if($track === '2'){
					if($answer === 'yes'){
						Session::put('track', '5');
						return Redirect::to('question/5');
					}
					if($answer === 'no'){
						Session::put('track', '6');
						return Redirect::to('results/6');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');

			case '3':
				Session::put('answer3', $answer);
				if($track === '3'){
					if($answer === 'yes'){
						Session::put('track', '7');
						return Redirect::to('question/5');
					}
					if($answer === 'no'){
						Session::put('track', '8');
						return Redirect::to('question/3');
					}
				}
				if($track === '4'){
					if($answer === 'yes'){
						Session::put('track', '9');
						return Redirect::to('results/9');
					}
					if($answer === 'no'){
						Session::put('track', '10');
						return Redirect::to('question/4');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');

			case '4':
				Session::put('answer4', $answer);
				if($track === '8'){
					if($answer === 'yes'){
						Session::put('track', '11');
						return Redirect::to('question/5');
					}
					if($answer === 'no'){
						Session::put('track', '12');
						return Redirect::to('question/5');
					}
				}
				if($track === '10'){
					if($answer === 'yes'){
						Session::put('track', '13');
						return Redirect::to('question/5');
					}
					if($answer === 'no'){
						Session::put('track', '14');
						return Redirect::to('results/14');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');

			case '5':
				Session::put('answer5', $answer);
				if($track === '7'){
					if($answer === 'yes'){
						Session::put('track', '15');
						return Redirect::to('results/15');
					}
					if($answer === 'no'){
						Session::put('track', '16');
						return Redirect::to('question/6');
					}
				}
				if($track === '11'){
					if($answer === 'yes'){
						Session::put('track', '17');
						return Redirect::to('question/6');
					}
					if($answer === 'no'){
						Session::put('track', '18');
						return Redirect::to('question/6');
					}
				}
				if($track === '12'){
					if($answer === 'yes'){
						Session::put('track', '19');
						return Redirect::to('results/19');
					}
					if($answer === 'no'){
						Session::put('track', '20');
						return Redirect::to('question/6');
					}
				}
				if($track === '5'){
					if($answer === 'yes'){
						Session::put('track', '21');
						return Redirect::to('results/21');
					}
					if($answer === 'no'){
						Session::put('track', '22');
						return Redirect::to('results/22');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');

			case '6':
				Session::put('answer6', $answer);
				if($track === '16'){
					if($answer == 'yes'){
						Session::put('track', '23');
						return Redirect::to('results/23');
					}
					if($answer == 'no'){
						Session::put('track', '24');
						return Redirect::to('results/24');
					}
				}
				if($track === '17'){
					if($answer == 'yes'){
						Session::put('track', '25');
						return Redirect::to('question/7');
					}
					if($answer == 'no'){
						Session::put('track', '26');
						return Redirect::to('results/26');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');

			case '7':
				Session::put('answer7', $answer);
				if($track === '25'){
					if($answer == 'yes'){
						Session::put('track', '28');
						return Redirect::to('results/28');
					}
					if($answer == 'no'){
						Session::put('track', '29');
						return Redirect::to('results/29');
					}
				}
				if($track === '27'){
					if($answer == 'yes'){
						Session::put('track', '30');
						return Redirect::to('results/30');
					}
					if($answer == 'no'){
						Session::put('track', '31');
						return Redirect::to('results/31');
					}
				}
				Log::error('Could not identify response for question ' . $id . ' on track ' . $track);
				return Redirect::to('error');
			default:
				Log::error('There was no case to match this combination of question and track. Question: '. $id . ' Track: ' . $track);
				return Redirect::to('error');
		}
         
	}

}	
