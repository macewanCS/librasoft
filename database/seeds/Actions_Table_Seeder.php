<?php

use Illuminate\Database\Seeder;

class Actions_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'body'=> "Action 1.13: Review public computing needs and sevelop strategies to meet hose needs",
            'date'=> "January 1st, 2016",
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT, DLI",
            'status'=> "Projects in each of 2014, 2015, 2016",
            'success'=> "Achieve a 90% completion rating; Increase computer usage by 20%"
        ]);
    }
}
