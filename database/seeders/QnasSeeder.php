<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QnasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_id1 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳')->value('event_id');
        $event_id2 = DB::table('events')->where('event_name', 'Building Mobile apps with Kotlin 🤳 Part 2')->value('event_id');

        DB::table('qnas')->insert([
            'event_id' => $event_id1,
            'question' => 'Is kotlin better for android development than java?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id1,
            'question' => 'Where can i find reference for kotlin?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id1,
            'question' => 'What is the difference between kotlin and java?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id1,
            'question' => 'Why should i learn kotlin?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id2,
            'question' => 'What framework is best for android development?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id2,
            'question' => 'Why kotlin did not use semicolon?',
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        DB::table('qnas')->insert([
            'event_id' => $event_id2,
            'question' => 'Is there any other IDE that can be used for kotlin development?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
