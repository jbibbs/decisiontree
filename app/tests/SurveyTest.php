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

}