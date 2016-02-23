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
        $this->call(Business_Plans_Table_Seeder::class);
        $this->call(Goals_Table_Seeder::class);
        $this->call(Objectives_Table_Seeder::class);
        $this->call(Actions_Table_Seeder::class);
        $this->call(Tasks_Table_Seeder::class);
    }
}
