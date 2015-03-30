<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call("RoleSeeder");
        //$this->call("UserSeeder");
        //$this->call("ApplicationsTableSeeder");
        //$this->call("ReaderCriteriaTableSeeder");
        //$this->call("UserApplicationsTableSeeder");
        //$this->call("MajorMinorHonorsTableSeeder");
        //$this->call("KnownIdTableSeeder");
        //$this->call("PersonSeeder");
        $this->call("InterviewSeeder");

	}

}
