<?php

use Illuminate\Database\Seeder;

class Actions_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('actions')->insert([
            'body'=> "Action 1.13: Review public computing needs and develop strategies to meet hose needs",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT, DLI",
            'status'=> "Projects in each of 2014, 2015, 2016",
            'success'=> "Achieve a 90% completion rating; Increase computer usage by 20%",
            'objective_id'=>1
        ]);

        // 2
        DB::table('actions')->insert([
            'body'=> "Action 1.23: Establish a fine-free day to take place every second year",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Jody Crilly",
            'collaborators'=> "Marketing, Vicky, Deputy CEO (sponsor)",
            'status'=> "Completed",
            'success'=> "Yes",
            'objective_id'=>2
        ]);

        //3
        DB::table('actions')->insert([
            'body'=> "Action 1.25: Extend literacy van services to underserved communities in Edmonton and surrounding areas.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Elaine Jones",
            'collaborators'=> "FAO, Marketing",
            'status'=> "Service is currently at 50%; anticipate 4 vans and full staffing complement fully operational by fall of 2016",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'objective_id'=>2
        ]);

        // 4
        DB::table('actions')->insert([
            'body'=> "Action 1.26: Implement lending machines in underserved areas of Edmonton",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Deputy CEO",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'objective_id'=>2
        ]);

        //5
        DB::table('actions')->insert([
            'body'=> "Action 1.28: Design new eplGO spaces with a greater focus on digital literacy services and with media spaces for underserved communities. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Deputy CEO",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating for new and expanded services",
            'objective_id'=>2
        ]);

        //6
        DB::table('actions')->insert([
            'body'=> "Action 1.32: Reach out to customers whose membership has lapsed",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Membership Team",
            'collaborators'=> "IT, Rachael, R&A",
            'status'=> "Completed",
            'success'=> "Increase memberships renewals by 25%",
            'objective_id'=>2
        ]);

        // 7
        DB::table('actions')->insert([
            'body'=> "Action 2.12: Implement a single point of discovery solution for EPL content. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Sharon Karr (CMA)",
            'collaborators'=> "Web Services, IT",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services and content",
            'objective_id'=>3
        ]);

        //8
        DB::table('actions')->insert([
            'body'=> "Action 2.6: Develop an Open Data policy that includes how we will use and share our own data; participate in Edmonton's Open Data community and support data literacy initiatives.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Digital Public Spaces Librarian",
            'collaborators'=> "Adult Programming, DLI, IT",
            'status'=> "Completed",
            'success'=> "Yes",
            'objective_id'=>4
        ]);

        // 9
        DB::table('actions')->insert([
            'body'=> "Action 3.2: Expand creation technology, services  to branches.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, Marketing, FAO",
            'status'=> "IP",
            'success'=> "Yes",
            'objective_id'=>5
        ]);

        // 10
        DB::table('actions')->insert([
            'body'=> "Action 3.12: Review technology needs to provide services and implement strategies to meet them",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, R&A, Discovery",
            'status'=> "IP",
            'success'=> "Yes",
            'objective_id'=>6
        ]);

        // 11
        DB::table('actions')->insert([
            'body'=> "Action 4.6: Complete reviews to ensure ongoing improvement of interlibrary loans, custodial, service point operations, and others.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "",
            'collaborators'=> "A&R",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services",
            'objective_id'=>7
        ]);
    }
}
