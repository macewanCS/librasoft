<?php

use Illuminate\Database\Seeder;

class Goals_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'body'=> "Goal 1: Transform Communities"
        ]);
    }
}
