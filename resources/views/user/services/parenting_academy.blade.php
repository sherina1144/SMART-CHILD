<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parenting Academy - Smart Child</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        /* RESET & BASE STYLES */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #FFFBF7;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2D3748;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        main {
            flex-grow: 1;
        }

        /* HERO SECTION */
        .hero-section {
            background-color: #1e4d3b;
            color: #ffffff;
            padding: 4rem 1.5rem;
            text-align: center;
        }

        .hero-container {
            max-width: 56rem;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.1);
            color: #A7F3D0;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.35rem 1rem;
            border-radius: 9999px;
            margin-bottom: 1rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-desc {
            color: rgba(209, 250, 229, 0.9);
            max-width: 42rem;
            margin: 0 auto 2rem auto;
            font-size: clamp(0.9rem, 1.5vw, 1rem);
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .btn-orange {
            background-color: #f26d5b;
            color: #ffffff;
            font-weight: 700;
            padding: 0.85rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
            display: inline-block;
        }

        .btn-orange:hover {
            background-color: #e05b4a;
        }

        .btn-outline-white {
            background-color: transparent;
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #ffffff;
            font-weight: 700;
            padding: 0.85rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
            display: inline-block;
        }

        .btn-outline-white:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* CONTAINER UTAMA */
        .content-container {
            max-width: 80rem;
            margin: 0 auto;
            padding: 3rem 1.5rem;
        }

        /* ALERT NOTIFIKASI */
        .alert-success {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background-color: #D1FAE5;
            border: 1px solid #34D399;
            color: #065F46;
            border-radius: 0.75rem;
            text-align: center;
            font-weight: 500;
        }

        /* CATEGORY FILTERS */
        .filter-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2.5rem;
            border-bottom: 1px solid #E5E7EB;
            padding-bottom: 1.5rem;
        }

        @media (min-width: 768px) {
            .filter-wrapper {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .filter-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .pill-link {
            padding: 0.5rem 1.25rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pill-active {
            background-color: #1e4d3b;
            color: #ffffff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .pill-inactive {
            background-color: #ffffff;
            border: 1px solid #E5E7EB;
            color: #4B5563;
        }

        .pill-inactive:hover {
            background-color: #F9FAFB;
        }

        .popular-link {
            color: #f26d5b;
            font-size: 0.875rem;
            font-weight: 700;
            text-decoration: none;
        }

        .popular-link:hover {
            text-decoration: underline;
        }

        /* GRID UMUM */
        .grid-3 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .grid-3 {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* COURSE CARDS */
        .course-card {
            background: #ffffff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #F3F4F6;
            transition: box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .course-img {
            width: 100%;
            height: 12rem;
            object-fit: cover;
        }

        .course-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .category-badge {
            display: inline-block;
            background-color: #FFF7ED;
            color: #f26d5b;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            width: max-content;
            margin-bottom: 0.75rem;
        }

        .course-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1e4d3b;
            margin-bottom: 0.5rem;
        }

        .course-excerpt {
            color: #4B5563;
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .empty-state {
            color: #9CA3AF;
            grid-column: span 3;
            text-align: center;
            padding: 2rem 0;
        }

        /* SECTION WEBINAR & KELAS ONLINE */
        .webinar-section {
            margin-bottom: 5rem;
        }

        /* SECTION VIDEO */
        .video-section {
            margin-bottom: 5rem;
        }

        .section-header {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: clamp(1.5rem, 2.5vw, 1.875rem);
            font-weight: 700;
            color: #1e4d3b;
        }

        .section-desc {
            color: #4B5563;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .video-card {
            background: #ffffff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #F3F4F6;
            display: flex;
            flex-direction: column;
        }

        .video-thumb-wrapper {
            position: relative;
            height: 11rem;
            background-color: #111827;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video-thumb {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.75;
        }

        .play-button {
            position: absolute;
            width: 3rem;
            height: 3rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #1e4d3b;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .play-button:hover {
            transform: scale(1.1);
        }

        .video-info {
            padding: 1.25rem;
        }

        .video-title {
            font-weight: 700;
            color: #1e4d3b;
            font-size: 1rem;
            margin-bottom: 0.25rem;
        }

        .video-meta {
            color: #6B7280;
            font-size: 0.75rem;
        }

        /* SECTION EXPERTS */
        .experts-section {
            margin-bottom: 4rem;
        }

        .experts-header {
            text-align: center;
            max-width: 36rem;
            margin: 0 auto 3rem auto;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
            max-width: 72rem;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .grid-2 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .expert-card {
            background: #ffffff;
            padding: 2.5rem 2rem;
            border-radius: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.03), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
            border: 1px solid #F1F5F9;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .expert-avatar {
            width: 6.5rem;
            height: 6.5rem;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .expert-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e4d3b;
            margin-bottom: 0.35rem;
        }

        .expert-title {
            font-size: 0.85rem;
            font-weight: 600;
            color: #f26d5b;
            margin-bottom: 1.25rem;
        }

        .expert-desc {
            color: #4B5563;
            font-size: 0.9rem;
            line-height: 1.6;
            max-width: 32rem;
        }

        /* NEWSLETTER SECTION */
        .newsletter-section {
            background: linear-gradient(to bottom, transparent, #FFF3EC);
            padding: 5rem 1.5rem;
        }

        .newsletter-container {
            max-width: 42rem;
            margin: 0 auto;
            text-align: center;
        }

        .newsletter-title {
            font-size: clamp(1.5rem, 2vw, 1.875rem);
            font-weight: 700;
            color: #1e4d3b;
            margin-bottom: 0.75rem;
        }

        .newsletter-desc {
            color: #4B5563;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            max-width: 32rem;
            margin: 0 auto;
        }

        @media (min-width: 640px) {
            .newsletter-form {
                flex-direction: row;
            }
        }

        .newsletter-input {
            flex-grow: 1;
            padding: 0.85rem 1.25rem;
            border-radius: 9999px;
            border: 1px solid #E5E7EB;
            background-color: #ffffff;
            font-size: 0.9rem;
            outline: none;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .newsletter-input:focus {
            border-color: #1e4d3b;
        }

        .newsletter-btn {
            background-color: #1e4d3b;
            color: #ffffff;
            font-weight: 700;
            padding: 0.85rem 2rem;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease;
            white-space: nowrap;
            font-size: 0.9rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .newsletter-btn:hover {
            background-color: #153629;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-container">
                <span class="hero-badge">Parenting Academy & Courses</span>
                <h1 class="hero-title">Belajar Menjadi Orang Tua Terbaik<br>Untuk Si Kecil</h1>
                <p class="hero-desc">Akses ribuan materi edukasi terkurasi, kursus interaktif, dan panduan praktis yang
                    dibuat langsung oleh pakar psikologi anak dan dokter anak.</p>
                <div class="hero-buttons">
                    <a href="#webinar-section" class="btn-orange">Lihat Semua Kursus</a>
                    <a href="{{ route('services.book_consultation') }}" class="btn-outline-white">Hubungi Konselor</a>
                </div>
            </div>
        </section>

        <!-- Main Content & Filter Section -->
        <section class="content-container">

            <!-- Tampilkan pesan sukses -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert"
                    style="border-radius: 50px;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show text-center mb-4" role="alert"
                    style="border-radius: 50px;">
                    {{ $errors->first('email') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Category Filters -->
            <div class="filter-wrapper">
                <div class="filter-pills">
                    @php $currentCat = request('category', 'Semua Materi'); @endphp

                    <a href="{{ route('services.parenting_academy') }}"
                        class="pill-link {{ !$currentCat || $currentCat == 'Semua Materi' ? 'pill-active' : 'pill-inactive' }}">
                        Semua Materi
                    </a>

                    @foreach($categories as $cat)
                        @if($cat)
                            <a href="{{ route('services.parenting_academy', ['category' => $cat]) }}"
                                class="pill-link {{ $currentCat == $cat ? 'pill-active' : 'pill-inactive' }}">
                                {{ $cat }}
                            </a>
                        @endif
                    @endforeach
                </div>
                <a href="{{ route('services.parenting_academy', ['popular' => 'true']) }}" class="popular-link">
                    Lihat Topik Terpopuler
                </a>
            </div>

            <!-- Course Cards Grid -->
            <div id="kursus" class="grid-3" style="margin-bottom: 4rem;">
                @forelse($academies as $item)
                    <a href="{{ route('services.parenting_academy.show', $item->id) }}" class="course-card"
                        style="text-decoration: none; color: inherit;">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="course-img">
                        <div class="course-body">
                            <span class="category-badge">{{ $item->category }}</span>
                            <h3 class="course-title">{{ $item->title }}</h3>
                            <p class="course-excerpt">{{ $item->excerpt }}</p>
                        </div>
                    </a>
                @empty
                    <p class="empty-state">Belum ada materi untuk kategori ini.</p>
                @endforelse
            </div>

            <!-- Webinar & Kelas Online Mendatang -->
            <div id="webinar-section" class="webinar-section">
                <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                    <h2 class="section-title">Webinar & Kelas Online Mendatang</h2>
                    <p class="section-desc">Edukasi eksklusif tatap muka interaktif secara langsung via konferensi video
                    </p>
                </div>
                <div class="grid-3">
                    @forelse($webinars ?? [] as $webinar)
                        <div class="course-card"
                            style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <img src="{{ asset('storage/' . $webinar->thumbnail) }}" alt="{{ $webinar->title }}"
                                    class="course-img">
                                <div class="course-body">
                                    <span
                                        style="display: block; color: #f26d5b; font-size: 0.8rem; font-weight: 700; margin-bottom: 0.5rem;">
                                        {{ $webinar->duration ?? 'Jadwal segera diumumkan' }}
                                    </span>
                                    <h3 class="course-title"
                                        style="font-size: 1.1rem; line-height: 1.4; margin-bottom: 0.5rem;">
                                        {{ $webinar->title }}
                                    </h3>
                                    <p style="color: #6B7280; font-size: 0.85rem; margin-bottom: 1.5rem;">
                                        Narasumber: {{ $webinar->instructor ?? 'Tim Ahli SmartChild' }}
                                    </p>
                                </div>
                            </div>
                            <div style="padding: 0 1.5rem 1.5rem 1.5rem;">
                                <a href="{{ $webinar->link ?? '#' }}" target="_blank"
                                    style="display: block; text-align: center; background-color: transparent; border: 1px solid #1e4d3b; color: #1e4d3b; padding: 0.75rem; border-radius: 9999px; font-weight: 700; text-decoration: none; font-size: 0.9rem; transition: all 0.2s ease;"
                                    onmouseover="this.style.backgroundColor='#1e4d3b'; this.style.color='#ffffff';"
                                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#1e4d3b';">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="empty-state"
                            style="grid-column: span 3; text-align: center; color: #9CA3AF; padding: 2rem 0;">
                            Belum ada jadwal webinar atau kelas online untuk saat ini.
                        </p>
                    @endforelse
                </div>
            </div>

            <!-- Video Panduan Praktis -->
            <div class="video-section">
                <div class="section-header">
                    <h2 class="section-title">Video Panduan Praktis</h2>
                    <p class="section-desc">Belajar visual lebih mudah dengan demonstrasi langsung dari ahlinya.</p>
                </div>
                <div class="grid-3">
                    @forelse($videos as $video)
                        <div class="video-card">
                            <div class="video-thumb-wrapper">
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->title }}"
                                    class="video-thumb">

                                @if($video->video_url)
                                    <a href="{{ $video->video_url }}" target="_blank" class="play-button"
                                        title="Tonton Video">▶</a>
                                @else
                                    <div class="play-button" style="cursor: not-allowed; opacity: 0.6;"
                                        title="Video belum tersedia">▶</div>
                                @endif
                            </div>
                            <div class="video-info" style="padding: 1.25rem;">
                                <span class="category-badge">{{ $video->category }}</span>
                                <h4 class="video-title">{{ $video->title }}</h4>
                                <p class="video-meta">Durasi: {{ $video->duration }} • Bersama {{ $video->instructor }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="empty-state"
                            style="grid-column: span 3; text-align: center; color: #9CA3AF; padding: 2rem 0;">Belum ada
                            video untuk kategori ini.</p>
                    @endforelse
                </div>
            </div>

            <!-- Dibimbing Oleh Expert Terpercaya -->
            <div class="expert-section" style="margin-top: 4rem; margin-bottom: 4rem;">
                <div class="section-header" style="text-align: center; margin-bottom: 2.5rem;">
                    <h2 class="section-title" style="font-size: 1.75rem; font-weight: bold; color: #1F2937;">Dibimbing
                        Oleh Expert Terpercaya</h2>
                    <p class="section-desc" style="color: #6B7280; margin-top: 0.5rem;">Belajar langsung dari tim
                        praktisi berpengalaman dan bersertifikasi</p>
                </div>

                <div class="grid-2"
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                    @forelse($experts as $expert)
                        <div class="expert-card"
                            style="background: #ffffff; border: 1px solid #E5E7EB; border-radius: 16px; padding: 2rem; text-align: center; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
                            <div class="expert-img-wrapper" style="margin-bottom: 1.25rem;">
                                <img src="{{ $expert->photo ? asset('storage/' . $expert->photo) : asset('images/default-avatar.png') }}"
                                    alt="{{ $expert->name }}"
                                    style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; margin: 0 auto; border: 3px solid #F3F4F6;">
                            </div>

                            <h4 style="font-size: 1.15rem; font-weight: bold; color: #1F2937; margin-bottom: 0.25rem;">
                                {{ $expert->name }}
                            </h4>
                            <p style="font-size: 0.9rem; color: #F97316; font-weight: 600; margin-bottom: 1rem;">
                                {{ $expert->specialization }}
                            </p>

                            <p style="font-size: 0.9rem; color: #4B5563; line-height: 1.5;">
                                {{ $expert->bio ?? $expert->description }}
                            </p>
                        </div>
                    @empty
                        <p style="grid-column: span 2; text-align: center; color: #9CA3AF; padding: 2rem;">Belum ada data
                            expert yang ditambahkan.</p>
                    @endforelse
                </div>
            </div>

        </section>

        <!-- Newsletter Section -->
        <section class="newsletter-section">
            <div class="newsletter-container">
                <h2 class="newsletter-title">Dapatkan Tips & Panduan Mingguan</h2>
                <p class="newsletter-desc">Daftarkan email Anda untuk berlangganan konten eksklusif tumbuh kembang anak
                    dari tim ahli medis SmartChild langsung ke inbox Anda.</p>
                <form action="{{ route('newsletter.store') }}" method="POST" class="newsletter-form">
                    @csrf
                    <input type="text" name="name" required placeholder="Nama Lengkap Anda" class="newsletter-input"
                        value="{{ old('name') }}">
                    <input type="email" name="email" required placeholder="Alamat Email Anda" class="newsletter-input"
                        value="{{ old('email') }}">
                    <button type="submit" class="newsletter-btn">Langganan</button>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('layout.footer')

</body>

</html>