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
		$id = 31;

		// Use the paper copy of the decision tree to set the path values to a node
		$paperPath = '1.1.0.1.0.1.0';

		$nodes = TracksController::$nodes;
		foreach($nodes as $key => $value){
			if($value['id'] === $id){
				$path = $value['path'];
			}
		}
		// If a node has multiple paths, search that array as well
		if(is_array($path)){
			$key = array_search($paperPath, $path);
			$path = isset($path[$key]) ? $path[$key] : '';
		}

		$this->assertTrue($path === $paperPath);
	}

	public function test_submits_answers_and_verifies_returned_node_id()
	{
		$answers = array(1, 1, 0, 1, 0, 1, 1, 0);
		$expected_id = 30;

		$id = TracksController::get_track($answers);
		$this->assertTrue($expected_id === $id);
	}

}