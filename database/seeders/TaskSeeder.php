<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_id1 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳 Part 2')->value('event_id');
        $event_id2 = DB::table('events')->where('event_name', 'IMILKOM x GDSC USU Mini Bootcamp 5')->value('event_id');
        
        DB::table('tasks')->insert([
            'event_id' => $event_id1,
            'task_link' => 'https://drive.google.com/drive/folders/15lS-5ohLQ75SpdqwBQQj4i5dh7K-mcOZ?usp=sharing',
            'deadline' => '2024-05-022',
        ]);

        DB::table('tasks')->insert([
            'event_id' => $event_id2,
            'task_link' => 'https://drive.google.com/drive/folders/1OYNQar39weh41TdS_oP-N3ClTqN9qUBc?usp=sharing',
            'deadline' => '2024-05-08',
        ]);
    }
}
