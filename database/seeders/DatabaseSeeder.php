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

        $communities = [
            [
                'email' => 'community@mail.com',
                'username' => 'community',
                'password' => bcrypt('community'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'cicakbg@email.com',
                'username' => 'cicakngambang',
                'password' => bcrypt('password1'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'unicornn@mail.com',
                'username' => 'unicornmanis',
                'password' => bcrypt('password2'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'melompat@mail.com',
                'username' => 'kudaloncat',
                'password' => bcrypt('password3'),
                'phone' => '1234567890',
            ],
        ];
        
        Community::insert($communities);

        $categories = [
            ['category_name' => 'pendidikan'],
            ['category_name' => 'kesehatan'],
            ['category_name' => 'lingkungan'],
            ['category_name' => 'teknologi'],
        ];

        Category::insert($categories);

        $events = [
            [
                'title' => 'title 3',
                'description' => 'event 3',
                'event_date' => '2022-08-19',
                'media' => '',
                'event_status' => false,
                'event_category' => '2',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-10',
                'event_request_date' => '2022-08-12',
                'admin_id' => 1,
                'organizer_id' => 3,
                'community_id' => Null,
            ],
            [
                'title' => 'title 4',
                'description' => 'event 4',
                'event_date' => '2022-08-19',
                'media' => '',
                'event_status' => false,
                'event_category' => '1',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-10',
                'event_request_date' => '2022-08-12',
                'admin_id' => 1,
                'organizer_id' => 4,
                'community_id' => Null,
            ],
            [
                'title' => 'title 5',
                'description' => 'event 5',
                'event_date' => '2022-08-20',
                'media' => '',
                'event_status' => false,
                'event_category' => '4',
                'event_is_approve' => false,
                'event_approved_date' => null,
                'event_request_date' => '2022-08-13',
                'admin_id' => 1,
                'organizer_id' => 5,
                'community_id' => null,
            ],
            [
                'title' => 'title 6',
                'description' => 'event 6',
                'event_date' => '2022-08-21',
                'media' => '',
                'event_status' => true,
                'event_category' => '3',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-11',
                'event_request_date' => '2022-08-14',
                'admin_id' => 1,
                'organizer_id' => 6,
                'community_id' => null,
            ],
            [
                'title' => 'title 7',
                'description' => 'event 7',
                'event_date' => '2022-08-22',
                'media' => '',
                'event_status' => true,
                'event_category' => '1',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-12',
                'event_request_date' => '2022-08-15',
                'admin_id' => 1,
                'organizer_id' => 7,
                'community_id' => null,
            ],
            [
                'title' => 'title 8',
                'description' => 'event 8',
                'event_date' => '2022-08-23',
                'media' => '',
                'event_status' => true,
                'event_category' => '2',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-13',
                'event_request_date' => '2022-08-16',
                'admin_id' => 1,
                'organizer_id' => 8,
                'community_id' => null,
            ],
        ];

        Event::insert($events);

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
    }
}
