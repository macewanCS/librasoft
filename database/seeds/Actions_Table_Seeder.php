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
        // 1 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.13: Review public computing needs and develop strategies to meet those needs",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Vicky Varga",
            'collaborators'=> "IT, DLI",
            'status'=> "Projects in each of 2014, 2015, 2016",
            'success'=> "Achieve a 90% completion rating; Increase computer usage by 20%",
            'objective_id'=>1
        ]);

        // 2 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.23: Establish a fine-free day to take place every second year",
            'date'=> \Carbon\Carbon::createFromDate(2016, 01, 01)->toDateTimeString(),
            'lead'=> "Jody Crilly",
            'collaborators'=> "Marketing, Vicky, Deputy CEO (sponsor)",
            'status'=> "Completed",
            'success'=> "Yes",
            'objective_id'=>2
        ]);

        //3 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.25: Extend literacy van services to underserved communities in Edmonton and surrounding areas.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Elaine Jones",
            'collaborators'=> "FAO, Marketing",
            'status'=> "Service is currently at 50%; anticipate 4 vans and full staffing complement fully operational by fall of 2016",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'objective_id'=>2
        ]);

        // 4 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.26: Implement lending machines in underserved areas of Edmonton",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Deputy CEO",
            'collaborators'=> "Vicky",
            'status'=> "",
            'success'=> "Increased use and knowledge of EPL services in underserved communities",
            'objective_id'=>2
        ]);

        //5 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.28: Design new eplGO spaces with a greater focus on digital literacy services and with media spaces for underserved communities. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Deputy CEO",
            'collaborators'=> "",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating for new and expanded services",
            'objective_id'=>2
        ]);

        //6 IT
        DB::table('actions')->insert([
            'body'=> "Action 1.32: Reach out to customers whose membership has lapsed",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Membership Team",
            'collaborators'=> "IT, Rachael, R&A",
            'status'=> "Completed",
            'success'=> "Increase memberships renewals by 25%",
            'objective_id'=>2
        ]);

        // 7 IT
        DB::table('actions')->insert([
            'body'=> "Action 2.12: Implement a single point of discovery solution for EPL content. ",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Sharon Karr (CMA)",
            'collaborators'=> "Web Services, IT",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services and content",
            'objective_id'=>3
        ]);

        //8 IT
        DB::table('actions')->insert([
            'body'=> "Action 2.6: Develop an Open Data policy that includes how we will use and share our own data; participate in Edmonton's Open Data community and support data literacy initiatives.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Digital Public Spaces Librarian",
            'collaborators'=> "Adult Programming, DLI, IT",
            'status'=> "Completed",
            'success'=> "Yes",
            'objective_id'=>4
        ]);

        // 9 IT
        DB::table('actions')->insert([
            'body'=> "Action 3.2: Expand creation technology, services  to branches.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, Marketing, FAO",
            'status'=> "IP",
            'success'=> "Yes",
            'objective_id'=>5
        ]);

        // 10 IT
        DB::table('actions')->insert([
            'body'=> "Action 3.12: Review technology needs to provide services and implement strategies to meet them",
            'date'=> \Carbon\Carbon::createFromDate(2015, 01, 01)->toDateTimeString(),
            'lead'=> "Peter Schoenberg",
            'collaborators'=> "IT, R&A, Discovery",
            'status'=> "IP",
            'success'=> "Yes",
            'objective_id'=>6
        ]);

        // 11 IT
        DB::table('actions')->insert([
            'body'=> "Action 4.6: Complete reviews to ensure ongoing improvement of interlibrary loans, custodial, service point operations, and others.",
            'date'=> \Carbon\Carbon::createFromDate(2014, 01, 01)->toDateTimeString(),
            'lead'=> "",
            'collaborators'=> "A&R",
            'status'=> "",
            'success'=> "Achieve a 90% satisfaction rating with services",
            'objective_id'=>7
        ]);

        // 12 Events team
        DB::table('actions')->insert([
            'body'=> "Action 1.1: Host EPL Day celebrations at all branches on March 13, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 13)->toDateTimeString(),
            'lead'=> "L Mackenzie, J McPhee",
            'collaborators'=> "Marketing, Purchasing, All branches",
            'status'=> "",
            'success'=> "Increase in customer visits year over year",
            'objective_id'=>8
        ]);

        // 13 Events team
        DB::table('actions')->insert([
            'body'=> "Action 1.2: Evaluate the 2016 event and create a proposal for 2017 by November 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 11, 1)->toDateTimeString(),
            'lead'=> "L Mackenzie, J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "",
            'objective_id'=>8
        ]);

        // 12 Events team
        DB::table('actions')->insert([
            'body'=> "Action 2.1: Live stream two forward thinking speaker series events in 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 12, 1)->toDateTimeString(),
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing, ITS, DLI",
            'status'=> "",
            'success'=> "Over 500 people watching live and 5000 video hits",
            'objective_id'=>9
        ]);

        // 13 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.1: Host a guest speaker during Freedom to Read Weak related to intellectual freedom",
            'date'=> \Carbon\Carbon::createFromDate(2016, 2, 25)->toDateTimeString(),
            'lead'=> "J Woods",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'objective_id'=>10
        ]);

        // 14 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.2: Host a guest speaker on LTGBQ rights and awareness by September 15, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 1, 5)->toDateTimeString(),
            'lead'=> "Events person",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'objective_id'=>10
        ]);

        // 15 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.3: Host an Alberta mayors forum with Mayor Nenshi and Mayor Iveson by October 31, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 10, 31)->toDateTimeString(),
            'lead'=> "S Foremski",
            'collaborators'=> "Marketing, Adult Services, Fund Development, Volunteers",
            'status'=> "",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'objective_id'=>10
        ]);

        // 16 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.4: Host a guest speaker in partnership with the Alberta Real Estate Board by June 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 6, 30)->toDateTimeString(),
            'lead'=> "B Crittenden",
            'collaborators'=> "Marketing, Fund Development, Volunteers",
            'status'=> "",
            'success'=> "Sold out event, full venue",
            'objective_id'=>10
        ]);

        // 17 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.5: Host Reza Aslan to speak on confronting islamaphobia on May 18, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 5, 18)->toDateTimeString(),
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "Sold out event, full venue and 100% sell through of fund development seats",
            'objective_id'=>10
        ]);

        // 18 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.6: Manage ongoing list of potential speakers and partnerships",
            'date'=> "Ongoing",
            'lead'=> "S Foremski, Events person",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "",
            'objective_id'=>10
        ]);

        // 19 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.7: Finalize 2017 bookings by September 30, 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 9, 1)->toDateTimeString(),
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "Bookings complete by September 2016",
            'objective_id'=>10
        ]);

        // 20 Events team
        DB::table('actions')->insert([
            'body'=> "Action 3.8: Host a guest speaker during Freedom to Read Weak related to intellectual freedom",
            'date'=> \Carbon\Carbon::createFromDate(2016, 5, 1)->toDateTimeString(),
            'lead'=> "J McPhee",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "Budget complete by May 2016",
            'objective_id'=>10
        ]);

        // 21 Events team
        DB::table('actions')->insert([
            'body'=> "Action 4.1: Obtain $10,000 in shared cost partnerships for 2016 events",
            'date'=> \Carbon\Carbon::createFromDate(2016, 12, 1)->toDateTimeString(),
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "$10,000 in shared cost partnerships",
            'objective_id'=>11
        ]);

        // 22 Events team
        DB::table('actions')->insert([
            'body'=> "Action 4.2: Create best practice document around event sharing and cost sharing with partner
            organizations",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 31)->toDateTimeString(),
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "Documents in place by Feb 29, 2016 and uptake from potential partners",
            'objective_id'=>11
        ]);

        // 23 Events team
        DB::table('actions')->insert([
            'body'=> "Action 5.1: Obtain $40,000 in sponsorships through the FTSS in 2016",
            'date'=> \Carbon\Carbon::createFromDate(2016, 3, 31)->toDateTimeString(),
            'lead'=> "Events person, E Stuebing",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "$40,000 in event sponsorships",
            'objective_id'=>12
        ]);

        // 24 Events team
        DB::table('actions')->insert([
            'body'=> "Action 6.1: Complete a request by August 1, 2016 for Bill Gates to speak at EPL at no cost
            (travel fees excluded)",
            'date'=> \Carbon\Carbon::createFromDate(2016, 8, 31)->toDateTimeString(),
            'lead'=> "J McPhee, B Crittenden",
            'collaborators'=> "Marketing",
            'status'=> "",
            'success'=> "Successful acquiston of Bill Gates as speaker",
            'objective_id'=>13
        ]);


    }
}
