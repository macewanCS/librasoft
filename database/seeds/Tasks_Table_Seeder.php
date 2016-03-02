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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
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
            'owner'=> "It",
            'body'=> "Aid in the selection, purchase, and configuration of equipment for the fourth literacy van",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "Khalil, Robin, Any",
            'status'=> "",
            'success'=> "Equipment purchased, configured, and deployed",
            'action_id'=>3
        ]);

        //10
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Implement the approved recommendations from the Lending Machines report",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "Rachael Collins",
            'status'=> "",
            'success'=> "",
            'action_id'=>4
        ]);

        //11
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Provide planning support for eplGo North (MCN)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "FAC, CMA, LON",
            'status'=> "",
            'success'=> "",
            'action_id'=>5
        ]);

        //10
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Liase with Sirsi Dynix to support CMA's Single Sign On (SSO) project",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky/Andrew/Chris",
            'collaborators'=> "CMA",
            'status'=> "",
            'success'=> "SSO is implemented",
            'action_id'=>7
        ]);

        //11
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Release more EPL open data to City of Edmonton open data portal",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Alex Carruthers",
            'collaborators'=> "Andrew Nisbet",
            'status'=> "",
            'success'=> "",
            'action_id'=>8
        ]);

        //12
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Purchase hardware for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "",
            'action_id'=>9
        ]);

        //13
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Provision iPads for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Khalil",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "",
            'action_id'=>9
        ]);

        //14
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Provision laptops for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Robin",
            'collaborators'=> "Jamie/John",
            'status'=> "",
            'success'=> "",
            'action_id'=>9
        ]);

        //15
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Support the ILS team's implementation of Mobile circ, including purchasing peripherals and configuring branch iPads",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky/Khalil",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Mobile Circ rolled out",
            'action_id'=>10
        ]);

        //16
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Purchase new iPad kits for each branch currently without one per budget request",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "iPads configured and deployed",
            'action_id'=>10
        ]);

        //17
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Provision iPad kits",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Khalil",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "iPads configured and deployed",
            'action_id'=>10
        ]);

        //18
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "In collaboration with DLI, select equipment to replace aging Makerspace equipment",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "DLI, MNA",
            'status'=> "",
            'success'=> "New equipment selected, purchased, and deployed",
            'action_id'=>10
        ]);

        //19
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Implement a regular \"What's up with that?\" style blog post by IT to enhance staff understanding of technology",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Blogs posted on a regular schedule",
            'action_id'=>10
        ]);

        //20
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Stabilize and standardize the display board environment",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "JD",
            'status'=> "",
            'success'=> "All display boards are functional",
            'action_id'=>10
        ]);

        //21
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Compare IT's current ticketing sytems against demos of inexpensive, focused ticketing systems to determine if a migration can and should occur.",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky",
            'collaborators'=> "PUR",
            'status'=> "",
            'success'=> "Demos are completed and a recommendation for which system best meets EPL's needs is forwarded",
            'action_id'=>11
        ]);

        //14
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Conduct a literature review of Help Desk best practices to determine how EPL's processes can be improved",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Report forwarded with recommendations",
            'action_id'=>11
        ]);

        //15
        DB::table('tasks')->insert([
            'owner'=> "It",
            'body'=> "Create an Internal Service Level Agreement document outlining IT's processes and commitments to its customers",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "Vicky/Any",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Document created",
            'action_id'=>11
        ]);
    }
}
