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
        //1
        DB::table('tasks')->insert([
            'body'=> "Implement approved recommendations from the 2015 Public Computing Report",
            'date'=> "Q1-2",
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT Project Team",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //2
        DB::table('tasks')->insert([
            'body'=> "Investigate options for new customer technology in collaboration with CMA/collections & Teams (eg Adult iPad installations; gaming floor projectors)",
            'date'=> "Q2-4",
            'lead'=> "Vicky",
            'collaborators'=> "CMA, Teams, DLI",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //3
        DB::table('tasks')->insert([
            'body'=> "Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day",
            'date'=> "Q1-2",
            'lead'=> "Vicky",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>2
        ]);

        //4
        DB::table('tasks')->insert([
            'body'=> "Implement the approved recommendations from the Lending Machines report",
            'date'=> "Q1-2",
            'lead'=> "Vicky",
            'collaborators'=> "Rachael Collins",
            'status'=> "",
            'success'=> "",
            'action_id'=>3
        ]);

        //5
        DB::table('tasks')->insert([
            'body'=> "Liase with Sirsi Dynix to support CMA's Single Sign On (SSO) project",
            'date'=> "Q1-2",
            'lead'=> "Vicky/Andrew/Chris",
            'collaborators'=> "CMA",
            'status'=> "",
            'success'=> "SSO is implemented",
            'action_id'=>4
        ]);

        //6
        DB::table('tasks')->insert([
            'body'=> "Provision iPads for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> "Q2-3",
            'lead'=> "Khalil",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "",
            'action_id'=>4
        ]);

        //7
        DB::table('tasks')->insert([
            'body'=> "Provision laptops for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> "Q2-3",
            'lead'=> "Robin",
            'collaborators'=> "Jamie/John",
            'status'=> "",
            'success'=> "",
            'action_id'=>4
        ]);

        //8
        DB::table('tasks')->insert([
            'body'=> "Compare IT's current ticketing sytems against demos of inexpensive, focused ticketing systems to determine if a migration can and should occur.",
            'date'=> "Q3-4",
            'lead'=> "Vicky",
            'collaborators'=> "PUR",
            'status'=> "",
            'success'=> "Demos are completed and a recommendation for which system best meets EPL's needs is forwarded",
            'action_id'=>5
        ]);

        //9
        DB::table('tasks')->insert([
            'body'=> "Conduct a literature review of Help Desk best practices to determine how EPL's processes can be improved",
            'date'=> "Q3-4",
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Report forwarded with recommendations",
            'action_id'=>5
        ]);

        //10
        DB::table('tasks')->insert([
            'body'=> "Create an Internal Service Level Agreement document outlining IT's processes and commitments to its customers",
            'date'=> "Q3-4",
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Document created",
            'action_id'=>5
        ]);
    }
}
