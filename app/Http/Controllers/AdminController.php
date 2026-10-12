<?php

namespace App\Http\Controllers;

use App\Models\ProfileSetting;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Mengambil profil utama atau membuat record default jika belum ada.
     */
    private function getProfile(): ProfileSetting
    {
        // Ambil data pertama di tabel, atau buat baru jika tabel masih kosong
        $profile = ProfileSetting::first();

        if (!$profile) {
            $profile = ProfileSetting::create([
                'full_name'     => 'Alyah Nur Alifah',
                'job_title'     => 'Mahasiswi Universitas Muhammadiyah Kolaka Utara',
                'about_short'   => 'Pengembang perangkat lunak dengan fokus pada Web Development, Internet of Things (IoT), dan Analisis Data.',
                'email'         => 'alyahnuralifah05@gmail.com',
                'whatsapp'      => '+62 822-920-54722',
                'github_link'   => 'https://github.com/alyahnuralifah05-hub',
                'linkedin_link' => 'https://www.linkedin.com/in/alyah-nur-alifah-5a31902a8',
            ]);
        }

        return $profile;
    }

    // Menampilkan Form Edit Profil & Daftar Proyek
    public function index()
    {
        $profile  = $this->getProfile();
        $projects = Project::all();

        return view('admin.dashboard', compact('profile', 'projects'));
    }

    // Proses Simpan Perubahan Profil
    public function updateProfile(Request $request)
    {
        $profile = $this->getProfile();

        $data = $request->validate([
            'full_name'     => 'required|string|max:255',
            'job_title'     => 'required|string|max:255',
            'about_short'   => 'required|string',
            'email'         => 'required|email|max:255',
            'whatsapp'      => 'required|string|max:50',
            'github_link'   => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'avatar'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            // Hapus foto profil lama jika ada di storage
            if ($profile->avatar && Storage::disk('public')->exists(str_replace('/storage/', '', $profile->avatar))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $profile->avatar));
            }

            // Simpan gambar baru dengan format path konsisten (/storage/profiles/...)
            $path = $request->file('avatar')->store('profiles', 'public');
            $data['avatar'] = '/storage/' . $path;
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    // Menambah Proyek Baru
    public function storeProject(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'problem_goal' => 'required|string',
            'role'         => 'required|string',
            'result'       => 'required|string',
            'link'         => 'nullable|url',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = '/storage/' . $path;
        } else {
            $data['image'] = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80';
        }

        Project::create($data);

        return redirect()->back()->with('success', 'Proyek berhasil ditambahkan!');
    }

    // Proses Update / Edit Proyek yang Ada
    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:255',
            'problem_goal' => 'required|string',
            'role'         => 'required|string',
            'result'       => 'required|string',
            'link'         => 'nullable|url',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar proyek lama jika berupa file lokal di storage
            if ($project->image && str_contains($project->image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $project->image);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $project->update($data);

        return redirect()->back()->with('success', 'Proyek berhasil diperbarui!');
    }

    // Menghapus Proyek
    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);

        // Hapus gambar fisik dari storage jika ada
        if ($project->image && str_contains($project->image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $project->image);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $project->delete();

        return redirect()->back()->with('success', 'Proyek berhasil dihapus!');
    }
}