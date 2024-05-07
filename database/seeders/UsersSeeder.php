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
            'address' => 'Jl. Dwikora Baru No.19',
            'email' => 'grantgabriel30@gmail.com',
            'pronoun' => 'She/Her',
            'profile_photo' => 'https://res.cloudinary.com/startup-grind/image/upload/c_limit,dpr_2.0,f_auto,g_center,h_1000,q_auto:good/v1/gcs/platform-data-dsc/banners/grant_gabriel_tambunan.png',
            'bio' => 'I\'m a software engineer. I love to code and learn new things.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '2',
            'first_name' => 'Alwin',
            'last_name' => 'Liufandy',
            'address' => 'Jl. Suka Baru No.19',
            'email' => 'alwincollege@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,dpr_3,f_auto,g_face,h_130,q_auto:good,w_130/v1/gcs/platform-data-dsc/avatars/alwin_liufandy_gxmbLG1.JPG',
            'bio' => 'I\'m a fullstack developer. Web development is my passion.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '3',
            'first_name' => 'Ibra',
            'last_name' => 'Rizqy',
            'address' => 'Jl. Pondok Surya VI-A No.231C',
            'email' => 'rizqyibra@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,dpr_3,f_auto,g_face,h_130,q_auto:good,w_130/v1/gcs/platform-data-dsc/avatars/ibra_rizqy.jpg',
            'bio' => 'I like to learn Human Computer Interaction and User Experience Design.',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_id' => '4',
            'first_name' => 'Rafi',
            'last_name' => 'Devari',
            'address' => 'Jl. Eka Suria No.74',
            'email' => 'rafidevari063@gmail.com',
            'pronoun' => 'He/Him',
            'profile_photo' => 'https://media.licdn.com/dms/image/D5603AQGdy9STJd6jYg/profile-displayphoto-shrink_200_200/0/1688313972812?e=2147483647&v=beta&t=EzkbkaVvGNQrNUPYNodhIjJ1FMk0YrSUQeJcjR5Uw60',
            'bio' => 'I\'m handsome and love kids :)',
            'password' => bcrypt('12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $coreId1    = DB::table('users')->where('first_name', 'Grant')->value('user_id');
        $coreId2    = DB::table('users')->where('first_name', 'Alwin')->value('user_id');

        DB::table('cores')->insert([
            'user_id' => $coreId1,
            'division' => 'Community & Relations'
        ]);

        DB::table('cores')->insert([
            'user_id' => $coreId2,
            'division' => 'Community & Relations'
        ]);
    }
}