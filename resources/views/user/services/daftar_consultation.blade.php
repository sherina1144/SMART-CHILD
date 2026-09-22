<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan Konsultasi Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #EEF3E9;
            color: #285B4D;
            line-height: 1.6;
        }
        .consultation-container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .consultation-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            border-bottom: 2px solid #c8d8c3;
            padding-bottom: 12px;
        }
        .consultation-header h2 {
            font-size: 22px;
            color: #285B4D;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .consultation-card {
            background: #faf8f5;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(40, 91, 77, 0.04);
            border: 1px solid #c8d8c3;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .consultation-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(40, 91, 77, 0.08);
        }
        
        /* Styling Layout Info Dokter (Foto Oval di Kiri & Info di Kanan) */
        .card-header-info {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
            padding-bottom: 14px;
            border-bottom: 1px solid #c8d8c3;
        }
        .doctor-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%; /* Membuat foto menjadi oval/lingkaran */
            object-fit: cover;
            border: 2px solid #c8d8c3;
        }
        .doctor-details .doc-name {
            font-size: 17px;
            font-weight: 700;
            color: #285B4D;
        }
        .doctor-details .doc-kat {
            font-size: 13px;
            color: #285B4D;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .doctor-details .doc-spes {
            font-size: 13px;
            color: #4a6b5d;
        }

        .consultation-card h4 {
            font-size: 15px;
            color: #285B4D;
            margin-bottom: 12px;
            font-weight: 600;
            background: #dce7d7;
            padding: 8px 12px;
            border-radius: 6px;
        }
        .consultation-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
            color: #4a6b5d;
            font-size: 14px;
            margin-bottom: 14px;
        }
        .consultation-info div {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .consultation-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #c8d8c3;
            padding-top: 12px;
            margin-top: 12px;
        }
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            display: inline-block;
        }
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: #faf8f5;
            border-radius: 12px;
            border: 2px dashed #c8d8c3;
            color: #4a6b5d;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(40, 91, 77, 0.02);
        }
    </style>
</head>
<body>

    @include('layout.header')

    <div class="consultation-container">
        <div class="consultation-header">
            <h2><i class="fa-solid fa-calendar-check" style="color: #285B4D;"></i> Daftar Pesanan Konsultasi Saya</h2>
        </div>
        
        <div class="consultation-list">
            @forelse($consultations as $item)
                <div class="consultation-card">
                    
                    <!-- Foto Oval di Kiri & Info Dokter di Kanan -->
                    @if($item->doctor)
                        <div class="card-header-info">
                            <img src="{{ asset('storage/' . $item->doctor->foto) }}" alt="{{ $item->doctor->nama_lengkap }}" class="doctor-avatar">
                            
                            <div class="doctor-details">
                                <div class="doc-name">{{ $item->doctor->nama_lengkap }}</div>
                                <div class="doc-kat">{{ $item->doctor->kategori }}</div>
                                <div class="doc-spes">
                                    <strong>Spesialisasi:</strong> {{ $item->doctor->spesialisasi }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Informasi Data Anak -->
                    <h4><i class="fa-solid fa-child" style="color: #285B4D; margin-right: 6px;"></i> Anak: {{ $item->child_name }} <span style="font-weight: 400; color: #4a6b5d;">({{ $item->child_age }} Tahun)</span></h4>
                    
                    <!-- Detail Jadwal & Tipe Konsultasi -->
                    <div class="consultation-info">
                        <div>
                            <i class="fa-regular fa-calendar" style="color: #285B4D;"></i> 
                            <span>{{ $item->booking_date }}</span>
                        </div>
                        <div>
                            <i class="fa-regular fa-clock" style="color: #285B4D;"></i> 
                            <span>{{ $item->booking_time }} WIB</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-video" style="color: #285B4D;"></i> 
                            <span>{{ $item->consultation_type }}</span>
                        </div>
                    </div>
                    
                    <!-- Status Pesanan -->
                    <div class="consultation-footer">
                        <span style="font-size: 13px; color: #4a6b5d;">Status Pesanan:</span>
                        <div>
                            @if(strtolower($item->status_konsultasi) == 'confirmed')
                                <span class="badge" style="background: #def7ec; color: #03543f;">Confirm</span>
                            @elseif(in_array(strtolower($item->status_konsultasi), ['cancelled', 'cancel', 'refunded']))
                                <span class="badge" style="background: #fde8e8; color: #9b1c1c;">Cancel</span>
                            @else
                                <span class="badge" style="background: #fef3c7; color: #92400e;">Process</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa-regular fa-folder-open" style="font-size: 36px; margin-bottom: 12px; color: #4a6b5d;"></i>
                    <p>Belum ada riwayat pemesanan konsultasi.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>