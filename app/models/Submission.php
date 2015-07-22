<?php

class Submission extends Eloquent {
	
	/**
	* Expects an array argument
	*
	* Adds survey result data to the database
	*/
	public static function create_submission($response){
		$submission = new Submission;
		foreach($response as $key => $val){
			$submission->$key = $val;
		}

		if($submission->save()){
			return true;
		}

		return false;
	}
}