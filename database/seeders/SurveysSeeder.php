<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('surveys')->insert([
            'survey_id' => '1',
            'rating' => '4',
            'review' => 'I like this speaker so much',
            'speaker_rating' => '5',
            'suggestion' => 'I hope the speaker can give more examples',
        ]);

        DB::table('surveys')->insert([
            'survey_id' => '2',
            'rating' => '3',
            'review' => 'I didn\'t understand the speaker\'s explanation',
            'speaker_rating' => '2',
            'suggestion' => 'I hope the speaker can explain more clearly',
        ]);

    }
}
