<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserApplicationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('user_applications')->delete();	

		for ( $counter = 1; $counter <= 200; $counter += 1) {
            $user = [
                "password" => Hash::make("applicant" . $counter),
                "username" => "applicant" . $counter,
            ];
            $cu = User::where('username', '=', $user["username"])->firstOrFail();
			$app = Application::where('name', '=', "Application 2015")->firstOrFail();

            $userapplication = UserApplication::create([
				"application_id" => $app->id,
				"user_id" => $cu->id,
				"submitted" => true
			]);

			$i = 0;
			foreach($userapplication->questions() as $question){
				Answer::create([
					"question_id" => $question->id,
					"user_application_id" => $userapplication->id,
					"answer" => "This is an answer for question " . ($i + 1)
				]);	
				$i = $i + 1;
			}
        }	
	}

}