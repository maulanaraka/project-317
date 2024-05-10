<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data seeding untuk tabel 'admin'
        Admin::create([
            'email' => 'admin@mail.com',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

}
}