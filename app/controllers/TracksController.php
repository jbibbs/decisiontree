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
	$node = array('id' => 25, array('prev' = 5, 'next' => 7, 'path' => '1.1.2.1.1.1'));
	$node = array('id' => 26, array('prev' = 5, 'next' => 'results', 'path' => '1.1.2.1.1.2'));
	$node = array('id' => 27, array('prev' = 5, 'next' => 7, 'path' => '1.1.2.1.1.2'));
	$node = array('id' => 28, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.1'));
	$node = array('id' => 29, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.2'));
	$node = array('id' => 30, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.1'));
	$node = array('id' => 31, array('prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.2'));




	
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

