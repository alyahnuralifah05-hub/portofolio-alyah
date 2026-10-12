<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Mahasiswa Teknik Komputer',
            'category' => 'Data Mining & Machine Learning',
            'description' => 'Penelitian dan analisis sentimen ulasan pengguna Google Play Store menggunakan metode Naive Bayes.',
            'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&auto=format&fit=crop&q=80',
            'link' => '#'
        ]);

        Project::create([
            'title' => 'Sistem Kontrol Suhu Otomatis ESP32',
            'category' => 'Internet of Things (IoT)',
            'description' => 'Sistem pemantauan dan kontrol suhu otomatis berbasis mikrokontroler ESP32, sensor DHT11, dan integrasi Blynk Cloud.',
            'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&auto=format&fit=crop&q=80',
            'link' => '#'
        ]);

        Project::create([
            'title' => 'Web-Based Transportation Management System',
            'category' => 'Web Development',
            'description' => 'Perancangan dan pengembangan sistem manajemen transportasi berbasis cloud dan integrasi sistem modern.',
            'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&auto=format&fit=crop&q=80',
            'link' => '#'
        ]);
    }
}
