<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor & Therapist - Smart Child</title>
    <style>
        * { box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fcfcfc; margin: 0; padding: 2rem; color: #333; }

        /* Grid Layout */
        .doctor-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 20px; 
            max-width: 1300px; 
            margin: auto; 
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
            top: 20px;
            right: 20px;
            width: 22px;
            height: 22px;
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
        }

        /* Beri jarak aman di sebelah kanan container info agar teks tidak menabrak icon */
        .doctor-details {
            flex-grow: 1;
            padding-right: 25px; 
        }

        /* Pastikan posisi icon lencana terkunci rapi di pojok kanan atas */
        .badge-icon {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 20px;
            height: 20px;
            z-index: 2;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .doctor-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .doctor-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

 @include('layout.header')

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