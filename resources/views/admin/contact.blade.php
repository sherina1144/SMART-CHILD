@extends('layout.dashboard_admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Kelola Kontak & Pesan Masuk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Contact Management</li>
    </ol>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- ATAS: FORM PENGATURAN INFORMASI KONTAK -->
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <i class="fa-solid fa-gear me-1"></i> Pengaturan Informasi Kontak (Tampil di User)
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Resmi</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $setting->telepon ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="whatsapp" class="form-label fw-bold">Nomor WhatsApp (Format: 628xxx)</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $setting->whatsapp ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jam_operasional" class="form-label fw-bold">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="{{ $setting->jam_operasional ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label fw-bold">Alamat Lokasi</label>
                            <textarea class="form-control" id="lokasi" name="lokasi" rows="3" required>{{ $setting->lokasi ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="maps_embed_url" class="form-label fw-bold">Google Maps Embed URL (Link src iframe)</label>
                            <textarea class="form-control" id="maps_embed_url" name="maps_embed_url" rows="3">{{ $setting->maps_embed_url ?? '' }}</textarea>
                            <small class="text-muted">Masukkan link URL di dalam atribut <code>src="..."</code> dari kode embed Google Maps.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- BAWAH: DAFTAR PESAN MASUK DARI USER -->
        <div class="col-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <i class="fa-solid fa-envelope me-1"></i> Daftar Pesan Masuk dari Pengguna
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Subjek</th>
                                    <th>Pesan</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $index => $msg)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $msg->nama }}</strong><br>
                                            <small class="text-muted">{{ $msg->email }}</small>
                                        </td>
                                        <td><span class="badge bg-info text-dark">{{ $msg->subjek }}</span></td>
                                        <td>{{ Str::limit($msg->pesan, 50) }}</td>
                                        <td><small>{{ $msg->created_at ? $msg->created_at->format('d M Y, H:i') : '-' }}</small></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">Belum ada pesan masuk dari pengguna.</td>
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