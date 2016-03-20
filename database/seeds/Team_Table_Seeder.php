<?php

use Illuminate\Database\Seeder;

class Team_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('teams')->insert([
            'name' => "School Aged Services Team"
        ]);

        //2
        DB::table('teams')->insert([
            'name' => "Community-Led Team"
        ]);

        //3
        DB::table('teams')->insert([
            'name' => "Foundational Programming Team"
        ]);

        //4
        DB::table('teams')->insert([
            'name' => "Membership Services Team"
        ]);

        //5
        DB::table('teams')->insert([
            'name' => "Discovery Team"
        ]);

        //6
        DB::table('teams')->insert([
            'name' => "Events Team"
        ]);
    }
}
