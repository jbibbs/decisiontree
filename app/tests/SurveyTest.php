<?php

class SurveyTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_verifies_paths_are_correct()
	{

		$this->assertTrue(is_array(TracksController::$node));
	}

}