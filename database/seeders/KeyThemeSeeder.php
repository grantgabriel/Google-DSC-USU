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
                'event_id' => 'a3qws4erde4d5rftokeydlpdmnuyjhb6nujyrbtyvttbev',
                'key_name' => 'OpenSource'
            ],
            [
                'event_id' => 'a3qws4erde4d5rftokeydlpdmnuyjhb6nujyrbtyvttbevberw6vygt5trd',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => 'a3qws4erde4d5rftokeydlpdmnuyjhb6nujyrbtyvttbevberw6vygt5trd',
                'key_name' => 'Opening'
            ],
            [
                'event_id' => 'a3qws4erde4d5rftokeydlpdmnusyjhb6nujyrbtyvttde3sbevberw6vygt5trd',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6nujyrbtyvttde3dsbevberw6vygt5trd',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6nujyrbtyvttde3dsbevberw6vygt5trdddef',
                'key_name' => 'Bootcamp'
            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6n55ujyrbtyvttde3dsbevberw6vygt5trdddef',
                'key_name' => 'Bootcamp'

            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6n55ujyrbtyvttde3dsbevberw6vygt5trdddef',
                'key_name' => 'Conpetition'

            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6n55ucdcdjyrbtyvttde3dsbevberw6vygt5trdddef',
                'key_name' => 'Android'
            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6n55ujyrbtyvttde3dsbdwceevberw6vygt5trdddef',
                'key_name' => 'Android'
            ],
            [
                'event_id' => 'a3qws4erde4d5ddrftokeydlpdmnuyjhb6n55ujyrbtyvttde3dsbdwceevberw6vygt5trdddef',
                'key_name' => 'Quest'
            ],
            
        ];

        // Insert data into the database
        foreach ($events as $event) {
            DB::table('key_themes')->insert($event);
        }
    }
}
