<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Admin;
use App\Models\Community;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Uncomment if you have User factory set up
        // User::factory(10)->create();

        Admin::create([
            'email' => 'admin@mail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        Community::create([
            'email' => 'community@mail.com',
            'username' => 'community',
            'password' => bcrypt('community'),
            'phone' => '1234567890',
        ]);

        Community::create([
            'email' => 'cicakbg@email.com',
            'username' => 'cicakngambang',
            'password' => bcrypt('password1'),
            'phone' => '1234567890',
        ]);

        Community::create([
            'email' => 'unicornn@mail.com',
            'username' => 'unicornmanis',
            'password' => bcrypt('password2'),
            'phone' => '1234567890',
        ]);

        Community::create([
            'email' => 'melompat@mail.com',
            'username' => 'kudaloncat',
            'password' => bcrypt('password3'),
            'phone' => '1234567890',
        ]);

        Category::create([
            'category_name' => 'pendidikan'
        ]);
        
        Category::create([
            'category_name' => 'kesehatan'
        ]);

        Category::create([
            'category_name' => 'lingkungan'
        ]);

        Category::create([
            'category_name' => 'teknologi'
        ]);

        // Event::create([
        //     'title' => 'title 1', 
        //     'description' => 'event 1', 
        //     'event_date' => '19/08/2022',
        //     'media' => ' ',
        //     'event_status' => 'waiting for confirmation',
        //     'event_category' => 'pendidikan',
        //     'event_is_approve' => 'yes',
        //     'event_approved_date' => '10/08/2022',
        //     'event_request_date' => '12/08/2022',
        //     'admin_id' => '1',
        //     'organizer_id'=> '1',
        //     'community_id' => Null,
        // ]);

        // Event::create([
        //     'title' => 'title 2', 
        //     'description' => 'event 2', 
        //     'event_date' => '19/08/2022',
        //     'media' => ' ',
        //     'event_status' => 'waiting for confirmation',
        //     'event_category' => 'kesehatan',
        //     'event_is_approve' => 'yes',
        //     'event_approved_date' => '10/08/2022',
        //     'event_request_date' => '12/08/2022',
        //     'admin_id' => '1',
        //     'organizer_id'=> '2',
        //     'community_id' => Null,
        // ]);

        // Event::create([
        //     'title' => 'title 3', 
        //     'description' => 'event 3', 
        //     'event_date' => '19/08/2022',
        //     'media' => ' ',
        //     'event_status' => 'waiting for confirmation',
        //     'event_category' => 'lingkunngan',
        //     'event_is_approve' => 'yes',
        //     'event_approved_date' => '10/08/2022',
        //     'event_request_date' => '12/08/2022',
        //     'admin_id' => '1',
        //     'organizer_id'=> '3',
        //     'community_id' => Null,
        // ]);

        // Event::create([
        //     'title' => 'title 4', 
        //     'description' => 'event 4', 
        //     'event_date' => '19/08/2022',
        //     'media' => ' ',
        //     'event_status' => 'waiting for confirmation',
        //     'event_category' => 'teknologi',
        //     'event_is_approve' => 'yes',
        //     'event_approved_date' => '10/08/2022',
        //     'event_request_date' => '12/08/2022',
        //     'admin_id' => '1',
        //     'organizer_id'=> '4',
        //     'community_id' => Null,
        // ]);

       
        Organizer::create([
            'email' => 'organizer@mail.com',
            'username' => 'organizer',
            'password' => bcrypt('organizer'),
            'phone' => '1234567890',
        ]);

        Organizer::create([
            'email' => 'kambingkechiyl@example.com',
            'username' => 'orgkambingkcl',
            'password' => bcrypt('password1'), 
        ]);
        
        Organizer::create([
            'email' => 'organizerimut@example.com',
            'username' => 'orgimut',
            'password' => bcrypt('password2'), 
            'phone' => '9876543210',
        ]);

        Organizer::create([
            'email' => 'orgjahat@example.com',
            'username' => 'orgjahat',
            'password' => bcrypt('password3'), 
            'phone' => '9876543210',
        ]);


        // Repeat the process for other Organizer creations

        // Repeat the process for other Report creations
    }
}
