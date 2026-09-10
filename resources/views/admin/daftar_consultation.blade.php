<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Konsultasi - Admin SmartChild</title>
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
            background-color: #f4f6f9;
            color: #333;
            padding: 30px;
        }
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
</head>
<body>

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
                                <span class="badge badge-status">{{ $item->status_konsultasi }}</span>
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

</body>
</html>