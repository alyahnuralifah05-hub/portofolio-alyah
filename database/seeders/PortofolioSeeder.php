<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kosongkan tabel projects terlebih dahulu agar tidak terjadi duplikasi data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Project::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Masukkan data proyek & karya utama Alyah Nur Alifah
        $projects = [
            [
                'title'        => 'Analisis Sentimen PLN Mobile dengan Naive Bayes',
                'category'     => 'Data Science & Machine Learning',
                'problem_goal' => 'Menganalisis ulasan pengguna aplikasi PLN Mobile di Google Play Store untuk mengevaluasi tingkat kepuasan dan persepsi publik.',
                'role'         => 'Lead Data Researcher — Ekstraksi data, preprocessing teks, klasifikasi algoritma Naive Bayes, dan penyusunan naskah riset.',
                'result'       => 'Menghasilkan akurasi model lebih dari 88% dan hasil riset berhasil disalin serta dikirimkan ke Jurnal Komputer dan Teknologi.',
                'image'        => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Sistem Pemantauan Suhu & Kontrol Otomatis ESP32',
                'category'     => 'Internet of Things (IoT)',
                'problem_goal' => 'Otomasi pembacaan suhu dan kelembaban lingkungan secara terintegrasi untuk mencegah kelalaian pemantauan perangkat server.',
                'role'         => 'IoT Hardware & Firmware Engineer — Pemetaan pin mikrokontroler ESP32, sensor DHT11, relay, dan integrasi Blynk Cloud.',
                'result'       => 'Perangkat beroperasi secara real-time dengan latency pembacaan ke cloud di bawah 1 detik serta indikator LCD otomatis.',
                'image'        => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Audit Infrastruktur Kerusakan Fasilitas Berbasis Metadata Foto',
                'category'     => 'Web & Mobile System',
                'problem_goal' => 'Memetakan titik lokasi kerusakan fasilitas publik secara akurat memanfaatkan crowdsourcing data foto masyarakat.',
                'role'         => 'Fullstack Developer & System Architect — Ekstraksi EXIF metadata foto digital dan pemetaan koordinat lokasi.',
                'result'       => 'Sistem berhasil mengekstrak koordinat GPS dan timestamp foto secara otomatis untuk validasi laporan kerusakan.',
                'image'        => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Sistem Manajemen Transportasi Logistik Berbasis Web',
                'category'     => 'Web Development',
                'problem_goal' => 'Digitalisasi alur operasional armada transportasi dan pengelolaan data logistik kendaraan secara terpusat.',
                'role'         => 'Backend Developer — Merancang arsitektur basis data, pengisian skema relasi, dan integrasi RESTful API.',
                'result'       => 'Mempercepat proses pencatatan dan estimasi keberangkatan armada hingga 40%.',
                'image'        => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ],
            [
                'title'        => 'Aplikasi Web Portofolio Personal Laravel 8',
                'category'     => 'Fullstack Web Development',
                'problem_goal' => 'Membangun platform portofolio digital yang dinamis, responsif, dan elegan untuk merepresentasikan hasil karya.',
                'role'         => 'Fullstack Developer — Merancang template Tailwind CSS, integrasi database MySQL, dan konfigurasi environment.',
                'result'       => 'Website portofolio yang responsif, berkinerja cepat, dan terintegrasi penuh dengan basis data.',
                'image'        => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=800&auto=format&fit=crop&q=80',
                'link'         => 'https://github.com/alyahnuralifah05-hub',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}