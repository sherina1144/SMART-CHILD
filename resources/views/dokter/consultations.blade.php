@extends('layout.dashboard_dokter') {{-- Sesuaikan dengan layout dokter kamu --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Konsultasi Pasien</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anak</th>
                                    <th>Usia Anak</th>
                                    <th>Orang Tua</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal & Jam</th>
                                    <th>Tipe</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($consultations as $index => $consultation)
                                    <tr>
                                        <td>{{ $consultations->firstItem() + $index }}</td>
                                        <td>{{ $consultation->child_name }}</td>
                                        <td>{{ $consultation->child_age }} tahun</td>
                                        <td>{{ $consultation->parent_name }}</td>
                                        <td>{{ $consultation->phone_number }}</td>
                                        <td>{{ $consultation->email }}</td>
                                        <td>{{ $consultation->booking_date }} {{ $consultation->booking_time }}</td>
                                        <td>{{ $consultation->consultation_type }}</td>
                                        <td>{{ $consultation->complaint ?? '-' }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $consultation->status_konsultasi }}</span>
                                        </td>
                                        <td>
                                            {{-- Tombol Selesai untuk Dokter --}}
                                            @if($consultation->status_konsultasi == 'Confirmed')
                                                <form action="{{ url('/dokter/consultation/' . $consultation->consultation_id . '/finish') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Tandai konsultasi ini sebagai selesai?')">Selesai</button>
</form>
                                            @else
                                                <span class="text-muted">Selesai / Lainnya</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Belum ada jadwal konsultasi yang dikonfirmasi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $consultations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection