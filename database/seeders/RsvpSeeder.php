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
            'rating' => '4',
            'review' => 'A smooth workshop',
            'speaker_rating' => '5',
            'suggestion' => 'I think they should provide more time for the workshop',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id8,
            'user_id' => $user_id1,
            'attendance_detail' => 'Attend',
            'rating' => '5',
            'review' => 'This is a amazing workshop',
            'speaker_rating' => '5',
            'suggestion' => 'Nothing to suggest, everything is perfect!',
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
            'rating' => '3',
            'review' => 'A decent workshop',
            'speaker_rating' => '2',
            'suggestion' => 'I hope the speaker can explain more clearly',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('rsvps')->insert([
            'event_id' => $event_id8,
            'user_id' => $user_id2,
            'attendance_detail' => 'Attend',
            'rating' => '2',
            'review' => 'This workshop is very boring',
            'speaker_rating' => '1',
            'suggestion' => 'I hope the speaker can make the workshop more interesting',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
