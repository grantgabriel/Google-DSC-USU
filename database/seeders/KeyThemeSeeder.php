<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event_id' => '1',
                'key_name' => 'OpenSource'
            ],
            [
                'event_id' => '2',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => '2',
                'key_name' => 'Opening'
            ],
            [
                'event_id' => '3',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => '4',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => '5',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => '6',
                'key_name' => 'Bootcamp'

            ],
            [
                'event_id' => '6',
                'key_name' => 'Conpetition'

            ],
            [
                'event_id' => '7',
                'key_name' => 'Android'
            ],
            [
                'event_id' => '8',
                'key_name' => 'Android'
            ],
            [
                'event_id' => '8',
                'key_name' => 'Quest'
            ],
            
        ];

        // Insert data into the database
        foreach ($events as $event) {
            DB::table('key_themes')->insert($event);
        }
    }
}
