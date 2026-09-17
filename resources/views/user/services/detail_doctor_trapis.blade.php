<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil {{ $doctor->nama_lengkap }} - Smart Child</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfcfc; margin: 0; padding: 2rem; color: #333; }
        
        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #f0f0f0;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #1e4d3b;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .profile-header {
            display: flex;
            gap: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 30px;
            margin-bottom: 30px;
        }

        /* Foto Oval Lonjong (Kapsul Vertikal) */
        .doctor-avatar-large {
            width: 160px;
            height: 220px;
            object-fit: cover;
            border-radius: 70px;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .profile-info {
            flex-grow: 1;
        }

        .doc-name {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e4d3b;
            margin: 0 0 5px 0;
        }

        .doc-category {
            color: #888;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .badge-rating {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #fff8e7;
            color: #f39c12;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
            margin-right: 10px;
        }

        .badge-exp {
            display: inline-flex;
            background: #e8f5e9;
            color: #2e7d32;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .detail-card {
            background: #f9fbf9;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #eef2ee;
        }

        .detail-card h4 {
            margin: 0 0 8px 0;
            color: #1e4d3b;
            font-size: 0.95rem;
        }

        .detail-card p {
            margin: 0;
            color: #555;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .price-tag {
            font-size: 1.3rem;
            font-weight: bold;
            color: #f26d5b;
        }

        .action-footer {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-schedule {
            background: #f26d5b;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        @media (max-width: 650px) {
            .profile-header { flex-direction: column; align-items: center; text-align: center; }
            .detail-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
@include('layout.header')
    <div class="container">
        <!-- Tombol Kembali -->
        <a href="{{ route('user.doctor.index') }}" class="btn-back">
            ← Kembali ke Daftar Dokter
        </a>

        <!-- Header Profil -->
        <div class="profile-header">
            <img src="{{ asset('storage/' . $doctor->foto) }}" alt="{{ $doctor->nama_lengkap }}" class="doctor-avatar-large">
            
            <div class="profile-info">
                <h1 class="doc-name">{{ $doctor->nama_lengkap }}</h1>
                <div class="doc-category">{{ $doctor->kategori }}</div>

                <div>
                    <span class="badge-rating">★ {{ number_format($doctor->rating, 1) }}</span>
                    <span class="badge-exp">{{ $doctor->lama_pengalaman }} Tahun Pengalaman</span>
                </div>
            </div>
        </div>

        <!-- Detail Data Lengkap -->
        <div class="detail-grid">
            <div class="detail-card">
                <h4>Spesialisasi</h4>
                <p>{{ $doctor->spesialisasi }}</p>
            </div>

            <div class="detail-card">
                <h4>Biaya Konsultasi</h4>
                <p class="price-tag">Rp {{ number_format($doctor->biaya_konsultasi, 0, ',', '.') }}</p>
            </div>

            <div class="detail-card">
                <h4>Jadwal Praktik</h4>
                <p>{{ $doctor->jadwal_praktik ?? 'Hubungi admin untuk ketersediaan jadwal.' }}</p>
            </div>

            <div class="detail-card">
                <h4>Status Ketersediaan</h4>
                <p style="color: #2e7d32; font-weight: 600;">Tersedia untuk Janji Temu</p>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="action-footer">
            <a href="{{ route('user.consultation.create', $doctor->doctor_id) }}" class="btn-schedule">Jadwalkan Konsultasi</a>
        </div>
    </div>

</body>
</html>