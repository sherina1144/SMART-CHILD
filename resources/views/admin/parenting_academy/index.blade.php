@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Kelola Parenting Academy</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- SECTION 1: BUKU PANDUAN / ARTIKEL -->
        <div class="card shadow-sm mb-5 border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-success"><i class="fa-solid fa-book-open me-2"></i> Daftar Buku Panduan &
                    Artikel</h5>
                <a href="{{ route('admin.parenting.academy.create') }}" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Panduan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($academies as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}"
                                            class="rounded" style="width: 70px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="fw-semibold">{{ $item->title }}</td>
                                    <td><span
                                            class="badge bg-success bg-opacity-10 text-success px-2 py-1">{{ $item->category }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.parenting.academy.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm text-white">Edit</a>
                                        <form action="{{ route('admin.parenting.academy.destroy', $item->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus panduan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data buku panduan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION 2: VIDEO REKOMENDASI -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-dark"><i class="fa-solid fa-video me-2 text-warning"></i> Daftar Video
                    Rekomendasi</h5>
                <!-- PERBAIKAN ADA DI SINI (Kurung tutup route sudah lengkap) -->
                <a href="{{ route('admin.parenting.video.create') }}" class="btn btn-dark btn-sm">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Video
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Thumbnail</th>
                                <th>Judul Video</th>
                                <th>Durasi & Instruktur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($videos as $vid)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $vid->thumbnail) }}" alt="{{ $vid->title }}"
                                            class="rounded" style="width: 70px; height: 50px; object-fit: cover;">
                                    </td>
                                    <td class="fw-semibold">
                                        {{ $vid->title }}<br>
                                        <a href="{{ $vid->video_url }}" target="_blank"
                                            class="small text-primary text-decoration-none"><i
                                                class="fa-solid fa-link me-1"></i> Lihat Link Video</a>
                                    </td>
                                    <td>
                                        <span class="d-block text-muted small"><i class="fa-regular fa-clock me-1"></i>
                                            {{ $vid->duration }}</span>
                                        <span class="d-block text-muted small"><i class="fa-solid fa-user-doctor me-1"></i>
                                            {{ $vid->instructor }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.parenting.video.edit', $vid->id) }}"
                                            class="btn btn-warning btn-sm text-white">Edit</a>
                                        <form action="{{ route('admin.parenting.video.destroy', $vid->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data video rekomendasi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection