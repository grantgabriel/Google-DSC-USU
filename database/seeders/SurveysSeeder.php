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
            'review' => 'A smooth workshop',
            'speaker_rating' => '5',
            'suggestion' => 'I think they should provide more time for the workshop',
        ]);

        DB::table('surveys')->insert([
            'survey_id' => '2',
            'rating' => '3',
            'review' => 'A decent workshop',
            'speaker_rating' => '2',
            'suggestion' => 'I hope the speaker can explain more clearly',
        ]);

        DB::table('surveys')->insert([
            'survey_id' => '3',
            'rating' => '2',
            'review' => 'This workshop is very boring',
            'speaker_rating' => '1',
            'suggestion' => 'I hope the speaker can make the workshop more interesting',
        ]);

        DB::table('surveys')->insert([
            'survey_id' => '4',
            'rating' => '5',
            'review' => 'This is a amazing workshop',
            'speaker_rating' => '5',
            'suggestion' => 'Nothing to suggest, everything is perfect!',
        ]);

    }
}
