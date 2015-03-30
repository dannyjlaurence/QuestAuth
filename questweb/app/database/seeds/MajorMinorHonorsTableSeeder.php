<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MajorMinorHonorsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('honor_program_user')->delete();
		DB::table('honor_programs')->delete();
		DB::table('minor_user')->delete();
		DB::table('minors')->delete();
		DB::table('major_user')->delete();
		DB::table('majors')->delete();

		$faker = Faker::create();

		foreach(Major::$MAJORS as $value)
		{
			Major::create([
				"name" => $value["name"],
				"school" => $value["school"]
			]);
		}

		foreach(Minor::$MINORS as $value)
		{
			Minor::create([
				"name" => $value["name"],
				"school" => $value["school"]
			]);
		}

		foreach(HonorProgram::$PROGRAMS as $value)
		{
			HonorProgram::create([
				"name" => $value["name"],
				"school" => $value["school"]
			]);
		}
	}

}