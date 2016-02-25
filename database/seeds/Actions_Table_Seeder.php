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
            'date'=> "January 1st, 2016",
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT, DLI",
            'status'=> "Projects in each of 2014, 2015, 2016",
            'success'=> "Achieve a 90% completion rating; Increase computer usage by 20%",
            'objective_id'=>1
        ]);

        // 2
        DB::table('actions')->insert([
            'body'=> "Action 1.23: Establish a fine-free day to take place every second year",
            'date'=> "January 1st, 2016",
            'lead'=> "Jody Crilly",
            'collaborators'=> "Marketing, Vicky, Deputy CEO (sponsor)",
            'status'=> "Completed",
            'success'=> "Yes",
            'objective_id'=>2
        ]);

        // 3
        DB::table('actions')->insert([
            'body'=> "Action 1.26: Implement lending machines in underserved areas of Edmonton",
            'date'=> "January 1st, 2015",
            'lead'=> "Deputy CEO",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'objective_id'=>2
        ]);

        // 4
        DB::table('actions')->insert([
            'body'=> "Action 2.12: Implement a single point of discovery solution for EPL content. ",
            'date'=> "January 1st, 2015",
            'lead'=> "Sharon Karr (CMA)",
            'collaborators'=> "Web Services, IT",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services and content",
            'objective_id'=>3
        ]);

        // 5
        DB::table('actions')->insert([
            'body'=> "Action 3.2: Expand creation technology, services  to branches.",
            'date'=> "January 1st, 2014",
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, R&A, Discovery",
            'status'=> "IP",
            'success'=> "Yes",
            'objective_id'=>5
        ]);

        // 6
        DB::table('actions')->insert([
            'body'=> "Action 4.6: Complete reviews to ensure ongoing improvement of interlibrary loans, custodial, service point operations, and others.",
            'date'=> "January 1st, 2014",
            'lead'=> "",
            'collaborators'=> "A&R",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services",
            'objective_id'=>7
        ]);
    }
}
