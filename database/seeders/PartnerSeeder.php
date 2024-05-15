<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event_id' => '1',
                'partner_name' => 'BitCoin',
                'partner_img' => 'https://upload.wikimedia.org/wikipedia/commons/c/c5/Bitcoin_logo.svg'
            ],
            [
                'event_id' => '1',
                'partner_name' => 'Pintu',
                'partner_img' => 'https://upload.wikimedia.org/wikipedia/commons/4/40/Pintu_Garasi_Besi_Sliding.jpg'
            ],
            [
                'event_id' => '2',
                'partner_name' => 'Pintu',
                'partner_img' => 'https://upload.wikimedia.org/wikipedia/commons/4/40/Pintu_Garasi_Besi_Sliding.jpg'
            ],
            [
                'event_id' => '8',
                'partner_name' => 'Etherium',
                'partner_img' => 'https://upload.wikimedia.org/wikipedia/commons/6/6f/Ethereum-icon-purple.svg'
            ]
            
        ];

        // Insert data into the database
        foreach ($events as $event) {
            DB::table('partners')->insert($event);
        }
    }

}
