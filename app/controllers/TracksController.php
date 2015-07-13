<?php

class TracksController extends BaseController {


// Array using parent/child relationship

	public static $node;
	$node = array('id' => 1, 'prev' = 0, 'next' => 2, 'path' => '1'));
	$node = array('id' => 2, 'prev' = 0, 'next' => 2, 'path' => '2'));
	$node = array('id' => 3, 'prev' = 1, 'next' => 3, 'path' => '1.1'));
	$node = array('id' => 4, 'prev' = 1, 'next' => 3, 'path' => '1.2'));
	$node = array('id' => 5, 'prev' = 1, 'next' => 5, 'path' => '2.1'));
	$node = array('id' => 6, 'prev' = 1, 'next' => 'results', 'path' => '2.2'));
	$node = array('id' => 7, 'prev' = 2, 'next' => 5, 'path' => '1.1.1'));
	$node = array('id' => 8, 'prev' = 2, 'next' => 4, 'path' => '1.1.2'));
	$node = array('id' => 9, 'prev' = 2, 'next' => 'results', 'path' => '1.2.1'));
	$node = array('id' => 10, 'prev' = 2, 'next' => 4, 'path' => '1.2.2');
	$node = array('id' => 11, 'prev' = 3, 'next' => 5, 'path' => '1.1.2.1');
	$node = array('id' => 12, 'prev' = 3, 'next' => 5, 'path' => '1.1.2.2');
	$node = array('id' => 13, 'prev' = 3, 'next' => 6, 'path' => '1.2.2.1');
	$node = array('id' => 14, 'prev' = 3, 'next' => 'results', 'path' => '1.2.2.2');
	$node = array('id' => 15, 'prev' = 3, 'next' => 'results', 'path' => '1.1.1.1');
	$node = array('id' => 16, 'prev' = 3, 'next' => 6, 'path' => '1.1.1.2');
	$node = array('id' => 17, 'prev' = 4, 'next' => 6, 'path' => '1.1.2.1.1');
	$node = array('id' => 18, 'prev' = 4, 'next' => 6, 'path' => '1.1.2.1.2');
	$node = array('id' => 19, 'prev' = 4, 'next' => 'results', 'path' => '1.1.2.2.1');
	$node = array('id' => 20, 'prev' = 4, 'next' => 6, 'path' => '1.1.2.2.2');
	$node = array('id' => 21, 'prev' = 2, 'next' => 'results', 'path' => '2.1.1');
	$node = array('id' => 22, 'prev' = 2, 'next' => 'results', 'path' => '2.1.2');
	$node = array('id' => 23, 'prev' = 5, 'next' => 'results', 'path' => '1.1.1.2.1');
	$node = array('id' => 24, 'prev' = 5, 'next' => 'results', 'path' => '1.1.1.2.2');
	$node = array('id' => 25, 'prev' = 5, 'next' => 7, 'path' => '1.1.2.1.1.1');
	$node = array('id' => 26, 'prev' = 5, 'next' => 'results', 'path' => '1.1.2.1.1.2');
	$node = array('id' => 27, 'prev' = 5, 'next' => 7, 'path' => '1.1.2.1.1.2');
	$node = array('id' => 28, 'prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.1');
	$node = array('id' => 29, 'prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.2');
	$node = array('id' => 30, 'prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.1');
	$node = array('id' => 31, 'prev' = 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.2');


	Log::info(print_r($node));

	
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

