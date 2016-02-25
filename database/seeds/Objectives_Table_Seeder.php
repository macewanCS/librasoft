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
        //1
        DB::table('objectives')->insert([
            'body'=> "Objective 1C: We Identify and Meet Community Needs",
            'goal_id' => 1
        ]);

        //2
        DB::table('objectives')->insert([
            'body'=>"Objective 1F: We Reduce barriers to accessing library services",
            'goal_id' => 1
        ]);

        //3
        DB::table('objectives')->insert([
            'body'=>"(No Name)",
            'goal_id' => 2
        ]);

        //4
        DB::table('objectives')->insert([
            'body'=>"Objective 2A: EPL has defined and created a digital public space in collaboration with community and partners",
            'goal_id' => 3
        ]);

        //5
        DB::table('objectives')->insert([
            'body'=>"Objective 3A: Act as a catalyst for learning, discovery and creating",
            'goal_id' => 3
        ]);

        //6
        DB::table('objectives')->insert([
            'body'=>"Objective 3D: EPL is a staff of learners confident in their abilities to assist customers",
            'goal_id' => 3
        ]);

        //7
        DB::table('objectives')->insert([
            'body'=>"Objective 4A: We have transformed our approach to service delivery and use of physical space",
            'goal_id' => 4
        ]);
    }
}
