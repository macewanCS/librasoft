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
            'name' => "Events"
        ]);
    }
}
