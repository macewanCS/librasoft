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

        for ($i = 1; $i <= 25; $i++) {
            if ($i % 4 >= 1) {
                DB::table('notes')->insert([
                    'content' => 'First comment - Hello World!',
                    'user' => 'jwoods',
                    'task_id' => $i,
                    'created_at' => Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
                    'updated_at' => Carbon::createFromDate(2016, 03, 01)->toDateTimeString(),
                ]);
            }

            if ($i % 4 >= 2) {
                DB::table('notes')->insert([
                    'content' => 'Can we get an update please?',
                    'user' => 'lmackenzie',
                    'task_id' => $i,
                    'created_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
                    'updated_at' => Carbon::createFromDate(2016, 01, 28)->toDateTimeString(),
                ]);
            }

            if ($i % 4 >= 3) {
                DB::table('notes')->insert([
                    'content' => 'Nearly complete, how\'s your progress?',
                    'user' => 'Vicky',
                    'task_id' => $i,
                    'created_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
                    'updated_at' => Carbon::createFromDate(2016, 03, 14)->toDateTimeString(),
                ]);
            }
        }
    }
}
