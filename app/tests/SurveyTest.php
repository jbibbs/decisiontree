<?php

class SurveyTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_verifies_paths_are_correct()
	{	
		$path = NULL;
		// Set the ID to the specific node you want to test
		$id = 25;
		// Set the path to a string representation of the node location on the decision tree
		// paper copy
		$paperPath = '1.1.2.2.2';

		$nodes = TracksController::$nodes;
		foreach($nodes as $key => $value){
			if($value['id'] === $id){
				$path = $value['path'];
			}
		}

		$this->assertTrue($path === $paperPath);
	}

}