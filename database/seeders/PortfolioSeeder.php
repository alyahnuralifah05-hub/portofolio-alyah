<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Project::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $projects = [
            [
                'title'        => 'Analisis Sentimen PLN Mobile dengan Naive Bayes',
                'category'     => 'Data Science & Machine Learning',
                'problem_goal' => 'Menganalisis ulasan pengguna aplikasi PLN Mobile di Google Play Store untuk mengevaluasi tingkat kepuasan publik.',
                'role'         => 'Lead Data Researcher — Ekstraksi data, preprocessing teks, dan klasifikasi Naive Bayes.',
                'result'       => 'Menghasilkan akurasi model lebih dari 88% dan hasil riset disajikan pada Jurnal Komputer dan Teknologi.',
                'image'        => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Sistem Pemantauan Suhu & Kontrol Otomatis ESP32',
                'category'     => 'Internet of Things (IoT)',
                'problem_goal' => 'Otomasi pembacaan suhu dan kelembaban lingkungan untuk pemantauan perangkat server.',
                'role'         => 'IoT Engineer — Pemetaan pin ESP32, sensor DHT11, relay, dan integrasi Blynk Cloud.',
                'result'       => 'Perangkat beroperasi secara real-time dengan latency pembacaan di bawah 1 detik.',
                'image'        => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Audit Infrastruktur Kerusakan Fasilitas Berbasis Metadata Foto',
                'category'     => 'Web & Mobile System',
                'problem_goal' => 'Memetakan titik lokasi kerusakan fasilitas publik menggunakan data foto dari masyarakat.',
                'role'         => 'Fullstack Developer — Ekstraksi EXIF metadata foto digital dan pemetaan koordinat lokasi.',
                'result'       => 'Sistem berhasil mengekstrak koordinat GPS dan timestamp foto secara otomatis.',
                'image'        => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Sistem Manajemen Transportasi Logistik Berbasis Web',
                'category'     => 'Web Development',
                'problem_goal' => 'Digitalisasi alur operasional armada transportasi dan pengelolaan data logistik.',
                'role'         => 'Backend Developer — Merancang arsitektur basis data dan RESTful API.',
                'result'       => 'Mempercepat proses pencatatan dan estimasi keberangkatan armada hingga 40%.',
                'image'        => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Aplikasi Web Portofolio Personal Laravel 8',
                'category'     => 'Fullstack Web Development',
                'problem_goal' => 'Membangun platform portofolio digital yang dinamis dan responsif.',
                'role'         => 'Fullstack Developer — Merancang template Tailwind CSS dan integrasi database MySQL.',
                'result'       => 'Website portofolio yang responsif dan terintegrasi penuh dengan basis data.',
                'image'        => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}