<?php

use Illuminate\Database\Seeder;

class Users_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Vicky',
            'email'=> 'vvarga@epl.ca',
            'password'=> bcrypt('vicky'),
        ]);
    }
}
