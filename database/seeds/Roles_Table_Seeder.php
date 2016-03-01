<?php

use Illuminate\Database\Seeder;

class Roles_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            'name'=> 'Admin',
            'slug'=> 'administration',
            'description'=> 'Manage Administration privileges'
        ]);

        DB::table('roles')->insert([
            'name'=> 'DepLead',
            'slug'=> 'depLead',
            'description'=> 'Manage Department Lead privileges'
        ]);

        DB::table('roles')->insert([
            'name'=> 'TeamLead',
            'slug'=> 'teamLead',
            'description'=> 'Manage Team Lead privileges'
        ]);

        DB::table('roles')->insert([
            'name'=> 'User',
            'slug'=> 'user',
            'description'=> 'Manage User privileges'
        ]);
    }
}
