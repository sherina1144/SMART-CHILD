@extends('layout.dashboard_admin')

@section('content')
<style>
    .card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .header-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .header-title h2 {
        font-size: 20px;
        color: #1a202c;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #edf2f7;
    }
    th {
        background-color: #f8fafc;
        color: #4a5568;
        font-weight: 600;
    }
    tr:hover {
        background-color: #f8fafc;
    }
    /* Badge Status */
    .badge {
        padding: 4px 8px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }
    .badge-paid {
        background-color: #def7ec;
        color: #03543f;
    }
    .badge-unpaid {
        background-color: #fde8e8;
        color: #9b1c1c;
    }
    .badge-type {
        background-color: #e1effe;
        color: #1e429f;
    }
    .badge-status {
        background-color: #f3f4f6;
        color: #374151;
    }
    .pagination-wrapper {
        margin-top: 20px;
    }
</style>

<div class="card">
    <div class="header-title">
        <h2><i class="fa-solid fa-list-check"></i> Daftar Pemesanan Konsultasi</h2>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pasien & Orang Tua</th>
                    <th>Jadwal & Tipe</th>
                    <th>Kontak & Alamat</th>
                    <th>Keluhan</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($consultations as $index => $item)
                    <tr>
                        <td>{{ $consultations->firstItem() + $index }}</td>
                        <td>
                            <strong>{{ $item->child_name }}</strong> ({{ $item->child_age }} th / {{ $item->child_gender }})<br>
                            <small style="color: #64748b;">Wali: {{ $item->parent_name }}</small>
                        </td>
                        <td>
                            <i class="fa-regular fa-calendar"></i> {{ $item->booking_date }}<br>
                            <i class="fa-regular fa-clock"></i> {{ $item->booking_time }}<br>
                            <span class="badge badge-type">{{ $item->consultation_type }}</span>
                        </td>
                        <td>
                            <i class="fa-solid fa-phone"></i> {{ $item->phone_number }}<br>
                            <small style="color: #64748b;">{{ $item->email }}</small><br>
                            <small style="color: #64748b;">{{ $item->address }}</small>
                        </td>
                        <td>{{ $item->complaint ?? '-' }}</td>
                        <td>
                            <strong>{{ $item->payment_method }}</strong><br>
                            @if(strtolower($item->payment_status) == 'paid')
                                <span class="badge badge-paid">Paid</span>
                            @else
                                <span class="badge badge-unpaid">Unpaid</span>
                            @endif
                        </td>
                        <td>
                            {{-- Indikator Badge Status Saat Ini --}}
                            @if(strtolower($item->status_konsultasi) == 'confirmed')
                                <span class="badge" style="background-color: #def7ec; color: #03543f;">Confirmed</span>
                            @elseif(in_array(strtolower($item->status_konsultasi), ['refunded', 'cancelled', 'cancel']))
                                <span class="badge" style="background-color: #fde8e8; color: #9b1c1c;">Cancelled</span>
                            @else
                                <span class="badge" style="background-color: #fef3c7; color: #92400e;">Process</span>
                            @endif

                            {{-- Tombol Aksi Admin untuk Mengubah Status --}}
                            <div style="margin-top: 8px; display: flex; gap: 5px;">
                                <form action="{{ route('admin.consultation.updateStatus', $item->id ?? $item->consultation_id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" style="padding: 3px 8px; font-size: 10px; background: #10b981; color: white; border: none; border-radius: 4px; cursor: pointer;">Confirm</button>
                                </form>

                                <form action="{{ route('admin.consultation.updateStatus', $item->id ?? $item->consultation_id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancel">
                                    <button type="submit" style="padding: 3px 8px; font-size: 10px; background: #ef4444; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #a0aec0; padding: 20px;">
                            Belum ada data pemesanan konsultasi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Links Pagination -->
    <div class="pagination-wrapper">
        {{ $consultations->links() }}
    </div>
</div>
@endsection