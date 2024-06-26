<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Admin;
use App\Models\Community;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Report;
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
                'email' => 'prasetyo@email.com',
                'username' => 'prasetyo',
                'password' => bcrypt('password1'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'tabuti@mail.com',
                'username' => 'tabuti',
                'password' => bcrypt('password2'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'krisna@mail.com',
                'username' => 'krisna',
                'password' => bcrypt('password3'),
                'phone' => '1234567890',
            ],
        ];
        
        Community::insert($communities);

        $organizer = [
            [
                'email' => 'organizer@mail.com',
                'username' => 'organizer',
                'password' => bcrypt('organizer'),
                'phone' => '1234567890',
            ],
            [
                'email' => 'budiabudi@example.com',
                'username' => 'budiabudi',
                'password' => bcrypt('password1'), 
                'phone' => '9876543210',
            ],
            [
                'email' => 'sitiaisyah@example.com',
                'username' => 'sitiaisyah',
                'password' => bcrypt('password2'), 
                'phone' => '9876543210',
            ],
            [
                'email' => 'supritakupri@example.com',
                'username' => 'supri',
                'password' => bcrypt('password3'), 
                'phone' => '9876543210',
            ],
        ];
        
        Organizer::insert($organizer);        

        $categories = [
            ['category_name' => 'pendidikan'],
            ['category_name' => 'kesehatan'],
            ['category_name' => 'lingkungan'],
            ['category_name' => 'teknologi'],
        ];

        Category::insert($categories);

        $events = [
            [
                'title' => 'Seminar Kesehatan: Pencegahan Penyakit Stroke',
                'description' => 'Seminar ini bertujuan untuk memberikan edukasi kepada masyarakat tentang pentingnya pencegahan penyakit stroke.',
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
                'title' => 'Penghijauan Desa: Menanam Seribu Pohon',
                'description' => 'Program ini bertujuan untuk meningkatkan kualitas lingkungan dengan menanam seribu pohon di desa.',
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
                'title' => 'Workshop Pengolahan Sampah Organik Menjadi Kompos',
                'description' => 'Workshop ini akan mengajarkan teknik pengolahan sampah organik menjadi kompos yang bermanfaat.',
                'event_date' => '2022-08-20',
                'media' => '',
                'event_status' => false,
                'event_category' => '4',
                'event_is_approve' => false,
                'event_approved_date' => null,
                'event_request_date' => '2022-08-13',
                'admin_id' => 1,
                'organizer_id' => 1,
                'community_id' => null,
            ],
            [
                'title' => 'Pelatihan Guru: Metode Pembelajaran Kreatif',
                'description' => 'Pelatihan ini ditujukan untuk para guru dengan fokus pada pengembangan metode pembelajaran kreatif dan inovatif.',
                'event_date' => '2022-08-21',
                'media' => '',
                'event_status' => true,
                'event_category' => '3',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-11',
                'event_request_date' => '2022-08-14',
                'admin_id' => 1,
                'organizer_id' => 2,
                'community_id' => null,
            ],
            [
                'title' => 'Edukasi Digital: Literasi Teknologi untuk Generasi Muda',
                'description' => 'Edukasi ini bertujuan untuk meningkatkan literasi teknologi di kalangan generasi muda.',
                'event_date' => '2022-08-22',
                'media' => '',
                'event_status' => true,
                'event_category' => '1',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-12',
                'event_request_date' => '2022-08-15',
                'admin_id' => 1,
                'organizer_id' => 3,
                'community_id' => null,
            ],
            [
                'title' => 'Bimbingan Belajar Gratis untuk Siswa Sekolah Dasar',
                'description' => 'Program bimbingan belajar ini diselenggarakan untuk membantu siswa sekolah dasar yang membutuhkan dukungan tambahan dalam pelajaran.',
                'event_date' => '2022-08-23',
                'media' => '',
                'event_status' => true,
                'event_category' => '2',
                'event_is_approve' => true,
                'event_approved_date' => '2022-08-13',
                'event_request_date' => '2022-08-16',
                'admin_id' => 1,
                'organizer_id' => 4,
                'community_id' => null,
            ],
        ];

        Event::insert($events);

        $report = [
            [
                'report' => 'Seminar Kesehatan: Pencegahan Penyakit Stroke',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-09',
                'report_approved_date' => '2022-08-10',
                'report_request_date' => '2022-08-12',
                'event_id' => 1,
                'admin_id' => 1,
                'organizer_id' => 3,
            ],
            [
                'report' => 'Penghijauan Desa: Menanam Seribu Pohon',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-12',
                'report_approved_date' => '2022-08-13',
                'report_request_date' => '2022-08-14',
                'event_id' => 2,
                'admin_id' => 1,
                'organizer_id' => 2,
            ],
            [
                'report' => 'Workshop Pengolahan Sampah Organik Menjadi Kompos',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-15',
                'report_approved_date' => '2022-08-16',
                'report_request_date' => '2022-08-17',
                'event_id' => 3,
                'admin_id' => 1,
                'organizer_id' => 1,
            ],
            [
                'report' => 'Pelatihan Guru: Metode Pembelajaran Kreatif',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-20',
                'report_approved_date' => '2022-08-21',
                'report_request_date' => '2022-08-22',
                'event_id' => 3,
                'admin_id' => 1,
                'organizer_id' => 1,
            ],
            [
                'report' => 'Edukasi Digital: Literasi Teknologi untuk Generasi Muda',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-25',
                'report_approved_date' => '2022-08-26',
                'report_request_date' => '2022-08-27',
                'event_id' => 1,
                'admin_id' => 1,
                'organizer_id' => 1,
            ],
            [
                'report' => 'Bimbingan Belajar Gratis untuk Siswa Sekolah Dasar',
                'media' => '',
                'report_is_approved' => true,
                'report_date' => '2022-08-22',
                'report_approved_date' => '2022-08-23', // Corrected key name
                'report_request_date' => '2022-08-24', // Corrected key name
                'event_id' => 3,
                'admin_id' => 1,
                'organizer_id' => 1,
            ]
        ];

        Report::insert($report);
        }
};
