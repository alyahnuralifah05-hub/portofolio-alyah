<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileSetting;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        ProfileSetting::truncate();

        ProfileSetting::create([
            'full_name'      => 'Alyah Nur Alifah',
            'job_title'      => 'Mahasiswi Universitas Muhammadiyah Kolaka Utara',
            'about_short'    => 'Pengembang perangkat lunak dengan fokus pada Web Development, Internet of Things (IoT), dan Analisis Data.',
            'about_full'     => 'Saya adalah seorang praktisi di bidang rekayasa perangkat lunak dan analisis data...',
            'vision_mission' => 'Mengintegrasikan teknologi kecerdasan buatan, kecerdasan terdistribusi (IoT), dan arsitektur cloud...',
            'email'          => 'alyahnuralifah05@gmail.com',
            'whatsapp'       => '+62 822-9205-4722',
            'github_link'    => 'https://github.com/alyahnuralifah05-hub',
            'linkedin_link'  => 'https://www.linkedin.com/in/alyah-nur-alifah-5a31902a8/',
            'avatar'         => null
        ]);
    }
}