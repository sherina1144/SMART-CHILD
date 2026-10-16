
@extends('layout.dashboard_admin')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .consultation-page {
        font-family: 'Poppins', sans-serif;
        color: #253D32;
        padding-bottom: 30px;
        width: 100%;
        min-width: 0;
    }

    .consultation-page * {
        box-sizing: border-box;
    }

    .page-header {
        margin-bottom: 22px;
    }

    .page-header h1 {
        margin: 0 0 6px;
        font-size: 25px;
        font-weight: 700;
        color: #253D32;
    }

    .page-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
        line-height: 1.7;
    }

    /* Kartu utama */
    .consultation-card {
        width: 100%;
        min-width: 0;
        background: #FFFFFF;
        border: 1px solid #E8EEEA;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(37, 61, 50, 0.04);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .heading-left {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .heading-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #EDF5EF;
        color: #315C50;
        font-size: 17px;
    }

    .card-heading h2 {
        margin: 0 0 4px;
        color: #253D32;
        font-size: 15px;
        font-weight: 700;
    }

    .card-heading p {
        margin: 0;
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.6;
    }

    /* Notifikasi */
    .alert-message {
        padding: 12px 15px;
        margin-bottom: 16px;
        border-radius: 9px;
        font-size: 12px;
        line-height: 1.7;
    }

    .alert-success {
        color: #287345;
        background: #EDF7F0;
        border: 1px solid #D6EBDD;
    }

    .alert-error {
        color: #B83232;
        background: #FFF0F0;
        border: 1px solid #F6D7D7;
    }

    /* Tabel */
    .table-wrapper {
        width: 100%;
        max-width: 100%;
        min-width: 0;
        overflow-x: auto;
        border: 1px solid #E8EEEA;
        border-radius: 11px;
    }

    .consultation-table {
        width: 100%;
        min-width: 0;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 11px;
    }

    .consultation-table thead th {
        padding: 12px 8px;
        background: #F5F8F5;
        color: #52655A;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1px;
        text-align: left;
        vertical-align: middle;
        border-bottom: 1px solid #E8EEEA;
        overflow-wrap: break-word;
    }

    .consultation-table tbody td {
        padding: 13px 8px;
        color: #53645A;
        font-size: 11px;
        line-height: 1.7;
        vertical-align: top;
        border-bottom: 1px solid #EEF2EF;
        overflow-wrap: anywhere;
    }

    .consultation-table tbody tr:last-child td {
        border-bottom: none;
    }

    .consultation-table tbody tr {
        transition: background 0.2s ease;
    }

    .consultation-table tbody tr:hover {
        background: #FAFCFA;
    }

    /* Pembagian lebar kolom */
    .consultation-table th:nth-child(1),
    .consultation-table td:nth-child(1) {
        width: 4%;
    }

    .consultation-table th:nth-child(2),
    .consultation-table td:nth-child(2) {
        width: 16%;
    }

    .consultation-table th:nth-child(3),
    .consultation-table td:nth-child(3) {
        width: 14%;
    }

    .consultation-table th:nth-child(4),
    .consultation-table td:nth-child(4) {
        width: 20%;
    }

    .consultation-table th:nth-child(5),
    .consultation-table td:nth-child(5) {
        width: 14%;
    }

    .consultation-table th:nth-child(6),
    .consultation-table td:nth-child(6) {
        width: 13%;
    }

    .consultation-table th:nth-child(7),
    .consultation-table td:nth-child(7) {
        width: 19%;
    }

    /* Nomor */
    .number-cell {
        color: #8A9991 !important;
        font-weight: 600;
    }

    /* Data pasien */
    .patient-name {
        display: block;
        margin-bottom: 5px;
        color: #253D32;
        font-size: 11px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .parent-info {
        display: block;
        margin-top: 3px;
        color: #7A8A82;
        font-size: 10px;
        line-height: 1.7;
        overflow-wrap: anywhere;
    }

    /* Jadwal, kontak, dan alamat */
    .table-detail {
        display: flex;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 7px;
        min-width: 0;
    }

    .table-detail:last-child {
        margin-bottom: 0;
    }

    .table-detail i {
        width: 13px;
        margin-top: 4px;
        flex-shrink: 0;
        color: #7A9B8A;
        font-size: 10px;
    }

    .table-detail span {
        flex: 1;
        min-width: 0;
        overflow-wrap: anywhere;
    }

    .contact-value {
        font-size: 11px;
        line-height: 1.7;
    }

    .address-value {
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.7;
    }

    .address-value span {
        word-break: normal;
        overflow-wrap: anywhere;
    }

    /* Jenis konsultasi dan status */
    .type-badge,
    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        max-width: 100%;
        padding: 5px 8px;
        border-radius: 7px;
        font-size: 10px;
        font-weight: 600;
        line-height: 1.5;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .type-badge {
        margin-top: 5px;
        background: #EDF3FA;
        color: #47698A;
    }

    .status-paid,
    .status-confirmed {
        background: #EDF7F0;
        color: #287345;
    }

    .status-unpaid,
    .status-cancelled {
        background: #FFF0F0;
        color: #B83232;
    }

    .status-process {
        background: #FFF5DF;
        color: #986A13;
    }

    .status-completed {
        background: #EDF3FA;
        color: #47698A;
    }

    .payment-method {
        display: block;
        margin-bottom: 7px;
        color: #34483D;
        font-size: 10px;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    /* Tombol aksi */
    .action-buttons {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        gap: 6px;
        margin-top: 9px;
    }

    .action-buttons form {
        margin: 0;
        max-width: 100%;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 9px;
        border: none;
        border-radius: 7px;
        font-family: 'Poppins', sans-serif;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .action-confirm {
        color: #FFFFFF;
        background: #315C50;
    }

    .action-confirm:hover {
        background: #253D32;
    }

    .action-cancel {
        color: #B83232;
        background: #FFF0F0;
    }

    .action-cancel:hover {
        background: #FFE0E0;
    }

    .action-done {
        display: block;
        margin-top: 8px;
        color: #89948D;
        font-size: 10px;
        line-height: 1.6;
    }

    /* Data kosong */
    .empty-state {
        padding: 42px 20px !important;
        text-align: center;
        color: #849189 !important;
    }

    .empty-state i {
        display: block;
        margin-bottom: 12px;
        color: #A3B899;
        font-size: 29px;
    }

    .empty-state p {
        margin: 0;
        font-size: 12px;
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-wrapper nav p {
        color: #7A8A82;
        font-size: 12px;
    }

    @media (max-width: 1100px) {
        .consultation-card {
            padding: 16px;
        }

        .consultation-table thead th,
        .consultation-table tbody td {
            padding-left: 6px;
            padding-right: 6px;
        }

        .action-buttons {
            gap: 5px;
        }

        .action-button {
            padding: 7px 8px;
            font-size: 9px;
        }
    }

    @media (max-width: 700px) {
        .page-header h1 {
            font-size: 22px;
        }

        .consultation-card {
            padding: 12px;
        }

        .card-heading {
            align-items: flex-start;
        }

        .consultation-table {
            min-width: 850px;
        }
    }
</style>

<div class="consultation-page">

    <div class="page-header">
        <h1>Daftar Konsultasi</h1>
        <p>Kelola pemesanan dan pantau status konsultasi pasien SmartChild.</p>
    </div>

    <div class="consultation-card">

        <div class="card-heading">
            <div class="heading-left">
                <div class="heading-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div>
                    <h2>Daftar Pemesanan Konsultasi</h2>
                    <p>Informasi pasien, jadwal, pembayaran, dan status konsultasi.</p>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-message alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-message alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-message alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="table-wrapper">
            <table class="consultation-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien & Orang Tua</th>
                        <th>Jadwal & Tipe</th>
                        <th>Kontak & Alamat</th>
                        <th>Keluhan</th>
                        <th>Pembayaran</th>
                        <th>Status & Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($consultations as $index => $item)
                        @php
                            $statusKonsultasi = strtolower(trim($item->status_konsultasi ?? ''));
                            $statusPembayaran = strtolower(trim($item->payment_status ?? ''));

                            $statusLabels = [
                                'scheduled' => 'Terjadwal',
                                'pending' => 'Menunggu',
                                'confirmed' => 'Dikonfirmasi',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'completed' => 'Selesai',
                                'selesai' => 'Selesai',
                                'cancelled' => 'Dibatalkan',
                                'cancel' => 'Dibatalkan',
                                'rejected' => 'Ditolak',
                                'ditolak' => 'Ditolak',
                                'refunded' => 'Dana Dikembalikan',
                            ];

                            $paymentLabels = [
                                'unpaid' => 'Belum Dibayar',
                                'paid' => 'Sudah Dibayar',
                                'pending' => 'Menunggu',
                                'success' => 'Berhasil',
                                'cancelled' => 'Dibatalkan',
                                'cancel' => 'Dibatalkan',
                                'refunded' => 'Dana Dikembalikan',
                                'dikonfirmasi' => 'Dikonfirmasi',
                                'ditolak' => 'Ditolak',
                            ];

                            $statusClass = 'status-process';

                            if (in_array($statusKonsultasi, ['confirmed', 'dikonfirmasi'])) {
                                $statusClass = 'status-confirmed';
                            } elseif (in_array($statusKonsultasi, ['completed', 'selesai'])) {
                                $statusClass = 'status-completed';
                            } elseif (in_array($statusKonsultasi, [
                                'cancelled',
                                'cancel',
                                'rejected',
                                'ditolak',
                                'refunded'
                            ])) {
                                $statusClass = 'status-cancelled';
                            }

                            $paymentClass = 'status-process';

                            if (in_array($statusPembayaran, [
                                'paid',
                                'success',
                                'dikonfirmasi'
                            ])) {
                                $paymentClass = 'status-paid';
                            } elseif (in_array($statusPembayaran, [
                                'cancelled',
                                'cancel',
                                'refunded',
                                'ditolak'
                            ])) {
                                $paymentClass = 'status-cancelled';
                            } elseif (in_array($statusPembayaran, [
                                'unpaid',
                                'pending',
                                ''
                            ])) {
                                $paymentClass = 'status-unpaid';
                            }

                            $idKonsultasi = $item->consultation_id ?? $item->id;
                        @endphp

                        <tr>
                            <td class="number-cell">
                                {{ $consultations->firstItem() + $index }}
                            </td>

                            <td>
                                <span class="patient-name">
                                    {{ $item->child_name ?: '-' }}
                                </span>

                                <span class="parent-info">
                                    {{ $item->child_age ?? '-' }} tahun ·
                                    {{ $item->child_gender ?: '-' }}
                                </span>

                                <span class="parent-info">
                                    Wali: {{ $item->parent_name ?: '-' }}
                                </span>
                            </td>

                            <td>
                                <div class="table-detail">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>
                                        @if($item->booking_date)
                                            {{ \Carbon\Carbon::parse($item->booking_date)->format('d M Y') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>

                                <div class="table-detail">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>{{ $item->booking_time ?: '-' }}</span>
                                </div>

                                <span class="type-badge">
                                    {{ $item->consultation_type ?: '-' }}
                                </span>
                            </td>

                            <td>
                                <div class="table-detail contact-value">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>{{ $item->phone_number ?: '-' }}</span>
                                </div>

                                <div class="table-detail contact-value">
                                    <i class="fa-regular fa-envelope"></i>
                                    <span>{{ $item->email ?: '-' }}</span>
                                </div>

                                <div class="table-detail address-value">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{ $item->address ?: '-' }}</span>
                                </div>
                            </td>

                            <td>
                                {{ $item->complaint ?: '-' }}
                            </td>

                            <td>
                                <span class="payment-method">
                                    {{ $item->payment_method ?: '-' }}
                                </span>

                                <span class="status-badge {{ $paymentClass }}">
                                    {{ $paymentLabels[$statusPembayaran] ?? ($item->payment_status ?: 'Belum Dibayar') }}
                                </span>
                            </td>

                            <td>
                                <span class="status-badge {{ $statusClass }}">
                                    {{ $statusLabels[$statusKonsultasi] ?? ($item->status_konsultasi ?: 'Menunggu') }}
                                </span>

                                @if(!in_array($statusKonsultasi, [
                                    'completed',
                                    'selesai',
                                    'cancelled',
                                    'cancel',
                                    'refunded',
                                    'rejected',
                                    'ditolak'
                                ]))
                                    <div class="action-buttons">

                                        <form
                                            action="{{ route('admin.consultation.updateStatus', $idKonsultasi) }}"
                                            method="POST"
                                            onsubmit="return confirm('Konfirmasi konsultasi ini?')"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="confirmed">

                                            <button
                                                type="submit"
                                                class="action-button action-confirm"
                                            >
                                                Konfirmasi
                                            </button>
                                        </form>

                                        <form
                                            action="{{ route('admin.consultation.updateStatus', $idKonsultasi) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menolak konsultasi ini?')"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="status" value="cancel">

                                            <button
                                                type="submit"
                                                class="action-button action-cancel"
                                            >
                                                Tolak
                                            </button>
                                        </form>

                                    </div>
                                @else
                                    <span class="action-done">Tidak ada aksi</span>
                                @endif
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <i class="fa-regular fa-calendar-xmark"></i>
                                    <p>Belum ada data pemesanan konsultasi.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper">
            {{ $consultations->links() }}
        </div>

    </div>
</div>

@endsection
