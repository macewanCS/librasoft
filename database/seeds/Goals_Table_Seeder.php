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
            'body'=> "Goal 1: Transform Communities",
            'plan_id' => 1
        ]);

        DB::table('goals')->insert([
            'body'=> "Goal 2: Transform Communities",
            'plan_id' => 1
        ]);

        DB::table('goals')->insert([
            'body'=> "Goal 3: Transform Communities",
            'plan_id' => 1
        ]);

    }
}
