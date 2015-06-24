<?php

class BaseController extends Controller {


	
	public static $questions = array(
		'name'	=> "Please enter your name:",
		'q1' 	=> "Is high quality important here or is a good solution absolutely critical? 
						(is this a case where it would not be acceptable having lots of equal alternatives?)",
		'q2'	=> "Is team commitment important to the decision?",
		'q3'	=> "Do you have enough information of your own to make a good decision?",
		'q4'	=> "Is the problem structured in such a way that it is clearly defined & organized with potential 
								solutions identified?",
		'q5'	=> "If you make this decision yourself, are you sure the group will accept and support it?",
		'q6'	=> "Does the team have the same organizational goals?",
		'q7'	=> "Is conflict amongst the team over the decision likely?"
	);

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
