<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => '1',
            'first_name' => 'Grant',
            'last_name' => 'Gabriel',
            'role' => 'Core Team Community & Relations',
            'address' => 'Jl. Dwikora Baru No.19',
            'email' => 'grantgabriel30@gmail.com',
            'pronoun' => 'She/Her',
            'profile_photo' => '',
            'bio' => 'I\'m a software engineer. I love to code and learn new things.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '2',
            'first_name' => 'Alwin',
            'last_name' => 'Liufandy',
            'role' => 'Core Team Community & Relations',
            'address' => 'Jl. Suka Baru No.19',
            'email' => 'alwincollege@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => '',
            'bio' => 'I\'m a fullstack developer. Web development is my passion.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '3',
            'first_name' => 'Ibra',
            'last_name' => 'Rizqy',
            'role' => 'Member',
            'address' => 'Jl. Pondok Surya VI-A No.231C',
            'email' => 'rizqyibra@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => '',
            'bio' => 'I like to learn Human Computer Interaction and User Experience Design.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '4',
            'first_name' => 'Rafi',
            'last_name' => 'Devari',
            'role' => 'Member',
            'address' => 'Jl. Eka Suria No.74',
            'email' => 'rafidevari063@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => '',
            'bio' => 'I\'m handsome and love kids :)',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}