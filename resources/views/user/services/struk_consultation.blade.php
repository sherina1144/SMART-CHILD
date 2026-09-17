<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Ringkasan Konsultasi - SmartChild</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f7faf6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .receipt-card {
            background: #fdfbf7;
            border: 1px solid #e2ebd8;
            border-radius: 20px;
            width: 100%;
            max-width: 480px;
            padding: 28px 24px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
        }

        .receipt-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #1a3d2f;
            margin-bottom: 24px;
        }

        .receipt-header i {
            font-size: 20px;
            color: #4a7c59;
        }

        /* Doctor Info Box */
        .doctor-profile {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e8eee0;
            margin-bottom: 20px;
        }

        .doctor-profile img {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            object-fit: cover;
        }

        .doctor-info h3 {
            font-size: 16px;
            font-weight: 700;
            color: #1a3d2f;
        }

        .doctor-info p {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .doctor-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #4a5568;
            font-weight: 500;
        }

        .doctor-meta i {
            color: #f59e0b;
        }

        /* Detail List Row */
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #2d3748;
            font-weight: 600;
        }

        .detail-label i {
            font-size: 16px;
            color: #4a7c59;
            width: 20px;
            text-align: center;
        }

        .detail-value {
            font-weight: 600;
            color: #1a202c;
            text-align: right;
        }

        .divider {
            border-top: 2px dashed #d8e3ce;
            margin: 20px 0 16px 0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 15px;
            font-weight: 700;
            color: #1a3d2f;
        }

        .total-price {
            font-size: 20px;
            color: #1a3d2f;
            font-weight: 800;
        }

        .action-buttons {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-home {
            background-color: #4a7c59;
            color: #fff;
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-print {
            background: #fff;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 10px;
            border-radius: 10px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
    </style>
</head>
<body>

    <div class="receipt-card">
        <!-- Header Title -->
        <div class="receipt-header">
            <i class="fa-regular fa-clipboard"></i>
            <span>Ringkasan Konsultasi</span>
        </div>

        <!-- Profil Dokter Terpilih -->
        <div class="doctor-profile">
            <img src="{{ isset($consultation->doctor->foto) ? asset('storage/' . $consultation->doctor->foto) : 'https://via.placeholder.com/80' }}" alt="Dokter">
            <div class="doctor-info">
                <h3>{{ $consultation->doctor->nama_lengkap ?? 'dr. Anindya Putri, Sp.A' }}</h3>
                <p>{{ $consultation->doctor->kategori ?? 'Dokter Spesialis Anak' }}</p>
                <div class="doctor-meta">
                    <i class="fa-solid fa-star"></i>
                    <span>{{ $consultation->doctor->rating ?? '4.9' }}</span>
                    <span style="color: #cbd5e1; margin: 0 4px;">•</span>
                    <span>{{ $consultation->doctor->lama_pengalaman ?? '8' }} tahun pengalaman</span>
                </div>
            </div>
        </div>

        <!-- Detail Item -->
        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-solid fa-video"></i>
                <span>Jenis Konsultasi</span>
            </div>
            <div class="detail-value">{{ $consultation->consultation_type }} Consultation</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-regular fa-calendar-days"></i>
                <span>Tanggal</span>
            </div>
            <div class="detail-value">{{ \Carbon\Carbon::parse($consultation->booking_date)->translatedFormat('d F Y') }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-regular fa-clock"></i>
                <span>Waktu</span>
            </div>
            <div class="detail-value">{{ $consultation->booking_time }} WIB</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-regular fa-hourglass-half"></i>
                <span>Durasi</span>
            </div>
            <div class="detail-value">45 Menit</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-regular fa-credit-card"></i>
                <span>Metode Pembayaran</span>
            </div>
            <div class="detail-value">{{ $consultation->payment_method }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">
                <i class="fa-regular fa-money-bill-1"></i>
                <span>Biaya Konsultasi</span>
            </div>
            <div class="detail-value">Rp{{ number_format($consultation->doctor->harga ?? 150000, 0, ',', '.') }}</div>
        </div>

        <!-- Garis Putus-putus -->
        <div class="divider"></div>

        <!-- Total Pembayaran -->
        <div class="total-row">
            <span>Total Pembayaran</span>
            <span class="total-price">Rp{{ number_format($consultation->doctor->harga ?? 150000, 0, ',', '.') }}</span>
        </div>

        <!-- Tombol Tambahan -->
        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn-home">Kembali ke Beranda</a>
            <button onclick="window.print()" class="btn-print"><i class="fa-solid fa-print"></i> Cetak Struk</button>
        </div>
    </div>

</body>
</html>