<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RsvpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_id1 = DB::table('events')->where('event_name', 'CodeFest 2024')->value('event_id');
        $event_id2 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp')->value('event_id');
        $event_id3 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 2')->value('event_id');
        $event_id4 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 3')->value('event_id');
        $event_id5 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 4')->value('event_id');
        $event_id6 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 5')->value('event_id');
        $event_id7 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳')->value('event_id');
        $event_id8 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳 Part 2')->value('event_id');

        $user_id1 = DB::table('users')->where('first_name', 'Ibra')->value('user_id');
        $user_id2 = DB::table('users')->where('first_name', 'Rafi')->value('user_id');

        DB::table('rsvps')->insert([
            'event_id' => $event_id1,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id2,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id3,
            'user_id' => $user_id1,
            'attendance_detail' => 'Could Not Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id4,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id5,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id6,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id7,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'survey_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id8,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'survey_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id1,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id2,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id3,
            'user_id' => $user_id2,
            'attendance_detail' => 'Could Not Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id4,
            'user_id' => $user_id2,
            'attendance_detail' => 'Could Not Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id5,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id6,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id7,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'survey_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id8,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'survey_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
