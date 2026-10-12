<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Edit | Alyah Nur Alifah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 p-8 antialiased">
    <div class="max-w-5xl mx-auto space-y-10">

        <div class="flex justify-between items-center border-b border-slate-800 pb-5">
            <div>
                <h1 class="text-3xl font-bold text-indigo-400">Dashboard Pengaturan Portofolio</h1>
                <p class="text-slate-400 text-sm">Edit semua konten tampilan portofolio Anda di sini.</p>
            </div>
            <a href="{{ route('portfolio') }}" target="_blank" class="px-4 py-2 bg-slate-800 border border-slate-700 rounded-lg text-sm hover:bg-slate-700">Lihat Website &rarr;</a>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-500/20 border border-emerald-500 text-emerald-400 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM EDIT DATA DIRI -->
        <div class="bg-slate-800/60 p-6 rounded-2xl border border-slate-700/60">
            <h2 class="text-xl font-bold mb-6 text-white border-b border-slate-700 pb-3">1. Edit Data Diri & Kontak</h2>
            
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Nama Lengkap</label>
                        <input type="text" name="full_name" value="{{ $profile->full_name }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Gelar / Peran Pekerjaan</label>
                        <input type="text" name="job_title" value="{{ $profile->job_title }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Email</label>
                        <input type="email" name="email" value="{{ $profile->email }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp" value="{{ $profile->whatsapp }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Tautan GitHub</label>
                        <input type="text" name="github_link" value="{{ $profile->github_link }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Tautan LinkedIn</label>
                        <input type="text" name="linkedin_link" value="{{ $profile->linkedin_link }}" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-xs text-slate-400 mb-1">Ringkasan Diri (Short About)</label>
                    <textarea name="about_short" rows="3" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">{{ $profile->about_short }}</textarea>
                </div>

                <div>
                    <label class="block text-xs text-slate-400 mb-1">Foto Profil Baru (Upload)</label>
                    <input type="file" name="avatar" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2 text-sm">
                </div>

                <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-500 rounded-lg font-semibold text-sm">Simpan Perubahan Profil</button>
            </form>
        </div>

        <!-- FORM TAMBAH PROYEK BARU -->
        <div class="bg-slate-800/60 p-6 rounded-2xl border border-slate-700/60">
            <h2 class="text-xl font-bold mb-6 text-white border-b border-slate-700 pb-3">2. Tambah Proyek Baru</h2>
            
            <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Judul Proyek</label>
                        <input type="text" name="title" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                    <div>
                        <label class="block text-xs text-slate-400 mb-1">Kategori Proyek</label>
                        <input type="text" name="category" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-xs text-slate-400 mb-1">Tujuan / Masalah</label>
                    <input type="text" name="problem_goal" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                </div>
                <div>
                    <label class="block text-xs text-slate-400 mb-1">Peran Anda</label>
                    <input type="text" name="role" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                </div>
                <div>
                    <label class="block text-xs text-slate-400 mb-1">Hasil Pencapaian</label>
                    <input type="text" name="result" required class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-sm">
                </div>
                <div>
                    <label class="block text-xs text-slate-400 mb-1">Gambar Proyek (Upload)</label>
                    <input type="file" name="image" class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2 text-sm">
                </div>

                <button type="submit" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-500 rounded-lg font-semibold text-sm">Tambah Proyek</button>
            </form>

            <!-- DAFTAR PROYEK & FORM EDIT LANGSUNG -->
            <div class="mt-8 border-t border-slate-700 pt-6">
                <h3 class="font-bold text-base mb-4 text-white">Daftar Proyek & Edit Langsung:</h3>
                
                <div class="space-y-6">
                    @foreach($projects as $p)
                    <div class="p-5 bg-slate-900 border border-slate-700 rounded-xl space-y-4">
                        <form action="{{ route('admin.project.update', $p->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                            @csrf
                            @method('PUT')
                            
                            <div class="flex justify-between items-center">
                                <span class="px-2.5 py-1 bg-indigo-500/20 text-indigo-400 text-xs font-semibold rounded-md">ID Proyek: #{{ $p->id }}</span>
                                <div class="flex gap-2">
                                    <button type="submit" class="px-4 py-1.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg text-xs font-semibold">Simpan Perubahan</button>
                        </form>
                                    <form action="{{ route('admin.project.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600 text-red-400 hover:text-white rounded-lg text-xs font-semibold transition">Hapus</button>
                                    </form>
                                </div>
                            </div>

                            <!-- Form Fields untuk Edit -->
                            <form action="{{ route('admin.project.update', $p->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[11px] text-slate-400 mb-1">Judul Proyek</label>
                                        <input type="text" name="title" value="{{ $p->title }}" required class="w-full bg-slate-800 border border-slate-700 rounded-lg p-2 text-xs text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] text-slate-400 mb-1">Kategori</label>
                                        <input type="text" name="category" value="{{ $p->category }}" required class="w-full bg-slate-800 border border-slate-700 rounded-lg p-2 text-xs text-white">
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-[11px] text-slate-400 mb-1">Tujuan / Masalah</label>
                                        <input type="text" name="problem_goal" value="{{ $p->problem_goal }}" required class="w-full bg-slate-800 border border-slate-700 rounded-lg p-2 text-xs text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] text-slate-400 mb-1">Peran Anda</label>
                                        <input type="text" name="role" value="{{ $p->role }}" required class="w-full bg-slate-800 border border-slate-700 rounded-lg p-2 text-xs text-white">
                                    </div>
                                    <div>
                                        <label class="block text-[11px] text-slate-400 mb-1">Hasil Pencapaian</label>
                                        <input type="text" name="result" value="{{ $p->result }}" required class="w-full bg-slate-800 border border-slate-700 rounded-lg p-2 text-xs text-white">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[11px] text-slate-400 mb-1">Ganti Gambar Proyek (Opsional)</label>
                                    <input type="file" name="image" class="w-full bg-slate-800 border border-slate-700 rounded-lg p-1.5 text-xs text-slate-300">
                                </div>
                            </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</body>
</html>