@extends('layout.dashboard_dokter')

@section('content')
<style>
    .welcome-card {
        background: linear-gradient(135deg, #285B4D 0%, #1e463a 100%);
        color: white;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .welcome-card h2 {
        margin: 0 0 8px 0;
        font-size: 24px;
        font-weight: 700;
    }
    .welcome-card p {
        margin: 0;
        opacity: 0.9;
        font-size: 14px;
    }
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 20px 24px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        display: flex;
        align-items: center;
        gap: 20px;
        border-left: 5px solid #285B4D;
    }
    .stat-card.pending {
        border-left-color: #f59e0b;
    }
    .stat-card.completed {
        border-left-color: #10b981;
    }
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
    .stat-card.pending .stat-icon {
        background: #fef3c7;
        color: #d97706;
    }
    .stat-card.completed .stat-icon {
        background: #def7ec;
        color: #03543f;
    }
    .stat-info h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #1a202c;
    }
    .stat-info p {
        margin: 4px 0 0 0;
        font-size: 13px;
        color: #64748b;
        font-weight: 600;
    }
</style>

<!-- Sapaan Dokter & Info Profil -->
<div class="welcome-card">
    <div>
        <h2>Selamat Datang, {{ $doctor->nama_lengkap ?? auth()->user()->name }}! 👋</h2>
        <p>Semoga hari Anda menyenangkan dalam mendampingi tumbuh kembang anak dan pasien hari ini.</p>
    </div>
    <div style="text-align: right; display: flex; align-items: center; gap: 15px;">
        <!-- Icon Notifikasi dengan Badge Dinamis -->
        <div style="position: relative; background: rgba(255, 255, 255, 0.2); padding: 10px 14px; border-radius: 12px; cursor: pointer;">
            <i class="fa-solid fa-bell" style="font-size: 18px;"></i>
            @if(isset($pendingCount) && $pendingCount > 0)
                <span style="position: absolute; top: -5px; right: -5px; background: #ef4444; color: white; font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 50px;">
                    {{ $pendingCount }}
                </span>
            @endif
        </div>
    </div>
</div>

<!-- Kartu Statistik Jumlah Konsultasi -->
<div class="stats-container">
    <!-- Kartu Belum Selesai / Pending -->
    <div class="stat-card pending">
        <div class="stat-icon">
            <i class="fa-solid fa-clock-rotate-left"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $pendingCount ?? 0 }}</h3>
            <p>Konsultasi Belum Selesai</p>
        </div>
    </div>

    <!-- Kartu Sudah Selesai / Completed -->
    <div class="stat-card completed">
        <div class="stat-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div class="stat-info">
            <h3>{{ $completedCount ?? 0 }}</h3>
            <p>Konsultasi Selesai</p>
        </div>
    </div>
</div>

@endsection