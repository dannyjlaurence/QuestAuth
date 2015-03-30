<?php

class RoleSeeder
extends DatabaseSeeder
{
    public function run()
    {
        DB::table('role_user')->delete();
        DB::table('roles')->delete();

        $roles = [
            [
            "description" => Role::$APPLICANT
            ],
            [
            "description" => Role::$READER
            ],
            [
            "description" => Role::$INTERVIEWER
            ],
            [
            "description" => Role::$QUALITY_GUILD
            ],
        ];
        foreach ($roles as $role)
        {
            Role::create($role);
        }
    }
}
