<?php

use Illuminate\Database\Seeder;

class Objectives_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('objectives')->insert([
            'body'=> "Objective 1c: We Identify and Meet Community Needs"
        ]);
    }
}
