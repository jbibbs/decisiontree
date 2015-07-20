<?php

class TracksController extends BaseController {



// Defines all nodes in the decision tree. Each node contains a unique id
// and a path that defines it's relationship to other nodes in the tree.
// In this case, 1's are yes answers and 2's are no's.
	public static $nodes = array(
		array('id' => 1, 'prev' => 0, 'next' => 2),
		array('id' => 2, 'prev' => 0, 'next' => 2),
		array('id' => 3, 'prev' => 1, 'next' => 3),
		array('id' => 4, 'prev' => 1, 'next' => 3),
		array('id' => 5, 'prev' => 1, 'next' => 5),
		array('id' => 6, 'prev' => 1, 'next' => 'results'),
		array('id' => 7, 'prev' => 2, 'next' => 5, 'path' => '1.1.1'),
		array('id' => 8, 'prev' => 2, 'next' => 4, 'path' => '1.1.2'),
		array('id' => 9, 'prev' => 2, 'next' => 'results', 'path' => '1.2.1'),
		array('id' => 10, 'prev' => 2, 'next' => 4, 'path' => '1.2.2'),
		array('id' => 11, 'prev' => 3, 'next' => 5, 'path' => '1.1.2.1'),
		array('id' => 12, 'prev' => 3, 'next' => 5, 'path' => '1.1.2.2'),
		array('id' => 13, 'prev' => 3, 'next' => 6, 'path' => '1.2.2.1'),
		array('id' => 14, 'prev' => 3, 'next' => 'results', 'path' => '1.2.2.2'),
		array('id' => 15, 'prev' => 3, 'next' => 'results', 'path' => '1.1.1.1'),
		array('id' => 16, 'prev' => 3, 'next' => 6, 'path' => '1.1.1.2'),
		array('id' => 17, 'prev' => 4, 'next' => 6, 'path' => '1.1.2.1.1'),
		array('id' => 18, 'prev' => 4, 'next' => 6, 'path' => '1.1.2.1.2'),
		array('id' => 19, 'prev' => 4, 'next' => 'results', 'path' => '1.1.2.2.1'),
		array('id' => 20, 'prev' => 4, 'next' => 6, 'path' => '1.1.2.2.2'),
		array('id' => 21, 'prev' => 2, 'next' => 'results', 'path' => '2.1.1'),
		array('id' => 22, 'prev' => 2, 'next' => 'results', 'path' => '2.1.2'),
		array('id' => 23, 'prev' => 5, 'next' => 'results', 'path' => '1.1.1.2.1'),
		array('id' => 24, 'prev' => 5, 'next' => 'results', 'path' => '1.1.1.2.2'),
		array('id' => 25, 'prev' => 5, 'next' => 7, 'path' => '1.1.2.1.1.1'),
		array('id' => 26, 'prev' => 5, 'next' => 'results', 'path' => '1.1.2.1.1.2'),
		array('id' => 27, 'prev' => 5, 'next' => 7, 'path' => '1.1.2.1.1.2'),
		array('id' => 28, 'prev' => 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.1'),
		array('id' => 29, 'prev' => 6, 'next' => 'results', 'path' => '1.1.2.1.1.1.2'),
		array('id' => 30, 'prev' => 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.1'),
		array('id' => 31, 'prev' => 6, 'next' => 'results', 'path' => '1.1.2.1.2.1.2'),
	);


	public static $paths = array(
		array('node_id' => 1, 'q1' => 'yes'),
		array('node_id' => 2, 'q1' => 'no'),
		array('node_id' => 3, 'q1' => 'yes', 'q2' => 'yes'),
		array('node_id' => 4, 'q1' => 'yes', 'q2' => 'no'),
		array('node_id' => 5, 'q1' => 'no', 'q2' => 'yes'),
		array('node_id' => 6, 'q1' => 'no', 'q2' => 'no'),
		array('node_id' => 7, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes'),
		array('node_id' => 8, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no'),
	);

	
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
}

