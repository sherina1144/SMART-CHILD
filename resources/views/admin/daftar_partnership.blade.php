@extends('layout.dashboard_admin')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            
            <!-- Header Title -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h3 class="fw-bold" style="color: #285B4D;">Daftar Pengajuan Partnership</h3>
                    <p class="text-muted mb-0">Kelola dan tinjau pengajuan kerjasama dari School dan Business Partner.</p>
                </div>
            </div>

            <!-- Notifikasi Berhasil -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tabel Data Partnership -->
            <div class="card shadow-sm border-0" style="border-radius: 16px; background-color: #ffffff;">
                <div class="card-body p-4">
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light text-uppercase fs-7 text-secondary">
                                <tr>
                                    <th>No</th>
                                    <th>Instansi</th>
                                    <th>Tipe</th>
                                    <th>Kontak PIC</th>
                                    <th>Pesan Kolaborasi</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($partnerships as $index => $item)
                                    <tr>
                                        <td class="fw-semibold text-secondary">{{ $index + 1 }}</td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $item->nama_instansi }}</div>
                                            <small class="text-muted">{{ $item->email }}</small>
                                        </td>
                                        <td>
                                            <span class="badge {{ $item->tipe_partner == 'School' ? 'bg-info text-dark' : 'bg-warning text-dark' }}">
                                                {{ $item->tipe_partner }}
                                            </span>
                                        </td>
                                        <td>{{ $item->kontak_person }}</td>
                                        <td>
                                            <span class="text-muted text-truncate d-inline-block" style="max-width: 200px;" title="{{ $item->pesan }}">
                                                {{ $item->pesan ?? '-' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->status == 'Confirmed')
                                                <span class="badge bg-success px-2 py-1">Confirm</span>
                                            @elseif($item->status == 'Cancelled')
                                                <span class="badge bg-danger px-2 py-1">Cancel</span>
                                            @else
                                                <span class="badge bg-secondary px-2 py-1">Process</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <!-- Form Tombol Confirm -->
                                                <form action="{{ route('admin.partnership.status', $item->partnership_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Confirmed">
                                                    <button type="submit" class="btn btn-sm btn-success px-2 py-1" style="border-radius: 6px;" title="Setujui Kerjasama">
                                                        <i class="fa-solid fa-check"></i> Confirm
                                                    </button>
                                                </form>

                                                <!-- Form Tombol Cancel -->
                                                <form action="{{ route('admin.partnership.status', $item->partnership_id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Cancelled">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" style="border-radius: 6px;" title="Tolak Kerjasama">
                                                        <i class="fa-solid fa-xmark"></i> Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">Belum ada pengajuan partnership yang masuk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection