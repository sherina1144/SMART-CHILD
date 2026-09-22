<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment - Smart Child</title>

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
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* LAYOUT CONTAINER */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 4rem;
        }

        /* BUTTONS */
        .btn-primary {
            background-color: #E07A5F;
            color: #ffffff;
            font-weight: 600;
            padding: 0.9rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(224, 122, 95, 0.2);
            transition: background-color 0.2s ease, transform 0.1s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #d0694e;
        }

        .btn-secondary {
            background-color: #ffffff;
            border: 1px solid #CBD5E0;
            color: #4A5568;
            font-weight: 600;
            padding: 0.9rem 1.5rem;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: background-color 0.2s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-secondary:hover {
            background-color: #F7FAFC;
        }

        /* SECTION 1: HERO */
        .hero-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            padding-top: 1rem;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .hero-badge {
            display: inline-block;
            background-color: rgba(244, 208, 111, 0.2);
            color: #C17C43;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.85rem;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            width: fit-content;
        }

        .hero-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            color: #1E3A2F;
            line-height: 1.2;
        }

        .hero-desc {
            color: #4A5568;
            font-size: 1rem;
            line-height: 1.7;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .hero-image img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            border-radius: 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
        }

        /* SECTION 2 & 3: HOW IT WORKS & CATEGORIES */
        .section-header {
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: clamp(1.5rem, 3vw, 2.25rem);
            font-weight: 800;
            color: #1E3A2F;
        }

        .section-subtitle {
            color: #718096;
            font-size: 0.9rem;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .grid-5 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #FFEDD5;
            position: relative;
        }

        .card-number {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background-color: #E07A5F;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            margin-bottom: 1rem;
        }

        .card-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 0.75rem;
            background-color: #FFF7ED;
            color: #E07A5F;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .card h3 {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1E3A2F;
            margin-bottom: 0.5rem;
        }

        .card p {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .col-span-2 {
            grid-column: span 2;
        }

        /* SECTION 4: MILESTONES REPORT */
        .milestone-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .milestone-img-card {
            background: #ffffff;
            padding: 1rem;
            border-radius: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            border: 1px solid #F7FAFC;
        }

        .milestone-img-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 1rem;
        }

        .progress-group {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .progress-item {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .progress-bar-bg {
            width: 100%;
            background-color: #E2E8F0;
            height: 0.65rem;
            border-radius: 9999px;
            overflow: hidden;
        }

        .progress-fill-green {
            background-color: #1E4D2B;
            height: 100%;
            border-radius: 9999px;
        }

        .progress-fill-orange {
            background-color: #E07A5F;
            height: 100%;
            border-radius: 9999px;
        }

        /* RESPONSIVE BREAKPOINTS */
        @media (max-width: 900px) {

            .hero-section,
            .milestone-section {
                grid-template-columns: 1fr;
            }

            .grid-3,
            .grid-5 {
                grid-template-columns: 1fr;
            }

            .col-span-2 {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

    <!-- Memanggil Header Terpisah -->
    @include('layout.header')

    <main class="main-container">

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <span class="hero-badge">
                    SmartChild Assessment
                </span>
                <h1 class="hero-title">
                    Kenali Tumbuh Kembang Si Kecil Secara Ilmiah
                </h1>
                <p class="hero-desc">
                    Asesmen tumbuh kembang terstandar untuk membantu mendeteksi pencapaian aspek kognitif, motorik,
                    bahasa, dan sosial emosional anak. Dapatkan rekomendasi aktivitas stimulasi personal dari tim ahli.
                </p>
                <div class="hero-buttons">
                    <a href="#" class="btn-primary">
                        Mulai Assessment Sekarang
                    </a>
                    <a href="#" class="btn-secondary">
                        Pelajari Selengkapnya
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=800&q=80"
                    alt="Ibu dan Anak Bermain">
            </div>
        </section>

        <!-- Bagaimana Asesmen Bekerja? -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Bagaimana Asesmen Bekerja?</h2>
                <p class="section-subtitle">Hanya butuh 3 langkah mudah untuk mulai memahami potensi si kecil</p>
            </div>

            <div class="grid-3">
                <div class="card">
                    <div class="card-number">01</div>
                    <h3>1. Isi Data Anak</h3>
                    <p>Lengkapi profil anak seperti nama, tanggal lahir, dan jenis kelamin agar asesmen disesuaikan
                        secara presisi dengan usianya.</p>
                </div>
                <div class="card">
                    <div class="card-number">02</div>
                    <h3>2. Jawab Pertanyaan</h3>
                    <p>Jawab pertanyaan sederhana mengenai aktivitas harian dan respon anak dengan pilihan Ya,
                        Kadang-kadang, atau Belum.</p>
                </div>
                <div class="card">
                    <div class="card-number">03</div>
                    <h3>3. Lihat Hasil & Saran</h3>
                    <p>Dapatkan laporan skor perkembangan komprehensif beserta kurva milestones dan daftar aktivitas
                        rekomendasi stimulasi.</p>
                </div>
            </div>
        </section>

        <!-- Kategori Aspek Perkembangan -->
        <section>
            <div class="section-header">
                <h2 class="section-title">Kategori Aspek Perkembangan</h2>
                <p class="section-subtitle">Asesmen SmartChild melingkupi 5 pilar pertumbuhan utama</p>
            </div>

            <div class="grid-5">
                <div class="card">
                    <div class="card-icon">🧠</div>
                    <h3>Perkembangan Kognitif</h3>
                    <p>Mengukur kemampuan berpikir anak, memecahkan masalah, mengingat, dan memahami dunia sekitar
                        mereka.</p>
                </div>
                <div class="card">
                    <div class="card-icon">⚡</div>
                    <h3>Motorik Kasar & Halus</h3>
                    <p>Menilai keterampilan otot besar (berlari, melompat) serta otot kecil tangan (menulis, menggenggam
                        mainan).</p>
                </div>
                <div class="card">
                    <div class="card-icon">💬</div>
                    <h3>Kemampuan Bahasa</h3>
                    <p>Mengevaluasi pemahaman anak terhadap kata-kata serta cara mereka mengekspresikan diri secara
                        verbal.</p>
                </div>
                <div class="card">
                    <div class="card-icon">👥</div>
                    <h3>Sosial & Kemandirian</h3>
                    <p>Melihat interaksi anak dengan teman sebaya, anggota keluarga, serta kemampuan melakukan rutinitas
                        sendiri.</p>
                </div>
                <div class="card col-span-2">
                    <div class="card-icon">😊</div>
                    <h3>Kestabilan Emosional</h3>
                    <p>Mendeteksi kecerdasan emosi, regulasi diri saat tantrum, serta empati yang ditunjukkan anak.</p>
                </div>
            </div>
        </section>

        <!-- Laporan Milestones Komprehensif -->
        <section class="milestone-section">
            <div class="milestone-img-card">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80"
                    alt="Grafik Milestone">
            </div>
            <div class="hero-content">
                <h2 class="section-title">Laporan Milestones Komprehensif</h2>
                <p class="hero-desc">
                    Laporan perkembangan anak dirancang mudah dipahami oleh orang tua. Setiap aspek dinilai menggunakan
                    visual grafik radar chart yang intuitif, lengkap dengan keterangan zona aman atau memerlukan
                    stimulasi ekstra.
                </p>
                <div class="progress-group">
                    <div class="progress-item">
                        <div class="progress-info">
                            <span style="color: #4A5568;">Kognitif (Memori & Logika)</span>
                            <span style="color: #1E4D2B;">85% - Sesuai Harapan</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill-green" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-info">
                            <span style="color: #4A5568;">Motorik Halus (Koordinasi Tangan)</span>
                            <span style="color: #E07A5F;">60% - Butuh Stimulasi</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill-orange" style="width: 60%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Memanggil Footer Terpisah -->
    @include('layout.footer')

</body>

</html>