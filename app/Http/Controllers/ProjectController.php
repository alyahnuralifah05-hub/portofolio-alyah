<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProfileSetting;

class ProjectController extends Controller
{
    public function index()
    {
        $profile = ProfileSetting::first() ?? new ProfileSetting([
            'full_name' => 'Alyah Nur Alifah',
            'job_title' => 'Mahasiswi Universitas Muhammadiyah Kolaka Utara',
            'about_short' => 'Pengembang perangkat lunak dengan fokus pada Web Development, Internet of Things (IoT), dan Analisis Data.',
            'email' => 'alyahnuralifah05@gmail.com',
            'whatsapp' => '+62 822-920-54722',
            'github_link' => 'https://github.com',
            'linkedin_link' => 'https://linkedin.com',
        ]);

        $projects = Project::orderBy('created_at', 'desc')->get();

        return view('portfolio', compact('profile', 'projects'));
    }
}