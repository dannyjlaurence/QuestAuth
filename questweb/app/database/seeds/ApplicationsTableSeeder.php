<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ApplicationsTableSeeder extends Seeder {

	public static $app;

	public function run()
	{
		DB::table('user_applications')->delete();
		DB::table('reader_criterias')->delete();
		DB::table('questions')->delete();
		DB::table('application_configurations')->delete();
		DB::table('applications')->delete();
		$faker = Faker::create();

		$app = Application::create([
            "name" => "Application 2015"
		]);

		$this->createValue($app,ApplicationConfiguration::$APP_START_DATE,"2014-11-03 00:00:00");
		$this->createValue($app,ApplicationConfiguration::$APP_DUE_DATE,"2014-12-25 00:00:00");
		$this->createValue($app,ApplicationConfiguration::$READ_START_DATE,$faker->dateTimeThisYear($max = 'now'));
		$this->createValue($app,ApplicationConfiguration::$READ_DUE_DATE,$faker->dateTimeThisYear($max = 'now'));
		$this->createValue($app,ApplicationConfiguration::$INTERVIEW_START_DATE,$faker->dateTimeThisYear($max = 'now'));
		$this->createValue($app,ApplicationConfiguration::$INTERVIEW_DUE_DATE,$faker->dateTimeThisYear($max = 'now'));

		$this->createQuestion($app,1,true,"How would you describe the QUEST program? Why do you feel you would be a good fit for the program?");
		$this->createQuestion($app,2,true,"Please read the following scenario and describe how you would address the team’s conflict. Imagine that you are working on a team of five students in the QUEST introductory course, Introduction to Quality and Design (BMGT/ENES 190H). Your team is working on an innovation challenge in which you must create a software product. Gus, a computer science student, refuses to do the coding portion of the project since he “does this stuff all the time”. No other team members have experience writing code. How would you proceed? In your answer, please discuss role identification/delegation as well as conflict resolution.");
		$this->createQuestion($app,3,true,"Imagine that you have just completed a project in the QUEST introductory course, 190H. You are asked to work together as a team to complete a peer evaluation form. One of your teammates (who also happens to be a close friend) has not contributed much to the group. How would you evaluate this teammate when completing the form with your group? Explain your rationale.");
		$this->createQuestion($app,4,true,"Imagine that you are in the creation phase of a 190H project in which your team must design an “app.” Your team has surveyed students about their interests and free time. Results are below. Use this data to identify a possible innovation (e.g. a new application or “app”). Describe the significance of this innovation and identify its market. Please discuss (1) the steps that you would take in creating this innovation and (2) your plan to minimize risk. <table class='table table-striped table-bordered'><tr><th>Question</th><th>Strongly Disagree</th><th>Disagree</th><th>Neutral</th><th>Agree</th><th>Strongly Agree</th></tr><tr><td>I know unique places to go for fun or to eat in my area.</td><td>1.72%</td><td>12.07%</td><td>29.31%</td><td>43.1%</td><td>13.79%</td></tr><tr><td>I am a spontaneous person.</td><td>1.72%</td><td>12.93%</td><td>22.41%</td><td>43.97%</td><td>18.97%</td></tr><tr><td>I am an active person.</td><td>0%</td><td>9.48%</td><td>20.69%</td><td>44.83%</td><td>25%</td></tr><tr><td>I enjoy sharing my experiences with my friends.</td><td>0.86%</td><td>0%</td><td>6.03%</td><td>47.41%</td><td>45.69%</td></tr><tr><td>I am open to new experiences.</td><td>0%</td><td>0.86%</td><td>6.03%</td><td>54.31%</td><td>38.79%</td></tr><tr><td>When I have free time&hellip;.</td><td></td><td></td><td></td><td></td><td></td></tr><tr><td>I have an easy time figuring out what I want to do.</td><td>5.17%</td><td>20.69%</td><td>28.45%</td><td>35.34%</td><td>10.34%</td></tr><tr><td>I like to spend it outside of my home.</td><td>0.86%</td><td>12.07%</td><td>37.93%</td><td>33.62%</td><td>15.52%</td></tr><tr><td>The amount of money I spend is important to me.</td><td>0.86%</td><td>3.45%</td><td>15.52%</td><td>41.38%</td><td>38.79%</td></tr></table><div class='row'><div class='col-xs-6 col-centered'><img class='img-responsive img-thumbnail' style='text-align:center;' src='/stats1.png'></div><div class='col-xs-6 col-centered'><img class='img-responsive img-thumbnail' style='text-align:center;' src='/stats2.png'></div></div><div class='row'><div class='col-xs-6 col-centered'><img class='img-responsive img-thumbnail' style='text-align:center;' src='/stats3.png'></div><div class='col-xs-6 col-centered'><img class='img-responsive img-thumbnail' style='text-align:center;' src='/stats4.png'></div></div>");
		$this->createQuestion($app,5,true,"Tell us about one of your goals after graduation. What are you currently doing to achieve your goal (volunteer and/or collegiate involvement and experiences)?");
		$this->createQuestion($app,6,true,"Please list up to 3 significant activities in which you are currently involved (extracurricular, community service, sports, work, etc.) and provide a short description of each.");
		$this->createQuestion($app,7,true,"There are a variety of ways to become involved while participating in QUEST. Which of these is most appealing to you?");
		$this->createQuestion($app,8,true,"Please explain your choice for #7 above. How would you contribute to our community in this capacity?");
		$this->createQuestion($app,9,false,"Below is a graphic that explains how classes differ between cohorts 25 and 26. Think about your four-year plan and select your preferred cohort based on this. For example, if you plan to study abroad, choose the cohort that does not require you to take a QUEST course that semester.");
		$this->createQuestion($app,10,false,"In addition to your application, we will ask for a recommendation. Your recommender can be any adult who is not a member of your family. This person should be able to speak to your character, drive, ability to work in a team, and commitment to learning. QUEST will email a form to this individual the week of February 16th; please make sure that he or she is expecting to receive it. Please enter the email address of your recommender:");
		$this->createQuestion($app,11,false,"How did you learn about QUEST?");

	}

	private function createValue($app,$key,$value){
		$app->configurations()->save(ApplicationConfiguration::create([
	        "application_id" => $app->id,
	        "field_name" => $key,
	        "field_value" => $value 
		]));
	}

	private function createQuestion($app,$sortorder,$visible,$question){
		$app->questions()->save(Question::create([
            "application_id" => $app->id,
            "sort_order" => $sortorder,
            "question_html" => $question,
            "question_type" => "free",
            "visibleToReaders" => $visible
		]));
	}

}