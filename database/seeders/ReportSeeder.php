<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data seeding untuk tabel 'report'
        Report::create([
            'report' => 'Report 1',
            'media' => 'Media 1',
            'report_is_approved' => 'yes', // Status persetujuan laporan
            'report_date' => '2024-06-10', // Tanggal laporan (format: YYYY-MM-DD)
            'report_approved_date' => '2024-06-15', // Tanggal persetujuan laporan (format: YYYY-MM-DD)
            'report_request_date' => '2024-06-05', // Tanggal permintaan laporan (format: YYYY-MM-DD)
            'event_id' => 1, // ID acara terkait
            'admin_id' => 1, // ID admin yang menyetujui laporan
            'organizer_id' => 1, // ID pengatur acara terkait
        ]);

        Report::create([
            'report' => 'Report 2',
            'media' => 'Media 2',
            'report_is_approved' => 'yes',
            'report_date' => '2024-06-15',
            'report_approved_date' => '2024-06-20',
            'report_request_date' => '2024-06-10',
            'event_id' => 2,
            'admin_id' => 2,
            'organizer_id' => 2,
        ]);

        Report::create([
            'report' => 'Report 3',
            'media' => 'Media 3',
            'report_is_approved' => 'yes',
            'report_date' => '2024-06-20',
            'report_approved_date' => '2024-06-25',
            'report_request_date' => '2024-06-15',
            'event_id' => 3,
            'admin_id' => 1,
            'organizer_id' => 1,
        ]);

        Report::create([
            'report' => 'Report 4',
            'media' => 'Media 4',
            'report_is_approved' => 'yes',
            'report_date' => '2024-06-25',
            'report_approved_date' => '2024-06-30',
            'report_request_date' => '2024-06-20',
            'event_id' => 4,
            'admin_id' => 2,
            'organizer_id' => 2,
        ]);
    }
}
