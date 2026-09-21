<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor & Therapist - Smart Child</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfcfc; margin: 0; padding: 0 0 3rem 0; color: #333; }

        /* Styling Hero Header (Disesuaikan agar rapi & sejajar ke kanan) */
        .hero-section {
            background-color: #eef2ec; 
            padding: 4.5rem 2rem 3.5rem 2rem;
            margin-bottom: 2.5rem;
        }
        .hero-container {
            max-width: 1300px;
            margin: auto;
        }
        .hero-content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 40px;
            margin-bottom: 3rem;
        }
        .hero-text {
            flex: 1;
            padding-left: 20px; /* Menggeser sedikit ke kanan agar pas dengan layout */
        }
        .hero-text h1 {
            font-size: 2.8rem;
            color: #2c3e35;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 1.2rem;
        }
        .hero-text p {
            font-size: 1rem;
            color: #556058;
            line-height: 1.6;
            max-width: 580px;
        }
        .hero-image-box {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            padding-right: 10px;
        }
        .hero-image-box img {
            width: 100%;
            max-width: 550px;
            height: 280px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        }

        /* 3 Poin Fitur Unggulan di Bawah Hero */
        .hero-features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1300px;
            margin: auto;
            padding: 0 20px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .feature-icon-box {
            width: 45px;
            height: 45px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e35;
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            flex-shrink: 0;
        }
        .feature-text h4 {
            font-size: 0.95rem;
            color: #2c3e35;
            margin: 0 0 2px 0;
            font-weight: 700;
        }
        .feature-text p {
            font-size: 0.81rem;
            color: #667067;
            margin: 0;
        }

        /* Grid Layout */
        .doctor-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px; 
            max-width: 1300px; 
            margin: auto; 
            padding: 0 2rem;
        }

        /* Card Container */
        .card-doctor { 
            background: #ffffff; 
            border-radius: 20px; 
            padding: 20px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.04); 
            border: 1px solid #f0f0f0; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        /* Bagian Atas: Gambar + Info Dokter */
        .card-header-info {
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }

        /* Foto Oval Lonjong (Kapsul Vertikal) */
        .doctor-avatar {
            width: 100px;
            height: 140px;
            object-fit: cover;
            border-radius: 50px; /* Bikin efek oval lonjong */
            flex-shrink: 0;
        }

        .doctor-details {
            flex-grow: 1;
            padding-right: 25px; /* Beri jarak aman agar teks tidak menabrak icon */
        }

        .doc-name { 
            font-weight: 700; 
            color: #1e4d3b; 
            font-size: 0.95rem; 
            margin-bottom: 2px;
            line-height: 1.2;
        }

        .doc-kat { 
            color: #888; 
            font-size: 0.75rem; 
            margin-bottom: 12px; 
        }

        .doc-spes { 
            font-size: 0.78rem; 
            color: #666; 
            line-height: 1.3;
        }

        .doc-spes strong {
            color: #444;
            display: block;
            margin-bottom: 2px;
        }

        /* Badge Icon di Pojok Kanan Atas */
        .badge-icon {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 20px;
            height: 20px;
            z-index: 2;
        }

        /* Bagian Rating & Pengalaman */
        .doc-meta { 
            display: flex; 
            align-items: center;
            gap: 12px;
            font-size: 0.78rem; 
            color: #777; 
            margin: 18px 0 15px 0;
        }

        .doc-rating {
            color: #f39c12;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Tombol Aksi */
        .btn-group { 
            display: flex; 
            gap: 10px; 
        }

        .btn-outline { 
            flex: 1; 
            border: 1px solid #f26d5b; 
            color: #f26d5b; 
            background: transparent; 
            padding: 8px 0; 
            border-radius: 10px; 
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer; 
            text-align: center;
            text-decoration: none;
        }

        .btn-filled { 
            flex: 1; 
            border: none; 
            background: #f26d5b; 
            color: white; 
            padding: 8px 0; 
            border-radius: 10px; 
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer; 
            text-align: center;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content-wrapper { flex-direction: column; text-align: center; }
            .hero-text { padding-left: 0; }
            .hero-image-box { justify-content: center; width: 100%; padding-right: 0; }
            .hero-text p { margin: auto; }
            .hero-features { grid-template-columns: 1fr; gap: 15px; }
            .doctor-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .doctor-grid { grid-template-columns: 1fr; }
            .hero-text h1 { font-size: 2.2rem; }
        }
    </style>
</head>
<body>

    @include('layout.header')

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content-wrapper">
                <div class="hero-text">
                    <h1>Doctor and<br>Therapist</h1>
                    <p>Temukan dokter dan therapist terpercaya yang telah terverifikasi untuk memberikan layanan terbaik bagi tumbuh kembang anak. Pilih tenaga profesional sesuai kebutuhan, dengan jadwal yang fleksibel, layanan yang nyaman, serta proses konsultasi yang mudah dan dapat dilakukan secara offline maupun online.</p>
                </div>
                <div class="hero-image-box">
                    <!-- Menggunakan link gambar langsung tanpa perlu setup file storage lokal -->
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80" alt="Doctor and Therapist Team">
                </div>
            </div>

            <!-- 3 Poin Keunggulan -->
            <div class="hero-features">
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Beragam Spesialis</h4>
                        <p>Dokter, Psikolog, Terapis, dan Konselor profesional</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Terverifikasi</h4>
                        <p>Semua ahli telah melalui proses verifikasi</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <i class="fa-regular fa-calendar-days"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Jadwal Fleksibel</h4>
                        <p>Pilih waktu konsultasi yang sesuai untuk anda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GRID LIST DOCTOR -->
    <main class="doctor-grid">
        @foreach($doctors as $doctor)
        <div class="card-doctor">
            <!-- Badge Pojok Atas -->
            <svg class="badge-icon" viewBox="0 0 24 24" fill="none" stroke="#f26d5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="6"></circle>
                <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path>
            </svg>

            <!-- Foto Oval di Kiri & Info di Kanan -->
            <div class="card-header-info">
                <img src="{{ asset('storage/' . $doctor->foto) }}" alt="{{ $doctor->nama_lengkap }}" class="doctor-avatar">
                
                <div class="doctor-details">
                    <div class="doc-name">{{ $doctor->nama_lengkap }}</div>
                    <div class="doc-kat">{{ $doctor->kategori }}</div>
                    <div class="doc-spes">
                        <strong>Spesialisasi:</strong>
                        {{ $doctor->spesialisasi }}
                    </div>
                </div>
            </div>

            <!-- Rating & Pengalaman -->
            <div class="doc-meta">
                <span class="doc-rating">★ {{ number_format($doctor->rating, 1) }}</span>
                <span>{{ $doctor->lama_pengalaman }} tahun pengalaman</span>
            </div>

            <!-- Tombol -->
            <div class="btn-group">
                <a href="{{ route('user.doctor.show', $doctor->doctor_id) }}" class="btn-outline">Lihat profile</a>
                <a href="{{ route('user.consultation.create', $doctor->doctor_id) }}" class="btn-filled">Jadwalkan</a>
            </div>
        </div>
        @endforeach
    </main>

</body>
</html>