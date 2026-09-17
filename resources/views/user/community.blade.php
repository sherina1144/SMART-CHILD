<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community - Smart Child</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome untuk ikon komentar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* RESET & BASE STYLES */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #292524; /* text-stone-800 */
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        main {
            background-color: #ffffff;
            color: #292524;
        }

        /* TOMBOL & LINK */
        .btn-emerald {
            background-color: #064e3b; /* emerald-900 */
            color: #ffffff;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            display: inline-block;
            text-align: center;
        }

        .btn-emerald:hover {
            background-color: #065f46; /* emerald-800 */
        }

        .btn-outline-emerald {
            border: 1px solid #d6d3d1; /* stone-300 */
            color: #022c22; /* emerald-950 */
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: background-color 0.2s ease;
            font-size: 0.875rem;
            display: inline-block;
            text-align: center;
        }

        .btn-outline-emerald:hover {
            background-color: #f5f5f4; /* stone-50 */
        }

        .btn-orange {
            background-color: #fb923c; /* orange-400 */
            color: #ffffff;
            font-weight: 500;
            padding: 0.625rem 1.25rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
            display: inline-block;
        }

        .btn-orange:hover {
            background-color: #f97316; /* orange-500 */
        }

        /* CONTAINER UTAMA */
        .container-max {
            max-width: 80rem;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* HERO SECTION */
        .hero-section {
            padding: 3rem 1.5rem;
            max-width: 80rem;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 3rem;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .hero-section {
                grid-template-columns: 1fr 1fr;
            }
        }

        .hero-badge {
            display: inline-block;
            background-color: #f5f5f4; /* stone-100 */
            color: #44403c; /* stone-700 */
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.35rem 0.875rem;
            border-radius: 9999px;
            margin-bottom: 1.5rem;
            border: 1px solid #e7e5e4; /* stone-200 */
        }

        .hero-title {
            font-size: clamp(2.25rem, 4vw, 3rem);
            font-weight: 700;
            color: #022c22; /* emerald-950 */
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-desc {
            color: #57534e; /* stone-600 */
            line-height: 1.7;
            margin-bottom: 2rem;
            font-size: 0.95rem;
        }

        @media (min-width: 1024px) {
            .hero-desc {
                font-size: 1rem;
            }
        }

        .hero-img-wrapper {
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .hero-img {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        /* SECTION HEADER UMUM */
        .section-header-center {
            text-align: center;
            max-width: 36rem;
            margin: 0 auto 3rem auto;
        }

        .section-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #022c22;
            margin-bottom: 0.75rem;
        }

        .section-desc {
            color: #57534e;
            font-size: 0.875rem;
        }

        /* GRID 3 KOLOM */
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

        /* GRUP DISKUSI CARD */
        .group-card {
            background-color: #FFF9F5;
            border: 1px solid #FBECE3;
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .group-card:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .group-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #022c22;
            margin-bottom: 0.75rem;
        }

        .group-card p {
            color: #57534e;
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .group-member-count {
            color: #f97316; /* orange-500 */
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* DISKUSI HANGAT */
        .discussion-section {
            max-width: 80rem;
            margin: 0 auto;
            padding: 4rem 1.5rem;
            border-top: 1px solid #f5f5f4;
        }

        .discussion-top-flex {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 768px) {
            .discussion-top-flex {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .thread-card {
            border: 1px solid rgba(229, 231, 235, 0.8);
            padding: 1.25rem;
            border-radius: 1rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            transition: border-color 0.2s ease;
            background-color: #ffffff;
        }

        @media (min-width: 768px) {
            .thread-card {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }

        .thread-card:hover {
            border-color: #064e3b;
        }

        .thread-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .thread-avatar {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .thread-meta {
            font-size: 0.75rem;
            color: #78716c;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .thread-category {
            color: #ea580c; /* orange-600 */
            font-weight: 600;
        }

        .thread-title {
            font-weight: 600;
            color: #022c22;
            font-size: 1rem;
        }

        .thread-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            color: #78716c;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .thread-comment-count {
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        /* WEBINAR SECTION */
        .webinar-card {
            border: 1px solid #e5e7eb;
            border-radius: 1.5rem;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .webinar-img {
            width: 100%;
            height: 12rem;
            object-fit: cover;
        }

        .webinar-body {
            padding: 1.5rem;
        }

        .webinar-schedule {
            color: #ea580c;
            font-size: 0.75rem;
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
        }

        .webinar-title {
            font-weight: 700;
            color: #022c22;
            font-size: 1.125rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .webinar-speaker {
            color: #78716c;
            font-size: 0.75rem;
        }

        .webinar-footer {
            padding: 1.5rem;
            padding-top: 0;
        }

        .btn-webinar-daftar {
            display: block;
            text-align: center;
            border: 1px solid #022c22;
            color: #022c22;
            font-weight: 500;
            padding: 0.625rem 1rem;
            border-radius: 9999px;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            text-decoration: none;
        }

        .btn-webinar-daftar:hover {
            background-color: #022c22;
            color: #ffffff;
        }

        /* KISAH SUKSES TESTIMONI */
        .testimonial-section {
            background-color: #FFF9F5;
            padding: 5rem 1.5rem;
            margin: 3rem 0;
            border-top: 1px solid #FBECE3;
            border-bottom: 1px solid #FBECE3;
        }

        .testimonial-container {
            max-width: 48rem;
            margin: 0 auto;
            text-align: center;
        }

        .testimonial-quote {
            color: #44403c;
            font-style: italic;
            font-size: clamp(1rem, 2vw, 1.125rem);
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            font-weight: 600;
            color: #022c22;
            font-size: 0.875rem;
        }

        .testimonial-sub {
            font-size: 0.75rem;
            color: #78716c;
            margin-top: 0.25rem;
        }

        /* BANNER CTA BAWAH */
        .cta-banner {
            background-color: #FFF9F5;
            max-width: 80rem;
            margin: 4rem auto;
            border-radius: 1.5rem;
            padding: 3rem 1.5rem;
            text-align: center;
            border: 1px solid #FBECE3;
        }

        .cta-banner h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #022c22;
            margin-bottom: 1rem;
        }

        .cta-banner p {
            color: #57534e;
            max-width: 36rem;
            margin: 0 auto 2rem auto;
            font-size: 0.875rem;
            line-height: 1.6;
        }
    </style>
</head>

<body>

    @include('layout.header')

    <main>

        <!-- =========================
         HERO SECTION
    ========================== -->
        <section class="hero-section">
            <div>
                <span class="hero-badge">
                    SmartChild Community
                </span>
                <h1 class="hero-title">
                    Tumbuh Bersama Komunitas Orang Tua Hebat
                </h1>
                <p class="hero-desc">
                    Tempat bertukar pengalaman, berdiskusi mengenai problem harian anak, serta mengikuti sesi webinar edukasi terpandu. Menghubungkan ribuan ibu dan ayah se-Indonesia.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="#" class="btn-emerald">
                        Gabung Komunitas
                    </a>
                    <a href="#" class="btn-outline-emerald">
                        Jelajahi Forum Diskusi
                    </a>
                </div>
            </div>
            <div class="hero-img-wrapper">
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=800" alt="Community"
                    class="hero-img">
            </div>
        </section>


        <!-- =========================
         GRUP DISKUSI SESUAI TAHAP USIA
    ========================== -->
        <section class="container-max" style="padding-top: 4rem; padding-bottom: 4rem;">
            <div class="section-header-center">
                <h2 class="section-title">Grup Diskusi Sesuai Tahap Usia</h2>
                <p class="section-desc">Diskusikan topik terarah sesuai rentang umur si kecil saat ini</p>
            </div>

            <div class="grid-3">
                @foreach($groups as $group)
                    <div class="group-card">
                        <div>
                            <h3>{{ $group->title }}</h3>
                            <p>{{ $group->description }}</p>
                        </div>
                        <div>
                            <span class="group-member-count">{{ $group->member_count }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- =========================
         DISKUSI HANGAT HARI INI
    ========================== -->
        <section class="discussion-section">
            <div class="discussion-top-flex">
                <div>
                    <h2 style="font-size: 1.5rem; font-weight: 700; color: #022c22; margin-bottom: 0.25rem;">Diskusi Hangat Hari Ini</h2>
                    <p class="section-desc">Ikuti obrolan hangat seputar keseharian mendidik si kecil</p>
                </div>
                <a href="#" class="btn-orange">
                    Buat Thread Baru
                </a>
            </div>

            <div style="display: flex; flex-direction: column; gap: 1rem;">
                @foreach($threads as $thread)
                    <div class="thread-card">
                        <div class="thread-left">
                            <img src="{{ $thread->author_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100' }}"
                                alt="Avatar" class="thread-avatar">
                            <div>
                                <div class="thread-meta">
                                    <span class="thread-category">{{ $thread->category }}</span> •
                                    {{ $thread->author_name }}
                                </div>
                                <h4 class="thread-title">{{ $thread->title }}</h4>
                            </div>
                        </div>
                        <div class="thread-right">
                            <span class="thread-comment-count"><i class="far fa-comment"></i>
                                {{ $thread->comments_count }}</span>
                            <span>{{ $thread->time_ago }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- =========================
         WEBINAR & KELAS ONLINE MENDATANG
    ========================== -->
        <section class="container-max" style="padding-top: 4rem; padding-bottom: 4rem;">
            <div class="section-header-center">
                <h2 class="section-title">Webinar & Kelas Online Mendatang</h2>
                <p class="section-desc">Edukasi eksklusif tatap muka interaktif secara langsung via konferensi video</p>
            </div>

            <div class="grid-3">
                @foreach($webinars as $webinar)
                    <div class="webinar-card">
                        <div>
                            <img src="{{ $webinar->image }}" alt="Webinar" class="webinar-img">
                            <div class="webinar-body">
                                <span class="webinar-schedule">{{ $webinar->schedule }}</span>
                                <h3 class="webinar-title">{{ $webinar->title }}</h3>
                                <p class="webinar-speaker">Narasumber: {{ $webinar->speaker }}</p>
                            </div>
                        </div>
                        <div class="webinar-footer">
                            <a href="#" class="btn-webinar-daftar">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- =========================
         KISAH SUKSES ORANG TUA
    ========================== -->
        <section class="testimonial-section">
            <div class="testimonial-container">
                <h2 style="font-size: 1.5rem; font-weight: 700; color: #022c22; margin-bottom: 2rem;">Kisah Sukses Orang Tua</h2>
                <blockquote class="testimonial-quote">
                    "Semenjak gabung di komunitas SmartChild dan rutin melakukan asesmen bulanan, saya tidak lagi panik membandingkan tumbuh kembang anak saya dengan anak tetangga. Laporan milestones-nya sangat membantu saya berdiskusi dengan dokter spesialis anak."
                </blockquote>
                <div class="testimonial-author">Bunda Syafira & Kenzie (2 Tahun)</div>
                <div class="testimonial-sub">Anggota Komunitas sejak 2024</div>
            </div>
        </section>


        <!-- =========================
         CALL TO ACTION BAWAH
    ========================== -->
        <section class="cta-banner">
            <h2>Mari Menjadi Bagian dari Komunitas Kami</h2>
            <p>
                Temukan kenyamanan berbagi ilmu pola asuh dan berjejaring bersama orang tua di seluruh wilayah Nusantara secara gratis.
            </p>
            <a href="#" class="btn-emerald" style="padding: 0.875rem 2rem;">
                Daftar Komunitas Sekarang
            </a>
        </section>

    </main>

    @include('layout.footer')

</body>

</html>