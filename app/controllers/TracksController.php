<?php

class TracksController extends BaseController {



// Defines all nodes in the decision tree. Each node contains a unique id
// and a path that defines it's relationship to other nodes in the tree.
// In this case, 1's are yes answers and 2's are no's.
	public static $nodes = array(
		array('id' => 1,  'next' => 2,         'path' => '1'),
		array('id' => 2,  'next' => 2,         'path' => '0'),
		array('id' => 3,  'next' => 3,         'path' => '1.1'),
		array('id' => 4,  'next' => 3,         'path' => '1.0'),
		array('id' => 5,  'next' => 5,         'path' => '0.1'),
		array('id' => 6,  'next' => 'results', 'path' => '0.0'),
		array('id' => 7,  'next' => 5,         'path' => '1.1.1'),
		array('id' => 8,  'next' => 4,         'path' => '1.1.0'),
		array('id' => 9,  'next' => 'results', 'path' => '1.0.1'),
		array('id' => 10, 'next' => 4,         'path' => '1.0.0'),
		array('id' => 11, 'next' => 5,         'path' => '1.1.0.1'),
		array('id' => 12, 'next' => 5,         'path' => '1.1.0.0'),
		array('id' => 13, 'next' => 6,         'path' => '1.0.0.1'),
		array('id' => 14, 'next' => 'results', 'path' => '1.0.0.0'),
		array('id' => 15, 'next' => 'results', 'path' => '1.1.1.1'),
		array('id' => 16, 'next' => 6,         'path' => '1.1.1.0'),
		array('id' => 17, 'next' => 6,         'path' => '1.1.0.1.1'),
		array('id' => 18, 'next' => 6,         'path' => '1.1.0.1.0'),
		array('id' => 19, 'next' => 'results', 'path' => '1.1.0.0.1'),
		array('id' => 20, 'next' => 6,         'path' => '1.1.0.0.0'),
		array('id' => 21, 'next' => 'results', 'path' => '0.1.1'),
		array('id' => 22, 'next' => 'results', 'path' => '0.1.0'),
		array('id' => 23, 'next' => 'results', 'path' => array('1.1.1.0.1', '1.1.0.0.0.1')),
		array('id' => 24, 'next' => 'results', 'path' => array('1.1.1.0.0', '1.1.0.0.0.0')),
		array('id' => 25, 'next' => 7,         'path' => array('1.1.0.1.1.1', '1.0.0.1.1')),
		array('id' => 26, 'next' => 'results', 'path' => array('1.1.0.1.1.0', '1.0.0.1.0')),
		array('id' => 27, 'next' => 7,         'path' => '1.1.0.1.0.1'),
		array('id' => 28, 'next' => 'results', 'path' => array('1.1.0.1.1.1.1', '1.0.0.1.1.1')),
		array('id' => 29, 'next' => 'results', 'path' => array('1.1.0.1.1.1.0', '1.0.0.1.1.0')),
		array('id' => 30, 'next' => 'results', 'path' => '1.1.0.1.0.1.1'),
		array('id' => 31, 'next' => 'results', 'path' => '1.1.0.1.0.1.0'),
	);

	
	/** 
	* Accepts an array; 
	* Determines which track user is on based on submitted answers
	*
	* Compares the track definition array to the submitted answers and returns the key 
	* The array key represents the unique number assigned to each track
	*/
	public static function get_track($answers){
		$current = implode('.', $answers);
		foreach(self::$nodes as $key => $value) {
			if($value['path'] === $current){
				return $value['id'];
			}
			elseif(is_array($value['path'])){
				if(in_array($current, $value['path'], true)){
					return $value['id'];
				}
			}
		}
		return false;
	}
}
	

