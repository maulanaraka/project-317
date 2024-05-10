<?php

namespace Database\Seeders;

use App\Models\CommunityEvent;
use Illuminate\Database\Seeder;

class ComEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data seeding untuk tabel 'community_event'
        CommunityEvent::create([
            'community_id' => 1, // ID komunitas terkait
            'event_id' => 1, // ID acara terkait
        ]);

        CommunityEvent::create([
            'community_id' => 1,
            'event_id' => 2,
        ]);

        CommunityEvent::create([
            'community_id' => 2,
            'event_id' => 3,
        ]);

        CommunityEvent::create([
            'community_id' => 2,
            'event_id' => 4,
        ]);
    }
}
