<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestroySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('partners')->delete();
        DB::table('surveys')->delete();
        DB::table('key_themes')->delete();
    }
}
