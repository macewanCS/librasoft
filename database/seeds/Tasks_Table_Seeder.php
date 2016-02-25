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
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT Project Team",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //2
        DB::table('tasks')->insert([
            'body'=> "Upgrade LibOnline to the latest version (4.9)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Michael/Luc",
            'collaborators'=> "Active Networks",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //3
        DB::table('tasks')->insert([
            'body'=> "Implement wireless printing",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Vicky/John",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //4
        DB::table('tasks')->insert([
            'body'=> "Investigate and prepare to replace LibOnline in 2017 with business case, budged request, and high level migration plan",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //5
        DB::table('tasks')->insert([
            'body'=> "Investigate options for new customer technology in collaboration with CMA/collections & Teams (eg Adult iPad installations; gaming floor projectors)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "CMA, Teams, DLI",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //6
        DB::table('tasks')->insert([
            'body'=> "Investigate and implement options to improve service options with WiFi",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Manager, IT Infrastructure/Luc Michael",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //7
        DB::table('tasks')->insert([
            'body'=> "Improve user security and privacy on public computers by adding browser plugins such as Web of Trust",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Manager, IT Infrastructure/Luc Michael",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>1
        ]);

        //8
        DB::table('tasks')->insert([
            'body'=> "Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>2
        ]);

        //9
        DB::table('tasks')->insert([
            'body'=> "Aid in the selection, purchase, and configuration of equipment for the fourth literacy van",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "Khalil, Robin, Any",
            'status'=> "",
            'success'=> "",
            'action_id'=>2
        ]);

        //9
        DB::table('tasks')->insert([
            'body'=> "Implement the approved recommendations from the Lending Machines report",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "Rachael Collins",
            'status'=> "",
            'success'=> "",
            'action_id'=>3
        ]);

        //10
        DB::table('tasks')->insert([
            'body'=> "Liase with Sirsi Dynix to support CMA's Single Sign On (SSO) project",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky/Andrew/Chris",
            'collaborators'=> "CMA",
            'status'=> "",
            'success'=> "SSO is implemented",
            'action_id'=>4
        ]);

        //11
        DB::table('tasks')->insert([
            'body'=> "Provision iPads for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Khalil",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "",
            'action_id'=>4
        ]);

        //12
        DB::table('tasks')->insert([
            'body'=> "Provision laptops for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Robin",
            'collaborators'=> "Jamie/John",
            'status'=> "",
            'success'=> "",
            'action_id'=>4
        ]);

        //13
        DB::table('tasks')->insert([
            'body'=> "Compare IT's current ticketing sytems against demos of inexpensive, focused ticketing systems to determine if a migration can and should occur.",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "PUR",
            'status'=> "",
            'success'=> "Demos are completed and a recommendation for which system best meets EPL's needs is forwarded",
            'action_id'=>5
        ]);

        //14
        DB::table('tasks')->insert([
            'body'=> "Conduct a literature review of Help Desk best practices to determine how EPL's processes can be improved",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Report forwarded with recommendations",
            'action_id'=>5
        ]);

        //15
        DB::table('tasks')->insert([
            'body'=> "Create an Internal Service Level Agreement document outlining IT's processes and commitments to its customers",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Document created",
            'action_id'=>5
        ]);
    }
}
