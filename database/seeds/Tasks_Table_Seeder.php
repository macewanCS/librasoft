<?php

use Illuminate\Database\Seeder;

class Tasks_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'body'=> "Implement wireless printing",
            'date'=> "April 1st, 2016",
            'lead'=> "Vicky, John",
            'collaborators'=> "",
            'status'=> "",
            'success'=> ""
        ]);
    }
}
