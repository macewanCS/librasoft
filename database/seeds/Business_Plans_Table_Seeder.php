<?php

use Illuminate\Database\Seeder;

class Business_Plans_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            'date'=> \Carbon\Carbon::createFromDate(2016)->toDateTimeString(),
        ]);
    }
}
