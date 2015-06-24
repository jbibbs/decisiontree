<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the table that stores the submitted data
		Schema::create('submissions', function($table)
		    {
		        $table->increments('id');
		        $table->string('name')->nullable();
				$table->string('answer1')->nullable();
				$table->string('answer2')->nullable();
				$table->string('answer3')->nullable();
				$table->string('answer4')->nullable();
				$table->string('answer5')->nullable();
				$table->string('answer6')->nullable();
				$table->string('answer7')->nullable();
				$table->string('outcome');
		        $table->timestamps();
		    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Drops the submissions table
		Schema::drop('submissions');
	}

}
