<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use App\Models\Community;
use App\Models\Event;
use App\Models\CommunityEvent;
use App\Models\Organizer;
use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // Repeat the process for other Community creations

        Event::create([
            'title' => 'Event 1',
            'description' => 'Description for Event 1',
            'event_date' => '2024-05-15',
            'type' => 'Type 1',
            'event_is_approve' => 'yes',
            'event_approved_date' => '2024-05-10',
            'event_request_date' => '2024-05-05',
            'admin_id' => 1,
            'organizer_id' => 1,
        ]);
        
        Event::create([
            'title' => 'Event 2',
            'description' => 'Description for Event 2',
            'event_date' => '2024-05-20',
            'type' => 'Type 2',
            'event_is_approve' => 'yes',
            'event_approved_date' => '2024-05-12',
            'event_request_date' => '2024-05-07',
            'admin_id' => 2,
            'organizer_id' => 2,
        ]);

        Event::create([
            'title' => 'Event 3',
            'description' => 'Description for Event 3',
            'event_date' => '2024-05-25',
            'type' => 'Type 3',
            'event_is_approve' => 'yes',
            'event_approved_date' => '2024-05-14',
            'event_request_date' => '2024-05-09',
            'admin_id' => 1,
            'organizer_id' => 1,
        ]);

        Event::create([
            'title' => 'Event 4',
            'description' => 'Description for Event 4',
            'event_date' => '2024-05-30',
            'type' => 'Type 4',
            'event_is_approve' => 'yes',
            'event_approved_date' => '2024-05-16',
            'event_request_date' => '2024-05-11',
            'admin_id' => 2,
            'organizer_id' => 2,
        ]);
            // Add other fields here

        // Repeat the process for other Event creations

        Category::create([
            'community_name' => 'pendidikan',
        ]);

        Category::create([
            'community_name' => 'kesehatan',
        ]);

        Category::create([
            'community_name' => 'lingkungan',
        ]);

        Category::create([
            'community_name' => 'teknologi',
        ]);

        // Repeat the process for other CommunityEvent creations

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
