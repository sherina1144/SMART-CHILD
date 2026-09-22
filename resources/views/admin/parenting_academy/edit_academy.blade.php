@extends('layout.dashboard_admin')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Edit Buku Panduan</h2>
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
            <form action="{{ route('admin.parenting.academy.update', $academy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Panduan / Artikel</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $academy->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold">Kategori</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $academy->category) }}" placeholder="Contoh: Psikologi Anak, Nutrisi, Tumbuh Kembang" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi / Konten</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $academy->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="thumbnail" class="form-label fw-semibold">Thumbnail / Gambar Baru (Opsional)</label>
                    @if($academy->thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $academy->thumbnail) }}" alt="{{ $academy->title }}" class="rounded" style="width: 120px; height: 80px; object-fit: cover;">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                    <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.parenting.index') }}" class="btn btn-light">Batal</a>
                    <button type="submit" class="btn btn-success px-4">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection