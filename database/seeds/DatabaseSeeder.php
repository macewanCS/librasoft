<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('Tasks_Table_Seeder');
        $this->call('Objectives_Table_Seeder');
        $this->call('Actions_Table_Seeder');
        $this->call('Business_Plans_Table_Seeder');
        $this->call('Goals_Table_Seeder');
        $this->call('Users_Table_Seeder');
    }
}
