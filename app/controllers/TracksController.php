<?php

class QuestionsController extends BaseController {

	







		/*
		private $tracks; 
		$tracks[0] = array(
			'1' => 'yes', 
			'2' => 'yes', 
			'3' => 'yes', 
			'4' => 'yes', 
			'5' => 'yes'
		);
		$tracks[1] = array(
			'1' => 'no',
			'2' => 'no'
		);
		$tracks[2] = array(
			'1' => 'yes', 
			'2' => 'no', 
			'3' => 'yes'
		);
		$tracks[3] = array(
			'1' => 'yes',
			'2' => 'no',
			'3' => 'no',
			'4' => 'no'
		);
		$tracks[4] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'no',
			'4' => 'no',
			'5' => 'yes'
		);
		$tracks[5] = array(
			'1' => 'no',
			'2' => 'yes',
			'5' => 'yes'
		);
		$tracks[6] = array(
			'1' => 'no',
			'2' => 'yes',
			'5' => 'no'
		);
		$tracks[7] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'yes',
			'5' => 'no',
			'6' => 'yes'
		);
		$tracks[8] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'yes',
			'5' => 'no',
			'6' => 'no'
		);
		$tracks[9] = array(
			'1' => 'yes',
			'2' => 'no',
			'3' => 'no',
			'4' => 'yes',
			'6' => 'no'
		);
		$tracks[10] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'no',
			'4' => 'yes',
			'5' => 'yes',
			'6' => 'yes',
			'7' => 'yes'
		);
		$tracks[11] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'no',
			'4' => 'yes',
			'5' => 'yes',
			'6' => 'yes',
			'7' => 'no'
		);
		$tracks[12] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'no',
			'4' => 'yes',
			'5' => 'no',
			'6' => 'yes',
			'7' => 'yes'
		);
		$tracks[13] = array(
			'1' => 'yes',
			'2' => 'yes',
			'3' => 'no',
			'4' => 'yes',
			'5' => 'yes',
			'6' => 'yes',
			'7' => 'no'
		);*/

	
	/** 
	* Accepts an array; 
	* Determines which track user is on based on submitted answers
	*
	* Compares the track definition array to the submitted answers and returns the key 
	* The array key represents the unique number assigned to each track
	*/
	public static function get_track($answers){
		foreach($tracks as $key => $track){
			if($track === $answers){
				return $key;
			}
		}
		return false;
	}

	private static function get_next_step($track)
	
}

