<?php

class Submission extends Eloquent {
	
	/**
	* @response - array
	*
	* Inserts the user submissions into the database
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