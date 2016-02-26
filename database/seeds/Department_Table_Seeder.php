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
            'name' => "IT"
        ]);

        //2
        DB::table('departments')->insert([
            'name' => "Human Resources"
        ]);

        //3
        DB::table('departments')->insert([
            'name' => "Marketing"
        ]);

        //4
        DB::table('departments')->insert([
            'name' => "Finance"
        ]);
    }
}
