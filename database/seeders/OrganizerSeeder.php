<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Organizer::create([
            'email' => 'organizer@mail.com',
            'username' => 'organizer',
            'password' => Hash::make('organizer'), 
            'phone' => '1234567890',
        ]);

        Organizer::create([
            'email' => 'kambingkechiyl@example.com',
            'username' => 'orgkambingkcl',
            'password' => Hash::make('password1'), 
        ]);
        
        Organizer::create([
            'email' => 'organizerimut@example.com',
            'username' => 'orgimut',
            'password' => Hash::make('password2'), 
            'phone' => '9876543210',
        ]);

        Organizer::create([
            'email' => 'orgjahat@example.com',
            'username' => 'orgjahat',
            'password' => Hash::make('password3'), 
            'phone' => '9876543210',
        ]);
    
    }
}
