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
        $this->call(Department_Table_Seeder::class);
        $this->call(Team_Table_Seeder::class);
        $this->call(Business_Plans_Table_Seeder::class);
        $this->call(Goals_Table_Seeder::class);
        $this->call(Objectives_Table_Seeder::class);
        $this->call(Actions_Table_Seeder::class);
        $this->call(Tasks_Table_Seeder::class);
        $this->call(Notes_Table_Seeder::class);
        $this->call(Permissions_Table_Seeder::class);
        $this->call(Roles_Table_Seeder::class);
        $this->call(Users_Table_Seeder::class);
    }
}
