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
    }
}
