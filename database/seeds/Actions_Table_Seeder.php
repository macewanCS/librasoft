<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Actions_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 IT
        DB::table('actions')->insert([
            'item' => "1.13",
            'body'=> "Review public computing needs and develop strategies to meet those needs",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT, DLI",
            'status'=> "Ongoing",
            'success'=> "Achieve a 90% completion rating; Increase computer usage by 20%",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>1
        ]);

        // 2 IT
        DB::table('actions')->insert([
            'item' => "1.23",
            'body'=> "Establish a fine-free day to take place every second year",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Jody Crilly",
            'collaborators'=> "Marketing, Vicky, Deputy CEO (sponsor)",
            'status'=> "Completed",
            'success'=> "Yes",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>2
        ]);

        //3 IT
        DB::table('actions')->insert([
            'item' => "1.25",
            'body'=> "Extend literacy van services to underserved communities in Edmonton and surrounding areas.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Elaine Jones",
            'collaborators'=> "FAO, Marketing",
            'status'=> "Service is currently at 50%; anticipate 4 vans and full staffing complement fully operational by fall of 2016",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>2
        ]);

        // 4 IT
        DB::table('actions')->insert([
            'item' => "1.26",
            'body'=> "Implement lending machines in underserved areas of Edmonton",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Deputy CEO",
            'collaborators'=> "Vicky",
            'status'=> "Completed",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>2
        ]);

        //5 IT
        DB::table('actions')->insert([
            'item' => "1.28",
            'body'=> "Design new eplGO spaces with a greater focus on digital literacy services and with media spaces for underserved communities. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Deputy CEO",
            'collaborators'=> "",
            'status'=> "In progress",
            'success'=> "Achieve a 90% satisfaction rating for new and expanded services",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>2
        ]);

        //6 IT
        DB::table('actions')->insert([
            'item' => "1.32",
            'body'=> "Reach out to customers whose membership has lapsed",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Membership Team",
            'collaborators'=> "IT, Rachael, R&A",
            'status'=> "Completed",
            'success'=> "Increase memberships renewals by 25%",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>2
        ]);

        // 7 IT
        DB::table('actions')->insert([
            'item' => "2.12",
            'body'=> "Implement a single point of discovery solution for EPL content. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Sharon Karr (CMA)",
            'collaborators'=> "Web Services, IT",
            'status'=> "In progress",
            'success'=> "Achieve a 90% satisfaction rating with services and content",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>3
        ]);

        //8 IT
        DB::table('actions')->insert([
            'item' => "2.6",
            'body'=> "Develop an Open Data policy that helper how we will use and share our own data; participate in Edmonton's Open Data community and support data literacy initiatives.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Digital Public Spaces Librarian",
            'collaborators'=> "Adult Programming, DLI, IT",
            'status'=> "Completed",
            'success'=> "Yes",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>4
        ]);

        // 9 IT
        DB::table('actions')->insert([
            'item' => "3.2",
            'body'=> "Expand creation technology, services  to branches.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, Marketing, FAO",
            'status'=> "In progress",
            'success'=> "Yes",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>5
        ]);

        // 10 IT
        DB::table('actions')->insert([
            'item' => "3.12",
            'body'=> "Review technology needs to provide services and implement strategies to meet them",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, R&A, Discovery",
            'status'=> "In progress",
            'success'=> "Yes",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>6
        ]);

        // 11 IT
        DB::table('actions')->insert([
            'item' => "4.6",
            'body'=> "Complete reviews to ensure ongoing improvement of interlibrary loans, custodial, service point operations, and others.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'owner'=>"IT",
            'lead'=> "",
            'collaborators'=> "A&R",
            'status'=> "Completed",
            'success'=> "Achieve a 90% satisfaction rating with services",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>7
        ]);

        // 12 Events team
        DB::table('actions')->insert([
            'item' => "1.1",
            'body'=> "Host EPL Day celebrations at all branches on March 13, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 13)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "L Mackenzie, J McPhee",
            'collaborators'=> "Marketing, Purchasing, All branches",
            'status'=> "In progress",
            'success'=> "Increase in customer visits year over year",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>8
        ]);

        // 13 Events team
        DB::table('actions')->insert([
            'item' => "1.2",
            'body'=> "Evaluate the 2016 event and create a proposal for 2017 by November 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 11, 1)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "L Mackenzie, J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>8
        ]);

        // 12 Events team
        DB::table('actions')->insert([
            'item' => "2.1",
            'body'=> "Live stream two forward thinking speaker series events in 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 12, 1)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing, ITS, DLI",
            'status'=> "In progress",
            'success'=> "Over 500 people watching live and 5000 video hits",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>9
        ]);

        // 13 Events team
        DB::table('actions')->insert([
            'item' => "3.1",
            'body'=> "Host a guest speaker during Freedom to Read Weak related to intellectual freedom",
            'date'=> \Carbon\Carbon::createFromDate(2016, 2, 25)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J Woods",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "In progress",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 14 Events team
        DB::table('actions')->insert([
            'item' => "3.2",
            'body'=> "Host a guest speaker on LTGBQ rights and awareness by September 15, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 1, 5)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "Events person",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "Completed",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 15 Events team
        DB::table('actions')->insert([
            'item' => "3.3",
            'body'=> "Host an Alberta mayors forum with Mayor Nenshi and Mayor Iveson by October 31, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 10, 31)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "S Foremski",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "In progress",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 16 Events team
        DB::table('actions')->insert([
            'item' => "3.4",
            'body'=> "Host a guest speaker in partnership with the Alberta Real Estate Board by June 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 6, 30)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "B Crittenden",
            'collaborators'=> "Marketing, Fund Development, Volunteers",
            'status'=> "Completed",
            'success'=> "Sold out event, full venue",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 17 Events team
        DB::table('actions')->insert([
            'item' => "3.5",
            'body'=> "Host Reza Aslan to speak on confronting islamaphobia on May 18, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 5, 18)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 18 Events team
        DB::table('actions')->insert([
            'item' => "3.6",
            'body'=> "Manage ongoing list of potential speakers and partnerships",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "S Foremski, Events person",
            'collaborators'=> "Marketing",
            'status'=> "Ongoing",
            'success'=> "",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 19 Events team
        DB::table('actions')->insert([
            'item' => "3.7",
            'body'=> "Finalize 2017 bookings by September 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 9, 1)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "Bookings complete by September 2016",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 20 Events team
        DB::table('actions')->insert([
            'item' => "3.8",
            'body'=> "Host a guest speaker during Freedom to Read Weak related to intellectual freedom",
            'date'=> \Carbon\Carbon::createFromDate(2016, 5, 1)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "Budget complete by May 2016",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>10
        ]);

        // 21 Events team
        DB::table('actions')->insert([
            'item' => "4.1",
            'body'=> "Obtain $10,000 in shared cost partnerships for 2016 events",
            'date'=> \Carbon\Carbon::createFromDate(2016, 12, 1)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "$10,000 in shared cost partnerships",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>11
        ]);

        // 22 Events team
        DB::table('actions')->insert([
            'item' => "4.2",
            'body'=> "Create best practice document around event sharing and cost sharing with partner
            organizations",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 31)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "Documents in place by Feb 29, 2016 and uptake from potential partners",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>11
        ]);

        // 23 Events team
        DB::table('actions')->insert([
            'item' => "5.1",
            'body'=> "Obtain $40,000 in sponsorships through the FTSS in 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 31)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "$40,000 in event sponsorships",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>12
        ]);

        // 24 Events team
        DB::table('actions')->insert([
            'item' => "6.1",
            'body'=> "Complete a request by August 1, 2016 for Bill Gates to speak at EPL at no cost
            (travel fees excluded)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 8, 31)->toDateTimeString(),
            'owner'=>"Events Team",
            'lead'=> "J McPhee, B Crittenden",
            'collaborators'=> "Marketing",
            'status'=> "In progress",
            'success'=> "Successful acquisition of Bill Gates as speaker",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'objective_id'=>13
        ]);


    }
}
