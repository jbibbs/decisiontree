<?php

class TracksController extends BaseController {


// Array using parent/child relationship

	$node = array('id' => 1, array('prev' = 0, 'next' => 2, 'path' => '1'));
	$node = array('id' => 2, array('prev' = 0, 'next' => 2, 'path' => '2'));
	$node = array('id' => 3, array('prev' = 1, 'next' => 3, 'path' => '1.1'));
	$node = array('id' => 4, array('prev' = 1, 'next' => 3, 'path' => '1.2'));
	$node = array('id' => 5, array('prev' = 1, 'next' => 5, 'path' => '2.1'));
	$node = array('id' => 6, array('prev' = 1, 'next' => 'results', 'path' => '2.2'));
	$node = array('id' => 7, array('prev' = 2, 'next' => 5, 'path' => '1.1.1'));
	$node = array('id' => 8, array('prev' = 2, 'next' => 4, 'path' => '1.1.2'));
	$node = array('id' => 9, array('prev' = 2, 'next' => 'results', 'path' => '1.2.1'));
	$node = array('id' => 10, array('prev' = 2, 'next' => 4, 'path' => '1.2.2'));
	$node = array('id' => 11, array('prev' = 3, 'next' => 5, 'path' => '1.1.2.1'));
	$node = array('id' => 12, array('prev' = 3, 'next' => 5, 'path' => '1.1.2.2'));
	$node = array('id' => 13, array('prev' = 3, 'next' => 6, 'path' => '1.2.2.1'));
	$node = array('id' => 14, array('prev' = 3, 'next' => 'results', 'path' => '1.2.2.2'));
	$node = array('id' => 15, array('prev' = 3, 'next' => 'results', 'path' => '1.1.1.1'));
	$node = array('id' => 16, array('prev' = 3, 'next' => 6, 'path' => '1.1.1.2'));
	$node = array('id' => 17, array('prev' = 4, 'next' => 6, 'path' => '1.1.2.1.1'));
	$node = array('id' => 18, array('prev' = 4, 'next' => 6, 'path' => '1.1.2.1.2'));
	$node = array('id' => 19, array('prev' = 4, 'next' => 'results', 'path' => '1.1.2.2.1'));
	$node = array('id' => 20, array('prev' = 4, 'next' => 6, 'path' => '1.1.2.2.2'));
	$node = array('id' => 21, array('prev' = 2, 'next' => 'results', 'path' => '2.1.1'));
	$node = array('id' => 22, array('prev' = 2, 'next' => 'results', 'path' => '2.1.2'));
	$node = array('id' => 23, array('prev' = 5, 'next' => 'results', 'path' => '1.1.1.2.1'));
	$node = array('id' => 24, array('prev' = 5, 'next' => 'results', 'path' => '1.1.1.2.2'));
	$node = array('id' => 25, array('prev' = 5, 'next' => '7', 'path' => '1.1.2.1.1.1'));
	$node = array('id' => 26, array('prev' = 5, 'next' => 'results', 'path' => '1.1.2.1.1.1'));
	$node = array('id' => 27, array('prev' = 5, 'next' => 'results', 'path' => '1.1.2.1.1.2'));
	$node = array('id' => 28, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.1'));
	$node = array('id' => 29, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.2'));
	$node = array('id' => 30, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.1'));
	$node = array('id' => 31, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.2'));











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

