<?php

use Illuminate\Database\Seeder;

class Department_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        DB::table('departments')->insert([
            'name' => "IT Services"
        ]);

        //2
        DB::table('departments')->insert([
            'name' => "Human Resources"
        ]);

        //3
        DB::table('departments')->insert([
            'name' => "Financial Services"
        ]);

        //4
        DB::table('departments')->insert([
            'name' => "Finance"
        ]);

        //5
        DB::table('departments')->insert([
            'name' => "Fund Development"
        ]);

        //6
        DB::table('departments')->insert([
            'name' => "Collection Management and Access"
        ]);
    }
}
