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
        $SEPARATOR = "__,__";
        
        //1
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Implement approved recommendations from the 2015 Public Computing Report",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "IT Project Team",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>1
        ]);

        //2
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Upgrade LibOnline to the latest version (4.9)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "dmichael@epl.ca" . $SEPARATOR . "dluc@epl.ca",
            'collaborators'=> "Active Networks",
            'status'=> "Completed",
            'success'=> "In progress",
            'action_id'=>1
        ]);

        //3
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Implement wireless printing",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca" . $SEPARATOR . "djohn@epl.ca",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>1
        ]);

        //4
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Investigate and prepare to replace LibOnline in 2017 with business case, budged request, and high level migration plan",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>1
        ]);

        //5
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Investigate options for new customer technology in collaboration with CMA/collections & Teams (eg Adult iPad installations; gaming floor projectors)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "CMA" . $SEPARATOR . "Teams" . $SEPARATOR . "DLI",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>1
        ]);

        //6
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Investigate and implement options to improve service options with WiFi",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Manager" . $SEPARATOR . "IT Infrastructure" . $SEPARATOR . "dluc@epl.ca" . $SEPARATOR . "dmichael@epl.ca",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>1
        ]);

        //7
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Improve user security and privacy on public computers by adding browser plugins such as Web of Trust",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "Manager" . $SEPARATOR . "IT Infrastructure" . $SEPARATOR . "dluc@epl.ca" . $SEPARATOR . "dmichael@epl.ca",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>1
        ]);

        //8
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Provide planning assistance to the Customer Payments team to implement the necessary changes to support a Fine Free day",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>2
        ]);

        //9
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Aid in the selection, purchase, and configuration of equipment for the fourth literacy van",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "dkhalil@epl.ca" . $SEPARATOR . "drobin@epl.ca" . $SEPARATOR . "Any",
            'status'=> "In progress",
            'success'=> "Equipment purchased, configured, and deployed",
            'action_id'=>3
        ]);

        //10
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Implement the approved recommendations from the Lending Machines report",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "crachael@epl.ca",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>4
        ]);

        //11
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Provide planning support for eplGo North (MCN)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "FAC" . $SEPARATOR . "CMA" . $SEPARATOR . "LON",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>5
        ]);

        //12
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Liase with Sirsi Dynix to support CMA's Single Sign On (SSO) project",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca" . $SEPARATOR . "nandrew@epl.ca" . $SEPARATOR . "dchris@epl.ca",
            'collaborators'=> "CMA",
            'status'=> "Completed",
            'success'=> "SSO is implemented",
            'action_id'=>7
        ]);

        //13
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Release more EPL open data to City of Edmonton open data portal",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "acarruthers@epl.ca",
            'collaborators'=> "nandrew@epl.ca",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>8
        ]);

        //14
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Purchase hardware for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>9
        ]);

        //15
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Provision iPads for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "dkhalil@epl.ca",
            'collaborators'=> "vvarga@epl.ca",
            'status'=> "In progress",
            'success'=> "",
            'action_id'=>9
        ]);

        //16
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Provision laptops for mini-makerspaces at CSD, WOO, IDY, STR",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "drobin@epl.ca",
            'collaborators'=> "djamie@epl.ca" . $SEPARATOR . "djohn@epl.ca",
            'status'=> "Completed",
            'success'=> "",
            'action_id'=>9
        ]);

        //17
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Support the ILS team's implementation of Mobile circ, including purchasing peripherals and configuring branch iPads",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca" . $SEPARATOR . "dkhalil@epl.ca",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "Mobile Circ rolled out",
            'action_id'=>10
        ]);

        //18
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Purchase new iPad kits for each branch currently without one per budget request",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "iPads configured and deployed",
            'action_id'=>10
        ]);

        //19
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Provision iPad kits",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "dkhalil@epl.ca",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "iPads configured and deployed",
            'action_id'=>10
        ]);

        //20
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "In collaboration with DLI, select equipment to replace aging Makerspace equipment",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "DLI" . $SEPARATOR . "MNA",
            'status'=> "Completed",
            'success'=> "New equipment selected, purchased, and deployed",
            'action_id'=>10
        ]);

        //21
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Implement a regular \"What's up with that?\" style blog post by IT to enhance staff understanding of technology",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Any",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "Blogs posted on a regular schedule",
            'action_id'=>10
        ]);

        //22
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Stabilize and standardize the display board environment",
            'date'=> \Carbon\Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "djohn@epl.ca",
            'status'=> "In progress",
            'success'=> "All display boards are functional",
            'action_id'=>10
        ]);

        //23
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Compare IT's current ticketing sytems against demos of inexpensive, focused ticketing systems to determine if a migration can and should occur.",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca",
            'collaborators'=> "PUR",
            'status'=> "In progress",
            'success'=> "Demos are completed and a recommendation for which system best meets EPL's needs is forwarded",
            'action_id'=>11
        ]);

        //24
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Conduct a literature review of Help Desk best practices to determine how EPL's processes can be improved",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca" . $SEPARATOR . "Any",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "Report forwarded with recommendations",
            'action_id'=>11
        ]);

        //25
        DB::table('tasks')->insert([
            'owner'=> "IT Services",
            'body'=> "Create an Internal Service Level Agreement document outlining IT's processes and commitments to its customers",
            'date'=> \Carbon\Carbon::createFromDate(2016, 06, 01)->toDateTimeString(),
            'lead'=> "vvarga@epl.ca" . $SEPARATOR . "Any",
            'collaborators'=> "",
            'status'=> "Completed",
            'success'=> "Document created",
            'action_id'=>11
        ]);
    }
}
