<?php

class TracksController extends BaseController {



// Defines all nodes in the decision tree. Each node contains a unique id
// and a path that defines it's relationship to other nodes in the tree.
// In this case, 1's are yes answers and 2's are no's.
	public static $nodes = array(
		array('id' => 1,  'next' => 2),
		array('id' => 2,  'next' => 2),
		array('id' => 3,  'next' => 3),
		array('id' => 4,  'next' => 3),
		array('id' => 5,  'next' => 5),
		array('id' => 6,  'next' => 'results'),
		array('id' => 7,  'next' => 5),
		array('id' => 8,  'next' => 4),
		array('id' => 9,  'next' => 'results'),
		array('id' => 10, 'next' => 4),
		array('id' => 11, 'next' => 5),
		array('id' => 12, 'next' => 5),
		array('id' => 13, 'next' => 6),
		array('id' => 14, 'next' => 'results'),
		array('id' => 15, 'next' => 'results'),
		array('id' => 16, 'next' => 6),
		array('id' => 17, 'next' => 6),
		array('id' => 18, 'next' => 6),
		array('id' => 19, 'next' => 'results'),
		array('id' => 20, 'next' => 6),
		array('id' => 21, 'next' => 'results'),
		array('id' => 22, 'next' => 'results'),
		array('id' => 23, 'next' => 'results'),
		array('id' => 24, 'next' => 'results'),
		array('id' => 25, 'next' => 7),
		array('id' => 26, 'next' => 'results'),
		array('id' => 27, 'next' => 7),
		array('id' => 28, 'next' => 'results'),
		array('id' => 29, 'next' => 'results'),
		array('id' => 30, 'next' => 'results'),
		array('id' => 31, 'next' => 'results'),
	);


	public static $paths = array(
		array('node_id' => 1,  'q1' => 'yes'),
		array('node_id' => 2,  'q1' => 'no'),
		array('node_id' => 3,  'q1' => 'yes', 'q2' => 'yes'),
		array('node_id' => 4,  'q1' => 'yes', 'q2' => 'no'),
		array('node_id' => 5,  'q1' => 'no',  'q2' => 'yes'),
		array('node_id' => 6,  'q1' => 'no',  'q2' => 'no'),
		array('node_id' => 7,  'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes'),
		array('node_id' => 8,  'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no'),
		array('node_id' => 9,  'q1' => 'yes', 'q2' => 'no',  'q3' => 'yes'),
		array('node_id' => 10, 'q1' => 'yes', 'q2' => 'no',  'q3' => 'no'),
		array('node_id' => 11, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes'),
		array('node_id' => 12, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'no'),
		array('node_id' => 13, 'q1' => 'yes', 'q2' => 'no',  'q3' => 'no',  'q4' => 'yes'),
		array('node_id' => 14, 'q1' => 'yes', 'q2' => 'no',  'q3' => 'no',  'q4' => 'no'),
		array('node_id' => 15, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes', 'q5' => 'yes'),
		array('node_id' => 16, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes', 'q5' => 'no'),
		array('node_id' => 17, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'yes'),
		array('node_id' => 18, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'no'),
		array('node_id' => 19, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'no',  'q5' => 'yes'),
		array('node_id' => 20, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'no',  'q5' => 'no'),
		array('node_id' => 21, 'q1' => 'no',  'q2' => 'yes', 'q5' => 'yes'),
		array('node_id' => 22, 'q1' => 'no',  'q2' => 'yes', 'q5' => 'no'),
		array('node_id' => 23, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes', 'q5' => 'no',  'q6' => 'yes'),
		array('node_id' => 23, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'no',  'q5' => 'no',  'q6' => 'yes'),
		array('node_id' => 24, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'yes', 'q5' => 'no',  'q6' => 'no'),
		array('node_id' => 24, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'no',  'q6' => 'no'),
		array('node_id' => 25, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'yes', 'q6' => 'yes'),
		array('node_id' => 25, 'q1' => 'yes', 'q2' => 'no',  'q3' => 'no',  'q4' => 'yes', 'q6' => 'yes'),
		array('node_id' => 26, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'yes', 'q6' => 'no'),
		array('node_id' => 26, 'q1' => 'yes', 'q2' => 'no', ' q3' => 'no',  'q4' => 'yes', 'q6' => 'no'),
		array('node_id' => 27, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'no',  'q6' => 'yes'),
		array('node_id' => 28, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'yes', 'q6' => 'yes', 'q7' => 'yes'),
		array('node_id' => 28, 'q1' => 'yes', 'q2' => 'no', ' q3' => 'no',  'q4' => 'yes', 'q6' => 'yes', 'q7' => 'yes'),
		array('node_id' => 29, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'yes', 'q6' => 'yes', 'q7' => 'no'),
		array('node_id' => 29, 'q1' => 'yes', 'q2' => 'no', ' q3' => 'no',  'q4' => 'yes', 'q6' => 'yes', 'q7' => 'no'),
		array('node_id' => 30, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'no',  'q6' => 'yes', 'q7' => 'yes'),
		array('node_id' => 30, 'q1' => 'yes', 'q2' => 'yes', 'q3' => 'no',  'q4' => 'yes', 'q5' => 'no',  'q6' => 'yes', 'q7' => 'no')
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

