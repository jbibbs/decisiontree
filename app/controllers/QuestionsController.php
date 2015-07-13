<?php

class QuestionsController extends BaseController {

	public static function post_question_1(){
		$answer = Input::get('answer');
		switch($answer){
			case 'yes':
				$track = 1;
				break;
			case 'no':
				$track = 2;
				break;
			default:
				Log::error('Could not identify response [' . $answer . '] for question 1 on track ' . $track);
				return::Redirect::to('error');
		}

		Session::put('q1.answer', $answer);
		Session::put('q1.track', $track);
		return Redirect::to('question/2');
	}

	public static function post_question_2(){
		$answer = Input::get('answer');
		$track = Session::get('q1.track');
		switch($answer){
			case 'yes':
				if($track === 1){
					$track = 3;
					$next = 'question/3';
					break;
				}
				if($track === 2){
					$track = 5;
					$next = 'question/5';
					break;
				}

			case 'no':
				if($track === 1){
					$track = 4;
					$next = 'question/3';
					break;
				}
				if($track === 2){
					$track = 6;
					$next = 'results/a1';
					break;
				}
			default: 
				Log::error('Could not identify response [' . $answer . '] for question 2 on track ' . $track);
				return::Redirect::to('error');
		}
	
		Session::put('q2.answer', $answer);
		Session::put('q2.track', $track);
		return Redirect::to($next);
	}

	public static function post_question_3(){
	    $answer = Input::get('answer');
	    $track = Session::get('q2.track');
	    switch($answer){
	    	case 'yes':
	    		if($track === 1){
	    			$next = 'question/5';
	    			break;
	    		}
    			if($track === 2){
    				$track = 3;
    				$next = 'results/a1';
    				break;
    			}

	    	case 'no':
	    		if($track === 1){
	    			$track = 2;
	    			$next = 'question/4';
	    			break;
	    		}
	    		if($track === 2){
	    			$track = 4;
	    			$next = 'question/4';
	    			break;
	    		}
	    	default:
    			Log::error('Could not identify response [' . $answer . '] for question 3 on track ' . $track);
				return::Redirect::to('error');

	    }
	    Session::put('q3.answer', $answer);
		Session::put('q3.track', $track);
		return Redirect::to($next);

	}

	public static function post_question_4(){
		$answer = Input::get('answer');
	    $track = Session::get('q3.track');
	    switch($answer){
	    	case 'yes':
	    		if($track === 2){
	    			$track = 1;
	    			$next = 'question/5';
	    			break;
	    		}
    			if($track === 4){
    				$track = 3;
    				$next = 'question/6';
    				break;
    			}

	    	case 'no':
	    		if($track === 2){
	    			$next = 'question/5';
	    			break;
	    		}
	    		if($track === 4){
	    			$next = 'results/c2';
	    			break;
	    		}
	    	default:
    			Log::error('Could not identify response [' . $answer . '] for question 4 on track ' . $track);
				return::Redirect::to('error');

	    }
	    Session::put('q4.answer', $answer);
		Session::put('q4.track', $track);
		return Redirect::to($next);

	}

	public static function post_question_5(){
		$answer = Input::get('answer');
	    $track = Session::get('q4.track');
	    switch($answer){
	    	case 'yes':
	    		if($track === 1){
	    			$next = 'results/a2';
	    			break;
	    		}
    			if($track === 4){
    				$track = 3;
    				$next = 'question/6';
    				break;
    			}

	    	case 'no':
	    		if($track === 2){
	    			$next = 'question/5';
	    			break;
	    		}
	    		if($track === 4){
	    			$next = 'results/c2';
	    			break;
	    		}
	    	default:
    			Log::error('Could not identify response [' . $answer . '] for question 5 on track ' . $track);
				return::Redirect::to('error');

	    }
	    Session::put('q5.answer', $answer);
		Session::put('q5.track', $track);
		return Redirect::to($next);

	}

	public static function post_question_6(){


	}

	public static function post_question_7(){


	}

}