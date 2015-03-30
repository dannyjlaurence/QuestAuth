<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ReaderCriteriaTableSeeder extends Seeder {



	public function run()
	{
		$app = Application::all()->first();

		DB::table('reader_criterias')->delete();
		DB::table('scores')->delete();
		DB::table('reader_assignments')->delete();

		$faker = Faker::create();
/*
		$this->createItem($app,"Please rate the applicant's fit with the QUEST program"                        ,"It is not clear that the applicant will fit into QUEST. QUEST does not seem to fit with his / her future goals."                                                     ,"QUEST aligns perfectly with the applicant's future goals. The skills gained through the QUEST program will be beneficial to the applicant.",4);
        $this->createItem($app,"Please rate the applicant's ability"                                           ,"The applicant's intellectual capacity, problem solving capacity, and critical thinking skills are similar to most UMD students."                                     ,"The applicant demonstrates superior intellectual capacity, problem solving ability, and critical thinking skills.",4);
        $this->createItem($app,"Please rate the applicant's level of engagement"                               ,"There is limited evidence of engagement in service and / or leadership activities. The applicant does not show a strong desire to be engaged in the QUEST community.","The applicant demonstrates committed engagement in activities and leadership positions. He / she shows a clear desire to be engaged in the QUEST community.",4);
		$this->createItem($app,"Please rate the applicant's teamwork abilities"                                ,"It is doubtful that the applicant will perform well in team environments."                                                                                           ,"The applicant demonstrates a strong desire to participate and work on a team. He / she has a clear history of strong teamwork and group participation.",4);
		$this->createItem($app,"Please rate the applicant's communication skills"                              ,"The application is not easy to read. Answers are vague. Writing skills are poor."                                                                                    ,"The applicant clearly articulates his / her thoughts. Answers are thoughtful and demonstrate personal reflection and planning.",4);
		$this->createItem($app,"Please rate the applicant's character (Consider response to Questions 2 and 3)","This applicant does not demonstrate an understanding of ethical issues. He / she lacks the ability to act on ethical principles."                                    ,"The applicant is able to fully recognize ethical issues and has a clear understanding of his / her own personal ethical values. The applicant demonstrates a clear ability to act on ethical principles.",4);
        $this->createItem($app,"Your overall impression of the applicant"                                      ,"This applicant does not meet QUEST standards and should not be considered any further."                                                                              ,"This applicant would make an exceptional QUEST student. His / Her participation in QUEST would greatly enhance the QUEST community.",4);
*/
		$this->createItem($app,"Please rate the applicant's fit with the QUEST program"                        ,"It is not clear that the applicant will fit into QUEST. QUEST does not seem to fit with his / her future goals."                                                     ,"QUEST aligns perfectly with the applicant's future goals. The skills gained through the QUEST program will be beneficial to the applicant.",4);
        $this->createItem($app,"Please rate the applicant's ability"                                           ,"The applicant's intellectual capacity, problem solving capacity, and critical thinking skills are similar to most UMD students."                                     ,"The applicant demonstrates superior intellectual capacity, problem solving ability, and critical thinking skills.",4);
        $this->createItem($app,"Please rate the applicant's level of engagement"                               ,"There is limited evidence of engagement in service and / or leadership activities. The applicant does not show a strong desire to be engaged in the QUEST community.","The applicant demonstrates committed engagement in activities and leadership positions. He / she shows a clear desire to be engaged in the QUEST community.",4);
		$this->createItem($app,"Please rate the applicant's teamwork abilities"                                ,"It is doubtful that the applicant will perform well in team environments."                                                                                           ,"The applicant demonstrates a strong desire to participate and work on a team. He / she has a clear history of strong teamwork and group participation.",4);
		$this->createItem($app,"Please rate the applicant's communication skills"                              ,"The candidate is not able to clearly articulate his/her thoughts. Answers are vague. The candidate communicates with other candidates ineffectively."                ,"The candidate clearly articulates his/her thoughts. Answers are thoughtful and demonstrate personal reflection. The candidate communicates with other candidates effectively.",4);
		$this->createItem($app,"Please rate the applicant's character"                                         ,"This applicant does not demonstrate an understanding of ethical issues. He / she lacks the ability to act on ethical principles."                                    ,"The applicant is able to fully recognize ethical issues and has a clear understanding of his / her own personal ethical values. The applicant demonstrates a clear ability to act on ethical principles.",4);
        $this->createItem($app,"Your overall impression of the applicant"                                      ,"This applicant does not meet QUEST standards and should not be considered any further."                                                                              ,"This applicant would make an exceptional QUEST student. His / Her participation in QUEST would greatly enhance the QUEST community.",4);


	}

	private function createItem($app,$name,$lowDescription,$highDescription,$scoreValue){
		$app->readerCriterias()->save(ReaderCriteria::create([
	        "name" => $name,
	        "application_id" => $app->id,
	        "low_description" => $lowDescription,
	        "high_description" => $highDescription,
	        "score_value" => $scoreValue 
		]));
	}

}
