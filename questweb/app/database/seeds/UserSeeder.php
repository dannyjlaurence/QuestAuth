<?php

class UserSeeder
extends DatabaseSeeder
{
    public function run()
    {
        DB::table('answers')->delete();
        DB::table('reader_assignments')->delete();
        DB::table('scores')->delete();
        DB::table('user_applications')->delete();
        DB::table('major_user')->delete();
        DB::table('minor_user')->delete();
        DB::table('honor_program_user')->delete();
        DB::table('users')->delete();


        for ( $counter = 1; $counter <= 200; $counter += 1) {
            $user = [
                "password" => Hash::make("applicant" . $counter),
                "username" => "applicant" . $counter,
            ];
            $cu = User::create($user);
            $cu->roles()->save(Role::where('description', '=', Role::$APPLICANT)->firstOrFail());
        }

        for ( $counter = 1; $counter <= 100; $counter += 1) {
            $user = [
                "password" => Hash::make("reader" . $counter),
                "username" => "reader" . $counter,
            ];
            $cu = User::create($user);
            $cu->roles()->save(Role::where('description', '=', Role::$READER)->firstOrFail());
        }

        $users = [
            [
            "password" => Hash::make("applicant"),
            "username" => "applicant",
            ],
            [
            "password" => Hash::make("reader"),
            "username" => "reader",
            ],
            [
            "password" => Hash::make("interviewer"),
            "username" => "interviewer",
            ],
            [
            "password" => Hash::make("qualityguild"),
            "username" => "qualityguild",
            ],
            [
            "password" => Hash::make("danny"),
            "username" => "danny",
            ],
        ];
        foreach ($users as $user)
        {
            $cu = User::create($user);
            if($user["username"] == "applicant"){
                $cu->roles()->save(Role::where('description', '=', Role::$APPLICANT)->firstOrFail());
            }
            if($user["username"] == "reader"){
                $cu->roles()->save(Role::where('description', '=', Role::$READER)->firstOrFail());
            }
            if($user["username"] == "interviewer"){
                $cu->roles()->save(Role::where('description', '=', Role::$INTERVIEWER)->firstOrFail());
            }
            if($user["username"] == "qualityguild"){
                $cu->roles()->save(Role::where('description', '=', Role::$QUALITY_GUILD)->firstOrFail());
            }
            if($user["username"] == "danny"){
                $cu->roles()->save(Role::where('description', '=', Role::$APPLICANT)->firstOrFail());
                $cu->roles()->save(Role::where('description', '=', Role::$READER)->firstOrFail());
                $cu->roles()->save(Role::where('description', '=', Role::$INTERVIEWER)->firstOrFail());
                $cu->roles()->save(Role::where('description', '=', Role::$QUALITY_GUILD)->firstOrFail());
            }
        }
    }
}
