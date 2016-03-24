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
        //1
        DB::table('goals')->insert([
            'body'=> "Transform Communities",
            'plan_id' => 1
        ]);

        //2
        DB::table('goals')->insert([
            'body'=> "Evolve our Digital Environment",
            'plan_id' => 1
        ]);

        //3
        DB::table('goals')->insert([
            'body'=> "Act as a catalyst for learning, discovery, and creating",
            'plan_id' => 1
        ]);

        //4
        DB::table('goals')->insert([
            'body' => "Transition the way we do business",
            'plan_id' => 1
        ]);

        //5 Events team last objective
        DB::table('goals')->insert([
            'body' => "Non-Business Plan",
            'plan_id' => 1
        ]);
    }
}
