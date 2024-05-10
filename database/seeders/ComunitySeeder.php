<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Community::create([
            'email' => 'community@mail.com',
            'username' => 'community',
            'password' => Hash::make('community'),
            'phone' => '1234567890',
        ]);
        
        Community::create([
            'email' => 'cicakbg@email.com',
            'username' => 'cicakngambang',
            'password' => Hash::make('password1'),
            'phone' => '1234567890',
        ]);
        
        Community::create([
            'email' => 'unicornn@mail.com',
            'username' => 'unicornmanis',
            'password' => Hash::make('password2'),
            'phone' => '1234567890',
        ]);

        Community::create([
            'email' => 'melompat@mail.com',
            'username' => 'kudaloncat',
            'password' => Hash::make('password3'),
            'phone' => '1234567890',
        ]);
    }
}
