<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data seeding untuk tabel 'event'
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
    }
}
