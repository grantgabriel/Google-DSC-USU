<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'event_id' => '1',
                'event_name' => 'CodeFest 2024',

                'description' => 'Welcome to the first kickoff CodeFest event by GDSC USU in collaboration with GDSC UMSU and GDSC Mikroskil! 
                We are excited to announce this festive event to our GDSC members and fellow developers in the community! Prepare yourself for innovation, learning, and great community vibes. This event is held only once a year so dont miss out! 🤩✨🚀',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid',
                'time' => '2024-06-15 09:00:00',
                'type' => 'Hybrid',
                'address' => 'Main Hall, Universitas Prima Indonesia, Jl. Sampul No.3, Sei Putih Bar., Kec. Medan Petisah, Kota Medan, Sumatera Utara 20118, Medan, 20118',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Grant Gabriel Tambunan',
                'speaker_img' => 'https://picsum.photos/200/300',
                'documentation' => 'https://picsum.photos/200/301',
                'publication_status' => 'Published',
                'categories' => 'Machine Learning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '2',
                'event_name' => 'IMILKOM x GDSC USU Mini Bootcamp',

                'description' => 'Game Development and Competitive Programming Mini Bootcamp by IMILKOM x GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid',
                'time' => '2024-06-15 09:00:00',
                'type' => 'In Person',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Wana',
                'speaker_img' => 'https://picsum.photos/200/320',
                'documentation' => 'https://picsum.photos/200/321',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '3',
                'event_name' => 'IMILKOM x GDSC USU Mini Bootcamp 2',

                'description' => 'Part 2 Game Development and Competitive Programming Mini Bootcamp by IMILKOM x GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid','time' => '2024-07-15 09:00:00',
                'type' => 'In Person',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Wana',
                'speaker_img' => 'https://picsum.photos/200/340',
                'documentation' => 'https://picsum.photos/200/326',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '4',
                'event_name' => 'IMILKOM x GDSC USU Mini Bootcamp 3',

                'description' => 'Part 3 Game Development and Competitive Programming Mini Bootcamp by IMILKOM x GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid','time' => '2024-08-15 09:00:00',
                'type' => 'Online',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Wana',
                'speaker_img' => 'https://picsum.photos/200/341',
                'documentation' => 'https://picsum.photos/200/327',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '5',
                'event_name' => 'IMILKOM x GDSC USU Mini Bootcamp 4',

                'description' => 'Part 4 Game Development and Competitive Programming Mini Bootcamp by IMILKOM x GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid','time' => '2024-09-15 09:00:00',
                'type' => 'Online',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Wana',
                'speaker_img' => 'https://picsum.photos/200/342',
                'documentation' => 'https://picsum.photos/200/328',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '6',
                'event_name' => 'IMILKOM x GDSC USU Mini Bootcamp 5',

                'description' => 'Part 5 Game Development and Competitive Programming Mini Bootcamp by IMILKOM x GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid', 'time' => '2024-10-15 09:00:00',
                'type' => 'Hybrid',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Wana',
                'speaker_img' => 'https://picsum.photos/200/345',
                'documentation' => 'https://picsum.photos/200/334',
                'publication_status' => 'Published',
                'categories' => 'Machine Learning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '7',
                'event_name' => 'Building Mobile apps with Kotlin 🤳',

                'description' => 'Welcome to our Mobile Pathway!!
                Its about time for you to learn about programming in the mobile language. This workshop will teach us about Kotlin, the Android go-to programming language! 
                Best of Luck in this pathway and finish your tasks to earn the Mobile Programming certificate from GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid','time' => '2024-1-1 09:00:00',
                'type' => 'Hybrid',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Ibra',
                'speaker_img' => 'https://picsum.photos/200/349',
                'documentation' => 'https://picsum.photos/200/374',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => '8',
                'event_name' => 'Building Mobile apps with Kotlin 🤳 Part 2',

                'description' => '
                Its about time for you to learn about programming in the mobile language. This workshop will teach us about Kotlin, the Android go-to programming language! 
                Best of Luck in this pathway and finish your tasks to earn the Mobile Programming certificate from GDSC USU!',

                'event_banner' => 'https://res.cloudinary.com/startup-grind/image/upload/c_scale,w_2560/c_crop,h_640,w_2560,y_0.0_mul_h_sub_0.0_mul_640/c_crop,h_640,w_2560/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/event_banners/CodeFest.png',
                'event_profile' => 'https://res.cloudinary.com/startup-grind/image/upload/c_fill,w_500,h_500,g_center/c_fill,dpr_2.0,f_auto,g_center,q_auto:good/v1/gcs/platform-data-dsc/events/CodeFest%20Thumb_v5ENeQc.png',
                'event_location' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15927.801608720636!2d98.6527098!3d3.5988387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312fd4e159414d%3A0x2ee9d4c72de475ab!2sUniversitas%20Prima%20Indonesia!5e0!3m2!1sid!2sid!4v1716028210802!5m2!1sid!2sid','time' => '2024-2-1 09:00:00',
                'type' => 'In person',
                'address' => 'Departement of Computer Science, Fasilkom-TI, Universitas Sumatera Utara, No. 3 Jalan Alumni, Kota Medan, 20155 ',
                'resource' => 'https://example.com/machine-learning-conference',
                'speaker_name' => 'Ibra2',
                'speaker_img' => 'https://picsum.photos/200/249',
                'documentation' => 'https://picsum.photos/200/274',
                'publication_status' => 'Published',
                'categories' => 'Android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert data into the database
        foreach ($events as $event) {
            DB::table('events')->insert($event);
        }
    }
}
