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
        //1 IT
        DB::table('objectives')->insert([
            'body'=> "We Identify and Meet Community Needs",
            'goal_id' => 1
        ]);

        //2 IT
        DB::table('objectives')->insert([
            'body'=>"We Reduce barriers to accessing library services",
            'goal_id' => 1
        ]);

        //3 IT
        DB::table('objectives')->insert([
            'body'=>"Expedite our booking process",
            'goal_id' => 2
        ]);

        //4 IT
        DB::table('objectives')->insert([
            'body'=>"EPL has defined and created a digital public space in collaboration with community and partners",
            'goal_id' => 3
        ]);

        //5 IT
        DB::table('objectives')->insert([
            'body'=>"Act as a catalyst for learning, discovery and creating",
            'goal_id' => 3
        ]);

        //6 IT
        DB::table('objectives')->insert([
            'body'=>"EPL is a staff of learners confident in their abilities to assist customers",
            'goal_id' => 3
        ]);

        //7 IT
        DB::table('objectives')->insert([
            'body'=>"We have transformed our approach to service delivery and use of physical space",
            'goal_id' => 4
        ]);

        //8 Events team
        DB::table('objectives')->insert([
            'body'=> "Together with out community we provide successful, meaningful services that
            are highly rated and heavily used.",
            'goal_id' => 1
        ]);

        //9 Events team
        DB::table('objectives')->insert([
            'body'=>"Online services are highly used and valued",
            'goal_id' => 2
        ]);

        //10 Events team
        DB::table('objectives')->insert([
            'body'=>"Edmontonians view EPL as integral to their lifelong formal and informal learning",
            'goal_id' => 3
        ]);

        //11 Events team
        DB::table('objectives')->insert([
            'body'=>"There are established partnerships to support programs and services",
            'goal_id' => 4
        ]);

        //12 Events team
        DB::table('objectives')->insert([
            'body'=>"We have a vibrant fund development with increase donor diversity, and increased
            value of donations and sponsorships.",
            'goal_id' => 4
        ]);

        //13 Events team
        DB::table('objectives')->insert([
            'body'=>"Create a framework to intice high end speakers to come to EPL at no or reduced cost.",
            'goal_id' => 5
        ]);
    }
}
