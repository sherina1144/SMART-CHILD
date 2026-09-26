@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Tambah Buku Panduan Parenting</h2>
            <a href="{{ route('admin.parenting.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.parenting.academy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Judul Buku Panduan</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                            placeholder="Contoh: Panduan Lengkap Nutrisi 1000 Hari Pertama" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label fw-semibold">Kategori</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}"
                            placeholder="Contoh: Nutrisi, Kesehatan, Psikologi" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold">Deskripsi / Ringkasan Panduan</label>
                        <textarea class="form-control" id="description" name="description" rows="5"
                            placeholder="Tuliskan deskripsi atau ringkasan isi buku panduan..."
                            required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="thumbnail" class="form-label fw-semibold">Thumbnail / Sampul Buku</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <div class="form-text text-muted">Format gambar: JPG, PNG, JPEG.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.parenting.index') }}" class="btn btn-light">Batal</a>
                        <button type="submit" class="btn btn-success px-4">Simpan Panduan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection