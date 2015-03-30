<?php

class PersonSeeder
extends DatabaseSeeder
{
    public function run()
    {
        DB::table('people')->delete();

        $faker = Faker\Factory::create();
 
        for ($i = 0; $i < 100; $i++)
        {
          $user = Person::create(array(
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'gender' => $faker->randomElement($array = array ('M','F','other')),
            'email' => $faker->email,
            'race' => $faker->randomElement($array = array('Hispanic', 'White', 'Black', 'Asian','Multiracial','Other')),
            'dateOfBirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'isDisabled' => $faker->randomElement($array = array (true,false)),
            'isVeteran' => $faker->randomElement($array = array (true,false)),
            'isUnemployed' => $faker->randomElement($array = array (true,false)),
            'hasChildern' => $faker->randomElement($array = array (true,false)),
            'isInterestedESL' => $faker->randomElement($array = array (true,false)),
          ));

            for ($j = 0; $j < 20; $j++)
            {
                DB::table('attend')->insert(
                    array('person_id' => $user->id, 
                          'station_id' => Station::all()[0]->id, 
                          'created_at' => $faker->dateTimeThisMonth($max = 'now'))
                );
             }
        }
    }
}
