<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio | Alyah Nur Alifah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased selection:bg-indigo-500 selection:text-white">
    <div class="fixed right-5 top-5 z-[60] flex gap-2">
        <button id="portfolio-edit-toggle" type="button" class="px-4 py-2 rounded-full bg-indigo-600 text-white text-xs font-semibold shadow-lg shadow-indigo-600/30 hover:bg-indigo-500 transition">
            Edit Konten
        </button>
        <button id="portfolio-save-btn" type="button" class="hidden px-4 py-2 rounded-full bg-emerald-600 text-white text-xs font-semibold shadow-lg shadow-emerald-600/30 hover:bg-emerald-500 transition">
            Simpan
        </button>
    </div>

    <style>
        [data-key] {
            transition: all 0.2s ease;
        }

        body.edit-mode [data-key] {
            outline: 1px dashed rgba(99, 102, 241, 0.8);
            outline-offset: 4px;
            background: rgba(99, 102, 241, 0.08);
            border-radius: 0.5rem;
            cursor: text;
        }
    </style>

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/80 backdrop-blur-md border-b border-slate-800/80">
        <div class="max-w-7xl mx-auto px-6 py-4 grid grid-cols-[1fr_auto_1fr] items-center">
            <a href="#" class="text-xl font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-pink-500">
                fay
            </a>
            <div class="hidden md:flex justify-center space-x-8 text-sm font-medium text-slate-300">
                <a href="#about" class="hover:text-indigo-400 transition">Ringkasan</a>
                <a href="#skills" class="hover:text-indigo-400 transition">Keterampilan</a>
                <a href="#projects" class="hover:text-indigo-400 transition">Proyek Utama</a>
                <a href="#experience" class="hover:text-indigo-400 transition">Pengalaman</a>
                <a href="#testimonials" class="hover:text-indigo-400 transition">Testimoni</a>
            </div>
            <div></div>
        </div>
    </nav>

    <!-- 1. IDENTITAS UTAMA & PROFIL -->
    <section class="min-h-screen flex items-center pt-28 pb-16 relative overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-indigo-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 -left-40 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-7">
                <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold tracking-wide uppercase mb-6">
                    Personal Portfolio
                </span>
                <h1 class="text-4xl sm:text-6xl font-extrabold text-white leading-tight mb-4" data-key="hero-name">
                    {{ $profile->full_name ?? 'Alyah Nur Alifah' }}
                </h1>
                <p class="text-xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 mb-6" data-key="hero-job">
                  {{ $profile->job_title }}
                </p>
                <p class="text-slate-400 text-base mb-8 leading-relaxed max-w-xl" data-key="hero-about">
                    {{ $profile->about_short }}
                </p>
                
                <!-- Kontak & Tautan Sosial -->
                <div class="flex flex-wrap gap-4 items-center mb-8 text-sm text-slate-300">
                    <a href="mailto:{{ $profile->email ?? 'alyahnuralifah05@gmail.com' }}" class="flex items-center gap-2 hover:text-indigo-400 transition">
                        <i class="fa-solid fa-envelope text-indigo-400"></i> {{ $profile->email ?? 'alyahnuralifah05@gmail.com' }}
                    </a>
                    <span class="text-slate-700">•</span>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp ?? '+6282292054722') }}" target="_blank" class="flex items-center gap-2 hover:text-emerald-400 transition">
                        <i class="fa-brands fa-whatsapp text-emerald-400"></i> {{ $profile->whatsapp ?? '+62 822-920-54722' }}
                    </a>
                </div>

                <div class="flex flex-wrap gap-4">
                    <a href="{{ $profile->github_link ?? 'https://github.com' }}" target="_blank" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-medium text-sm transition border border-slate-700">
                        <i class="fa-brands fa-github mr-2"></i> GitHub
                    </a>
                    <a href="{{ $profile->linkedin_link ?? 'https://linkedin.com' }}" target="_blank" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-medium text-sm transition border border-slate-700">
                        <i class="fa-brands fa-linkedin mr-2"></i> LinkedIn
                    </a>
                </div>
            </div>
            
            <div class="md:col-span-5 flex justify-center">
                <div class="w-72 h-72 sm:w-80 sm:h-80 rounded-3xl bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-1 shadow-2xl shadow-indigo-500/20">
                    <div class="w-full h-full bg-slate-900 rounded-[22px] overflow-hidden flex items-center justify-center">
                        <img src="{{ $profile->avatar ? asset('storage/' . $profile->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($profile->full_name ?? 'Alyah Nur Alifah') . '&background=0F172A&color=818CF8&size=512' }}" alt="Foto Profil {{ $profile->full_name ?? 'Alyah Nur Alifah' }}" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. RINGKASAN PROFESIONAL -->
    <section id="about" class="py-20 bg-slate-900/40 border-y border-slate-800/50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-white mb-6" data-key="about-title">Ringkasan Profesional</h2>
                <p class="text-slate-300 leading-relaxed mb-4" data-key="about-paragraph-1">
                    Saya adalah seorang praktisi di bidang rekayasa perangkat lunak dan analisis data yang berkomitmen membangun solusi digital efisien, terstruktur, dan berdampak sosial nyata. Memiliki latar belakang akademis teknik serta pengalaman dalam penelitian riset pemrosesan citra digital, machine learning, dan arsitektur web modern.
                </p>
                <p class="text-slate-400 leading-relaxed" data-key="about-paragraph-2">
                    Dengan kombinasi pemahaman logika pemrograman dan keahlian desain digital, saya berfokus menciptakan produk digital yang intuitif bagi pengguna sekaligus andal secara arsitektur sistem.
                </p>
            </div>
            <div class="p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/60 shadow-xl">
                <i class="fa-solid fa-bullseye text-3xl text-indigo-400 mb-4"></i>
                <h3 class="text-xl font-bold text-white mb-3" data-key="vision-title">Visi & Tujuan Kerja</h3>
                <p class="text-slate-300 leading-relaxed text-sm" data-key="vision-text">
                    "Mengintegrasikan teknologi kecerdasan buatan, kecerdasan terdistribusi (IoT), dan arsitektur cloud untuk mendorong transformasi digital berbasis data yang inklusif serta berkelanjutan."
                </p>
            </div>
        </div>
    </section>

    <!-- 3. KETERAMPILAN (SKILLS) -->
    <section id="skills" class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-white mb-4" data-key="skills-title">Keterampilan Utama</h2>
                <p class="text-slate-400" data-key="skills-subtitle">Penguasaan teknologi teknis serta kemampuan antarpribadi yang mendukung efektivitas kerja.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Hard Skills -->
                <div class="p-8 rounded-2xl bg-slate-900/50 border border-slate-800">
                    <h3 class="text-xl font-bold text-indigo-400 mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-code"></i> Keterampilan Teknis (Hard Skills)
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm mb-1 items-center gap-4">
                                <span class="text-slate-200" data-key="skill-1-name">Laravel & PHP</span>
                                <span class="text-indigo-400 min-w-[3rem] text-right" data-key="skill-1-level">50%</span>
                            </div>
                            <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full rounded-full" data-key="skill-1-bar" style="width: 50%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1 items-center gap-4">
                                <span class="text-slate-200" data-key="skill-2-name">Python & Data Analysis (Machine Learning)</span>
                                <span class="text-indigo-400 min-w-[3rem] text-right" data-key="skill-2-level">20%</span>
                            </div>
                            <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full rounded-full" data-key="skill-2-bar" style="width: 20%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1 items-center gap-4">
                                <span class="text-slate-200" data-key="skill-3-name">Mikrokontroler ESP32 & IoT</span>
                                <span class="text-indigo-400 min-w-[3rem] text-right" data-key="skill-3-level">75%</span>
                            </div>
                            <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full rounded-full" data-key="skill-3-bar" style="width: 75%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1 items-center gap-4">
                                <span class="text-slate-200" data-key="skill-4-name">Graphic & Video Editing (Canva, CapCut)</span>
                                <span class="text-indigo-400 min-w-[3rem] text-right" data-key="skill-4-level">85%</span>
                            </div>
                            <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                                <div class="bg-indigo-500 h-full rounded-full" data-key="skill-4-bar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Soft Skills -->
                <div class="p-8 rounded-2xl bg-slate-900/50 border border-slate-800">
                    <h3 class="text-xl font-bold text-pink-400 mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-user-check"></i> Keterampilan Lunak (Soft Skills)
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl bg-slate-800/40 border border-slate-700/40">
                            <i class="fa-solid fa-comments text-pink-400 text-xl mb-2"></i>
                            <h4 class="font-semibold text-white text-sm" data-key="soft-skill-1-title">Komunikasi Efektif</h4>
                            <p class="text-xs text-slate-400 mt-1" data-key="soft-skill-1-desc">Penyampaian ide & laporan akademis/teknis secara jelas.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-800/40 border border-slate-700/40">
                            <i class="fa-solid fa-users text-pink-400 text-xl mb-2"></i>
                            <h4 class="font-semibold text-white text-sm" data-key="soft-skill-2-title">Kerja Tim</h4>
                            <p class="text-xs text-slate-400 mt-1" data-key="soft-skill-2-desc">Kolaborasi adaptif dalam tim riset & proyek lintas fungsi.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-800/40 border border-slate-700/40">
                            <i class="fa-solid fa-clock text-pink-400 text-xl mb-2"></i>
                            <h4 class="font-semibold text-white text-sm" data-key="soft-skill-3-title">Manajemen Waktu</h4>
                            <p class="text-xs text-slate-400 mt-1" data-key="soft-skill-3-desc">Kemampuan eksekusi target secara disiplin dan tepat waktu.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-800/40 border border-slate-700/40">
                            <i class="fa-solid fa-lightbulb text-pink-400 text-xl mb-2"></i>
                            <h4 class="font-semibold text-white text-sm" data-key="soft-skill-4-title">Problem Solving</h4>
                            <p class="text-xs text-slate-400 mt-1" data-key="soft-skill-4-desc">Pendekatan analitis berbasis data dalam menyelesaikan masalah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. PROYEK ATAU HASIL KARYA UTAMA -->
    <section id="projects" class="py-20 bg-slate-900/30 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-white mb-4" data-key="projects-title">Proyek & Hasil Karya Utama</h2>
                <p class="text-slate-400" data-key="projects-subtitle">Studi kasus dan karya terbaik yang telah dibangun.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="rounded-2xl bg-slate-900 border border-slate-800 overflow-hidden hover:border-indigo-500/50 transition duration-300 flex flex-col group">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 left-4 px-3 py-1 bg-slate-950/80 backdrop-blur-md rounded-full text-xs font-semibold text-indigo-400 border border-slate-800" data-key="project-{{ $project->id }}-category">
                            {{ $project->category }}
                        </span>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-indigo-400 transition" data-key="project-{{ $project->id }}-title">{{ $project->title }}</h3>
                            
                            <div class="space-y-2 text-xs">
                                <p class="text-slate-300" data-key="project-{{ $project->id }}-goal"><strong class="text-indigo-400">Tujuan:</strong> {{ $project->problem_goal }}</p>
                                <p class="text-slate-300" data-key="project-{{ $project->id }}-role"><strong class="text-indigo-400">Peran:</strong> {{ $project->role }}</p>
                                <p class="text-slate-300" data-key="project-{{ $project->id }}-result"><strong class="text-indigo-400">Hasil:</strong> {{ $project->result }}</p>
                            </div>
                        </div>

                        <a href="{{ $project->link }}" class="inline-flex items-center text-sm font-semibold text-indigo-400 hover:text-indigo-300 pt-2 border-t border-slate-800">
                            Lihat Detail Proyek <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. PENGALAMAN KERJA & PENDIDIKAN -->
    <section id="experience" class="py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12">
            <!-- Pengalaman -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-8 flex items-center gap-3" data-key="experience-title">
                    <i class="fa-solid fa-briefcase text-indigo-400"></i> Pengalaman Kerja & Organisasi
                </h2>
                <div class="space-y-6 border-l-2 border-slate-800 pl-6">
                    <div class="relative">
                        <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-indigo-500 ring-4 ring-slate-950"></span>
                        <span class="text-xs font-medium text-indigo-400" data-key="experience-period-1">2025 - Sekarang</span>
                        <h3 class="text-lg font-bold text-white mt-1" data-key="experience-role-1">Peneliti Independen & Lead Author</h3>
                        <p class="text-sm text-slate-400" data-key="experience-org-1">Jurnal Komputer dan Teknologi</p>
                        <p class="text-xs text-slate-400 mt-2" data-key="experience-desc-1">Mengarahkan riset analisis sentimen ulasan aplikasi mobile menggunakan algoritma Naive Bayes dan penyusunan publikasi ilmiah.</p>
                    </div>
                    <div class="relative">
                        <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-indigo-500 ring-4 ring-slate-950"></span>
                        <span class="text-xs font-medium text-indigo-400" data-key="experience-period-2">2024 - 2025</span>
                        <h3 class="text-lg font-bold text-white mt-1" data-key="experience-role-2">Asisten Pengembang Sistem IoT</h3>
                        <p class="text-sm text-slate-400" data-key="experience-org-2">Proyek Independen Teknisi</p>
                        <p class="text-xs text-slate-400 mt-2" data-key="experience-desc-2">Merancang arsitektur perangkat keras ESP32 dan pengujian integrasi sensor suhu ke Blynk Cloud.</p>
                    </div>
                </div>
            </div>

            <!-- Pendidikan & Sertifikasi -->
            <div>
                <h2 class="text-2xl font-bold text-white mb-8 flex items-center gap-3" data-key="education-title">
                    <i class="fa-solid fa-graduation-cap text-indigo-400"></i> Pendidikan & Sertifikasi
                </h2>
                <div class="space-y-6 border-l-2 border-slate-800 pl-6">
                    <div class="relative">
                        <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-indigo-500 ring-4 ring-slate-950"></span>
                        <span class="text-xs font-medium text-indigo-400" data-key="education-period-1">Pendidikan Terakhir</span>
                        <h3 class="text-lg font-bold text-white mt-1" data-key="education-school-1">Universitas Muhammadiyah Kolaka Utara</h3>
                        <p class="text-sm text-slate-400" data-key="education-major-1">Program Studi Teknik Komputer / Rekayasa Komputer</p>
                        <p class="text-xs text-slate-400 mt-2" data-key="education-desc-1">Penerima Beasiswa KIP Kuliah dengan fokus studi Web Programming, Pemrosesan Sinyal/Citra Digital, dan Mikrokontroler.</p>
                    </div>
                    <div class="relative">
                        <span class="absolute -left-[31px] top-1.5 w-3 h-3 rounded-full bg-indigo-500 ring-4 ring-slate-950"></span>
                        <span class="text-xs font-medium text-indigo-400" data-key="education-period-2">Sertifikasi</span>
                        <h3 class="text-lg font-bold text-white mt-1" data-key="education-school-2">Sertifikasi Canva & Digital Media</h3>
                        <p class="text-xs text-slate-400 mt-2" data-key="education-desc-2">Sertifikasi keahlian desain antarmuka, grafis digital, dan penyuntingan media berbasis AI.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. TESTIMONI -->
    <section id="testimonials" class="py-20 bg-slate-900/40 border-t border-slate-800/50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-white mb-4" data-key="testimonial-title">Testimoni</h2>
                <p class="text-slate-400" data-key="testimonial-subtitle">Apa kata rekan kerja dan kolaborator tentang kinerja saya.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800 relative">
                    <i class="fa-solid fa-quote-left text-3xl text-indigo-500/20 absolute top-6 right-6"></i>
                    <p class="text-slate-300 italic text-sm mb-6 leading-relaxed" data-key="testimonial-1-text">
                        "Alyah adalah sosok yang sangat teliti dalam melakukan analisis data. Hasil penelitian sentimen analisis yang disajikannya sangat terstruktur dan metodologinya tepat sasaran."
                    </p>
                    <div>
                        <h4 class="font-bold text-white text-sm" data-key="testimonial-1-name">Dr. Hendra Wijaya</h4>
                        <p class="text-xs text-slate-400" data-key="testimonial-1-role">Dosen & Reviewer Jurnal Teknologi</p>
                    </div>
                </div>

                <div class="p-8 rounded-2xl bg-slate-900 border border-slate-800 relative">
                    <i class="fa-solid fa-quote-left text-3xl text-indigo-500/20 absolute top-6 right-6"></i>
                    <p class="text-slate-300 italic text-sm mb-6 leading-relaxed" data-key="testimonial-2-text">
                        "Kerja sama dalam pengembangan prototipe IoT sangat menyenangkan. Alyah dapat menyelesaikan integrasi hardware ke cloud dengan cepat dan rapi."
                    </p>
                    <div>
                        <h4 class="font-bold text-white text-sm" data-key="testimonial-2-name">Rian Pratama</h4>
                        <p class="text-xs text-slate-400" data-key="testimonial-2-role">Rekan Tim Proyek Hardware</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="border-t border-slate-800 bg-slate-950 py-12 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} Alyah Nur Alifah. Built with Laravel 8 & Tailwind CSS.</p>
    </footer>

    <script>
        const portfolioStorageKey = 'portfolio-editable-content-v1';

        const loadSavedContent = () => {
            const saved = JSON.parse(localStorage.getItem(portfolioStorageKey) || '{}');
            document.querySelectorAll('[data-key]').forEach((element) => {
                const key = element.dataset.key;
                if (saved[key] !== undefined) {
                    element.textContent = saved[key];
                }
            });
        };

        const saveContent = () => {
            const saved = JSON.parse(localStorage.getItem(portfolioStorageKey) || '{}');
            document.querySelectorAll('[data-key]').forEach((element) => {
                saved[element.dataset.key] = element.textContent;
            });
            localStorage.setItem(portfolioStorageKey, JSON.stringify(saved));
        };

        const setEditMode = (enabled) => {
            document.body.classList.toggle('edit-mode', enabled);
            document.querySelectorAll('[data-key]').forEach((element) => {
                element.setAttribute('contenteditable', enabled ? 'true' : 'false');
                element.setAttribute('spellcheck', 'false');
            });

            const saveBtn = document.getElementById('portfolio-save-btn');
            if (saveBtn) {
                saveBtn.classList.toggle('hidden', !enabled);
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            loadSavedContent();

            const toggleBtn = document.getElementById('portfolio-edit-toggle');
            const saveBtn = document.getElementById('portfolio-save-btn');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    const enabled = !document.body.classList.contains('edit-mode');
                    setEditMode(enabled);
                });
            }

            if (saveBtn) {
                saveBtn.addEventListener('click', () => {
                    saveContent();
                    setEditMode(false);
                });
            }
        });
    </script>

</body>
</html>