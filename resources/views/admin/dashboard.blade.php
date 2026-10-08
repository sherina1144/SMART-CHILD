@extends('layout.dashboard_admin')

@section('content')

<style>
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .dashboard-title h1 {
        font-size: 28px;
        font-weight: 700;
        color: #253D32;
        margin-bottom: 6px;
    }

    .dashboard-title p {
        font-size: 14px;
        color: #7A8A82;
        margin: 0;
    }

    .welcome-card {
        background: linear-gradient(135deg, #253D32, #314E41);
        border-radius: 18px;
        padding: 28px 32px;
        color: #ffffff;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }

    .welcome-card::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(243, 156, 80, 0.12);
        right: -50px;
        top: -60px;
    }

    .welcome-card h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
        position: relative;
        z-index: 1;
    }

    .welcome-card p {
        font-size: 13px;
        color: #DCE7E1;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 18px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #E8EEEA;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(37, 61, 50, 0.04);
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #F5E8DC;
        color: #F39C50;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .stat-info span {
        display: block;
        font-size: 12px;
        color: #7A8A82;
        margin-bottom: 4px;
    }

    .stat-info strong {
        display: block;
        font-size: 22px;
        font-weight: 700;
        color: #253D32;
    }

    .dashboard-section {
        background: #ffffff;
        border: 1px solid #E8EEEA;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(37, 61, 50, 0.04);
    }

    .section-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title h3 {
        font-size: 17px;
        font-weight: 700;
        color: #253D32;
        margin: 0;
    }

    .section-title span {
        font-size: 12px;
        color: #7A8A82;
    }

    /* =====================================================
       AKTIVITAS
    ===================================================== */

    .activity-list {
        display: flex;
        flex-direction: column;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 0;
        border-bottom: 1px solid #EEF2EF;
    }

    .activity-item:first-child {
        padding-top: 0;
    }

    .activity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .activity-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #F5E8DC;
        color: #F39C50;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 16px;
    }

    .activity-content {
        flex: 1;
    }

    .activity-content h4 {
        margin: 0 0 4px;
        font-size: 13px;
        font-weight: 600;
        color: #253D32;
    }

    .activity-content p {
        margin: 0;
        font-size: 11px;
        color: #7A8A82;
    }

    .activity-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 12px;
        border-radius: 8px;
        background: #FFF9F2;
        border: 1px solid #E8E4DC;
        color: #315C50;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .activity-action:hover {
        background: #F4EFE7;
        color: #315C50;
    }

    .empty-state {
        text-align: center;
        padding: 35px 20px;
        color: #8A9991;
    }

    .empty-state i {
        font-size: 32px;
        margin-bottom: 12px;
        color: #A3B899;
    }

    .empty-state p {
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 1200px) {

        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    @media (max-width: 900px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media (max-width: 650px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .main-wrapper {
            padding: 20px;
        }

        .activity-item {
            align-items: flex-start;
        }

        .activity-action {
            padding: 6px 10px;
        }

    }
</style>


{{-- =====================================================
     HEADER
===================================================== --}}

<div class="dashboard-header">

    <div class="dashboard-title">

        <h1>
            Dashboard
        </h1>

        <p>
            Kelola dan pantau aktivitas SmartChild melalui halaman admin.
        </p>

    </div>

</div>


{{-- =====================================================
     WELCOME
===================================================== --}}

<div class="welcome-card">

    <h2>
        Halo, {{ Auth::user()->nama ?? 'Admin' }} 👋
    </h2>

    <p>
        Selamat datang di Dashboard Admin SmartChild.
    </p>

</div>


{{-- =====================================================
     STATISTIK
===================================================== --}}

<div class="stats-grid">


    {{-- TOTAL DOKTER --}}

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-user-doctor"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Dokter
            </span>

            <strong>
                {{ $totalDokter }}
            </strong>

        </div>

    </div>


    {{-- TOTAL PRODUK --}}

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-box-open"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Produk
            </span>

            <strong>
                {{ $totalProduk }}
            </strong>

        </div>

    </div>


    {{-- TOTAL PESANAN --}}

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-receipt"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Pesanan
            </span>

            <strong>
                {{ $totalPesanan }}
            </strong>

        </div>

    </div>


    {{-- TOTAL KONSULTASI --}}

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-calendar-check"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Konsultasi
            </span>

            <strong>
                {{ $totalKonsultasi }}
            </strong>

        </div>

    </div>


    {{-- TOTAL PARTNERSHIP --}}

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-handshake"></i>
        </div>

        <div class="stat-info">

            <span>
                Total Partnership
            </span>

            <strong>
                {{ $totalPartnership }}
            </strong>

        </div>

    </div>

</div>


{{-- =====================================================
     AKTIVITAS TERBARU
===================================================== --}}

<div class="dashboard-section">

    <div class="section-title">

        <h3>
            Aktivitas Terbaru
        </h3>

        <span>
            SmartChild Admin
        </span>

    </div>


        @php

        $pesananMenunggu = \App\Models\Order::where(
            'payment_status',
            'Menunggu Konfirmasi'
        )
        ->get();

        $konsultasiMenunggu = \App\Models\Consultation::where(
            'status_konsultasi',
            'Scheduled'
        )
        ->get();

        $partnershipMenunggu = \App\Models\Partnership::where(
            'status',
            'Process'
        )
        ->get();


        /*
        |--------------------------------------------------------------------------
        | GABUNGKAN SEMUA AKTIVITAS
        |--------------------------------------------------------------------------
        */

        $aktivitasTerbaru = collect();


        foreach ($pesananMenunggu as $order) {

            $aktivitasTerbaru->push([
                'type' => 'order',
                'data' => $order,
                'created_at' => $order->created_at,
            ]);

        }


        foreach ($konsultasiMenunggu as $consultation) {

            $aktivitasTerbaru->push([
                'type' => 'consultation',
                'data' => $consultation,
                'created_at' => $consultation->created_at,
            ]);

        }


        foreach ($partnershipMenunggu as $partnership) {

            $aktivitasTerbaru->push([
                'type' => 'partnership',
                'data' => $partnership,
                'created_at' => $partnership->created_at,
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | URUTKAN DARI YANG TERBARU
        |--------------------------------------------------------------------------
        */

        $aktivitasTerbaru = $aktivitasTerbaru
            ->sortByDesc('created_at')
            ->take(5)
            ->values();

    @endphp


    @if($aktivitasTerbaru->count() > 0)

        <div class="activity-list">

            @foreach($aktivitasTerbaru as $aktivitas)

                @if($aktivitas['type'] === 'order')

                    @php
                        $order = $aktivitas['data'];
                    @endphp

                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>

                        <div class="activity-content">

                            <h4>
                                Pesanan Baru
                            </h4>

                            <p>
                                Pesanan
                                <strong>
                                    {{ $order->nomor_order }}
                                </strong>
                                menunggu konfirmasi pembayaran.
                            </p>

                        </div>

                        <a
                            href="{{ route(
                                'admin.orders.show',
                                $order->order_id
                            ) }}"
                            class="activity-action"
                        >
                            Lihat

                            <i
                                class="fa-solid fa-chevron-right"
                                style="margin-left: 6px;"
                            ></i>
                        </a>

                    </div>


                @elseif($aktivitas['type'] === 'consultation')

                    @php
                        $consultation = $aktivitas['data'];
                    @endphp

                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>

                        <div class="activity-content">

                            <h4>
                                Konsultasi Baru
                            </h4>

                            <p>
                                Konsultasi dari
                                <strong>
                                    {{ $consultation->parent_name }}
                                </strong>
                                menunggu konfirmasi.
                            </p>

                        </div>

                        <a
                            href="{{ route('admin.consultation.index') }}"
                            class="activity-action"
                        >
                            Lihat

                            <i
                                class="fa-solid fa-chevron-right"
                                style="margin-left: 6px;"
                            ></i>
                        </a>

                    </div>


                @elseif($aktivitas['type'] === 'partnership')

                    @php
                        $partnership = $aktivitas['data'];
                    @endphp

                    <div class="activity-item">

                        <div class="activity-icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>

                        <div class="activity-content">

                            <h4>
                                Partnership Baru
                            </h4>

                            <p>
                                Pengajuan partnership dari
                                <strong>
                                    {{ $partnership->nama_instansi }}
                                </strong>
                                menunggu tindakan admin.
                            </p>

                        </div>

                        <a
                            href="{{ route('admin.partnership') }}"
                            class="activity-action"
                        >
                            Lihat

                            <i
                                class="fa-solid fa-chevron-right"
                                style="margin-left: 6px;"
                            ></i>
                        </a>

                    </div>

                @endif

            @endforeach

        </div>

    @else

        <div class="empty-state">

            <i class="fa-solid fa-circle-check"></i>

            <p>
                Tidak ada aktivitas yang membutuhkan tindakan saat ini.
            </p>

        </div>

    @endif

</div>


@endsection