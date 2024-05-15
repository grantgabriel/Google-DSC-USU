<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_id1 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳 Part 2')->value('event_id');
        $event_id2 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 5')->value('event_id');

        $user_id1 = DB::table('users')->where('first_name', 'Ibra')->value('user_id');
        $user_id2 = DB::table('users')->where('first_name', 'Rafi')->value('user_id');
        
        DB::table('submissions')->insert([
            'user_id' => $user_id1,
            'event_id' => $event_id1,
            'submission' => 'https://docs.google.com/document/d/1B5N-JClYTrzo2-WgFum5DkZVFrypt9p-7cniNNknV-c/edit?usp=sharing',
            'score' => '90',
        ]);

        DB::table('submissions')->insert([
            'user_id' => $user_id1,
            'event_id' => $event_id2,
            'submission' => 'https://docs.google.com/document/d/1s9wkhnTCElhKB17pPhJA02S81MBucQpsGlB-HoNdc2w/edit?usp=sharing',
            'score' => '100',
        ]);

        DB::table('submissions')->insert([
            'user_id' => $user_id2,
            'event_id' => $event_id1,
            'submission' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'score' => '0',
        ]);

        DB::table('submissions')->insert([
            'user_id' => $user_id2,
            'event_id' => $event_id2,
            'submission' => 'https://docs.google.com/document/d/1qNq0voOwMP-H6gM-b3pKV2YbbnSD1XtKDGcwQ0uFNsM/edit?usp=drive_link',
            'score' => '50',
        ]);
        
    }
}
