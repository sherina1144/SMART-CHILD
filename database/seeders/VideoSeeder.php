<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        $videos = [
            // --- KATEGORI NUTRISI ---
            [
                'title' => 'Pentingnya Menu Seimbang dan Pencegahan Stunting Sejak Dini',
                'duration' => '15:30',
                'instructor' => 'Dr. Spesialis Anak',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'nutrisi',
                'video_url' => 'https://www.youtube.com/watch?v=example_nutrisi_1',
            ],
            [
                'title' => 'Solusi Jitu Mengatasi Anak Susah Makan (GTM)',
                'duration' => '12:45',
                'instructor' => 'Ahli Gizi Anak',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'nutrisi',
                'video_url' => 'https://www.youtube.com/watch?v=example_nutrisi_2',
            ],

            // --- KATEGORI TUMBUH KEMBANG ---
            [
                'title' => 'Stimulasi Tumbuh Kembang Anak Usia Balita di Rumah',
                'duration' => '20:10',
                'instructor' => 'Psikolog & Praktisi Anak',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'tumbuh kembang',
                'video_url' => 'https://www.youtube.com/watch?v=example_tumbuh_1',
            ],
            [
                'title' => 'Cara Mengatasi Anak Terlambat Bicara (Speech Delay)',
                'duration' => '18:00',
                'instructor' => 'Terapis Wicara Profesional',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'tumbuh kembang',
                'video_url' => 'https://www.youtube.com/watch?v=example_tumbuh_2',
            ],

            // --- KATEGORI KESEHATAN ---
            [
                'title' => 'Pertolongan Pertama pada Anak Demam dan Batuk Pilek',
                'duration' => '14:20',
                'instructor' => 'Dr. Umum / Medis',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'kesehatan',
                'video_url' => 'https://www.youtube.com/watch?v=example_sehat_1',
            ],
            [
                'title' => 'Pentingnya Imunisasi Lengkap untuk Kekebalan Tubuh Anak',
                'duration' => '17:30',
                'instructor' => 'Dokter Spesialis Imunisasi',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'kesehatan',
                'video_url' => 'https://www.youtube.com/watch?v=example_sehat_2',
            ],

            // --- KATEGORI PSIKOLOGI ---
            [
                'title' => 'Mengatasi Emosi & Tantrum pada Anak dengan Pendekatan Positif',
                'duration' => '16:50',
                'instructor' => 'Psikolog Anak',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'psikologi',
                'video_url' => 'https://www.youtube.com/watch?v=example_psiko_1',
            ],
            [
                'title' => 'Cara Berkomunikasi Efektif Agar Anak Mau Mendengarkan',
                'duration' => '14:30',
                'instructor' => 'Family Psychologist',
                'thumbnail' => 'default-thumbnail.jpg',
                'category' => 'psikologi',
                'video_url' => 'https://www.youtube.com/watch?v=example_psiko_2',
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}