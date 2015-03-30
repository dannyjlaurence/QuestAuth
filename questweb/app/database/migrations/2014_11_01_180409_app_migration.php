<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		//SYSTEM TABLES
		Schema::create('users', function($table)
	    {
	        $table->increments('id');
	        $table->string('username')->unique();
	        $table->string('password');
	        $table->string('phplist_id');
	        $table->boolean('isCAS');

	        $table->string('firstName');
	        $table->string('lastName');
	        $table->string('preferredName');
	        $table->enum('gender',array('m', 'f', 'o'));
	        $table->string('telephone');
	        $table->string('email');

	        $table->string('uid');
	        $table->smallInteger('creditsCompleted');
	        $table->decimal('gpa',3,2);
	        $table->string('notes',3000);

	        $table->timestamps();
	    });

	    Schema::create('known_ids', function($table)
	    {
	    	$table->increments('id');
	        $table->string('uid')->unique();

	        $table->timestamps();
	    });

	    Schema::create('majors', function($table)
	    {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('school');
	        $table->timestamps();
	    });

	    Schema::create('major_user', function($table)
	    {
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('major_id')->unsigned();
			$table->foreign('major_id')->references('id')->on('majors');
	        $table->timestamps();
	    });

	    Schema::create('minors', function($table)
	    {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('school');
	        $table->timestamps();
	    });

	    Schema::create('minor_user', function($table)
	    {
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('minor_id')->unsigned();
			$table->foreign('minor_id')->references('id')->on('minors');
	        $table->timestamps();
	    });

	    Schema::create('honor_programs', function($table)
	    {
	        $table->increments('id');
	        $table->string('name');
	        $table->string('school');
	        $table->timestamps();
	    });

	    Schema::create('honor_program_user', function($table)
	    {
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('honor_program_id')->unsigned();
			$table->foreign('honor_program_id')->references('id')->on('honor_programs');
	        $table->timestamps();
	    });


	    Schema::create('roles', function($table)
	    {
	        $table->increments('id');
	        $table->string('description');
	        $table->timestamps();
	    });

	    Schema::create('role_user', function($table)
	    {
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');
	        $table->timestamps();
	    });

	    //QUEST APPLICATION TABLES
	    Schema::create('applications', function($table)
	    {
	        $table->increments('id');
	        $table->string('name');
	        $table->timestamps();
	    });

	    Schema::create('application_configurations', function($table)
	    {
	        $table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('applications');
	        $table->string('field_name');
	        $table->string('field_value');
	        $table->timestamps();
	    });

	    Schema::create('questions', function($table)
	    {
	        $table->increments('id');
	        $table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('applications');
	        $table->integer('sort_order');
	        $table->string('question_html',3000);
	        $table->enum('question_type', array('free', 'multiple_choice','checkbox','interview'));
	        $table->boolean('visibleToReaders');
	        $table->timestamps();
	    });

	    Schema::create('user_applications', function($table)
	    {
	        $table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('applications');
	        $table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
	        $table->boolean('submitted');
	        $table->boolean('readerSubmitted');
	        $table->timestamps();
	    });

	    Schema::create('answers', function($table)
	    {
	        $table->increments('id');
			$table->integer('question_id')->unsigned();
			$table->foreign('question_id')->references('id')->on('questions');
			$table->integer('user_application_id')->unsigned();
			$table->foreign('user_application_id')->references('id')->on('user_applications');
			$table->longText('answer');
	       	$table->timestamps();
	    });

	    Schema::create('reader_criterias', function($table)
	    {
	        $table->increments('id');
	        $table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('applications');
	        $table->string('name');
	        $table->string('low_description');
	        $table->string('high_description');
	        $table->integer('score_value');
	        $table->timestamps();
	    });

	    Schema::create('scores', function($table)
	    {
	        $table->increments('id');
	        $table->integer('reviewer_id')->unsigned();
			$table->foreign('reviewer_id')->references('id')->on('users');
			$table->integer('reader_criteria_id')->unsigned();
			$table->foreign('reader_criteria_id')->references('id')->on('reader_criterias');
			$table->integer('user_application_id')->unsigned();
			$table->foreign('user_application_id')->references('id')->on('user_applications');
			$table->integer('score');
			$table->longText('comment');
	       	$table->timestamps();
	    });

	    Schema::create('reader_assignments', function($table)
	    {
	        $table->increments('id');
	        $table->integer('reviewer_id')->unsigned();
			$table->foreign('reviewer_id')->references('id')->on('users');
			$table->integer('user_application_id')->unsigned();
			$table->foreign('user_application_id')->references('id')->on('user_applications');
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
		Schema::drop('reader_assignments');
		Schema::drop('scores');
		Schema::drop('reader_criterias');
		Schema::drop('answers');
		Schema::drop('user_applications');
		Schema::drop('questions');
		Schema::drop('application_configurations');
		Schema::drop('applications');
		Schema::drop('role_user');
		Schema::drop('roles');
		Schema::drop('honor_program_user');
		Schema::drop('honor_programs');
		Schema::drop('minor_user');
		Schema::drop('minors');
		Schema::drop('major_user');
		Schema::drop('majors');
		Schema::drop('known_ids');
		Schema::drop('users');
	}

}
