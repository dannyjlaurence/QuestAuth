<?php

class InterviewSeeder
extends DatabaseSeeder
{
    public function run()
    {

        if(Application::where('name', '=', 'Application Interview 2015')->count() == 0){
            $app = Application::create([
                "name" => "Application Interview 2015"
            ]);

            $this->createItem($app,"Please rate the candidate's fit with the QUEST program","It is not clear that the candidate will fit into QUEST. QUEST does not seem to fit with his/her future goals.","QUEST aligns perfectly with the candidate’s future goals. The skills gained through the QUEST program will be beneficial to the candidate.",4);
            $this->createItem($app,"Please rate the candidate's ability","The candidate’s intellectual capacity, problem solving capacity, and critical thinking skills are similar to most UMD students.","The candidate demonstrates superior intellectual capacity, problem solving ability, and critical thinking skills.",4);
            $this->createItem($app,"Please rate the candidate's level of engagement","There is limited evidence that the candidate desires to be engaged in the QUEST community.","The candidate demonstrates committed engagement in activities and leadership positions. He/she shows a clear desire to be engaged in the QUEST community as well.",4);
            $this->createItem($app,"Please rate the candidate's teamwork abilities","It is doubtful that the candidate will perform well in team environments.","The candidate demonstrates a strong desire and ability to participate and work on a team.",4);
            $this->createItem($app,"Please rate the candidate's communication skills","The candidate is not able to clearly articulate his/her thoughts. Answers are vague. The candidate communicates with other candidates ineffectively.","The candidate clearly articulates his/her thoughts. Answers are thoughtful and demonstrate personal reflection. The candidate communicates with other candidates effectively.",4);
            $this->createItem($app,"Please rate the candidate's character","This candidate does not demonstrate an understanding of ethical issues. He/she lacks the ability to act on ethical principles.","The candidate is able to fully recognize ethical issues and has a clear understanding of his/her own personal ethical values. The candidate demonstrates a clear ability to act on ethical principles.",4);
            $this->createItem($app,"Your overall impression of the candidate","It is not clear that the candidate will fit into QUEST. QUEST does not seem to fit with his/her future goals.","QUEST aligns perfectly with the candidate’s future goals. The skills gained through the QUEST program will be beneficial to the candidate.",4);
        } else {
            $app = Application::find(2);
        }
        
        $userApplications = $this->getUserApplications();

        foreach($userApplications as $userApp){
            $userapplication = UserApplication::create([
                "application_id" => 2,
                "user_id" => $userApp->user_id,
                "submitted" => false
            ]);
        }
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


    public static function getUserApplications(){
        $apps = UserApplication::where('application_id', '=', 1)->get();
        $list = [];
        foreach($apps as $app){
            if($app->submitted && $app->user->creditsCompleted >= 12 && $app->user->gpa >= 3.0 && !$app->user->hasMajor(Major::find(30))){
                $list[] = $app;
            }
        }
        return $list;
    }
}
