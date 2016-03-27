<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Note;
use Carbon\Carbon;

class Notes_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('notes')->insert([
            'content' => 'Nearly complete finsihed refactoring some of the data pages, how\'s your progress?',
            'user' => 'Vicky',
            'task_id' => 1,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'About half way done upgrading LibOnline to the latest version',
            'user' => 'Michael Doe',
            'task_id' => 2,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Work is goinf slow with the wireless printing',
            'user' => 'John Doe',
            'task_id' => 3,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Investigate and prepare to replace LibOnline is all done.',
            'user' => 'Vicky',
            'task_id' => 4,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'We have finished Investigating options for new customer technology',
            'user' => 'Vicky',
            'task_id' => 5,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'We have investigated to improved the service options with WiFi',
            'user' => 'Luc Doe',
            'task_id' => 6,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Added browser plugins such as Web of Trust to about half the computers',
            'user' => 'Michael Doe',
            'task_id' => 7,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Nearly complete finished refactoring some of the data pages, how\'s your progress?',
            'user' => 'Vicky',
            'task_id' => 8,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Looked at a few options for a literacy van',
            'user' => 'Vicky',
            'task_id' => 9,
            'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'I have finished implementing the approved recommendations',
            'user' => 'Vicky',
            'task_id' => 10,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Did some planning for eplGo with CMA.',
            'user' => 'Vicky',
            'task_id' => 11,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Liase with Sirsi Dynix to support CMA\'s Single Sign On is finished!',
            'user' => 'Andrew Nisbet',
            'task_id' => 12,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Released some more EPL open data to the public',
            'user' => 'Alex Carruthers',
            'task_id' => 13,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Purchased hardware for mini-makerspaces',
            'user' => 'Vicky',
            'task_id' => 14,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Acquired some iPads for mini-makerspaces',
            'user' => 'Vicky',
            'task_id' => 15,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Acquired a couple of laptops for mini-makerspaces',
            'user' => 'Robin Doe',
            'task_id' => 16,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Purchased peripherals',
            'user' => 'Khalil Doe',
            'task_id' => 17,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Finished',
            'user' => 'Vicky',
            'task_id' => 18,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Started looking at iPad kits',
            'user' => 'Khalil Doe',
            'task_id' => 19,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'This is now completed',
            'user' => 'Vicky',
            'task_id' => 20,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Can we get an update please?',
            'user' => 'lmackenzie',
            'task_id' => 21,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Took a look on how were going to stabilize the display board environment ',
            'user' => 'John Doe',
            'task_id' => 22,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Looked at few promising options',
            'user' => 'Vicky',
            'task_id' => 23,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'This is now finsihed',
            'user' => 'Vicky',
            'task_id' => 24,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

        DB::table('notes')->insert([
            'content' => 'Can we get an update please?',
            'user' => 'Jamie Doe',
            'task_id' => 25,
            'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
            'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
        ]);

    }
}
