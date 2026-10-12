@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Webinar & Kelas Online</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.parenting.academy.index') }}">Parenting Academy</a></li>
            <li class="breadcrumb-item active">Tambah Webinar</li>
        </ol>

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.parenting.academy.webinar.store') }}" method="POST"
                    enctype="multipart/form-data"> @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Judul Webinar / Kelas</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title') }}" required placeholder="Contoh: Mengurai Tantrum Anak Tanpa Teriak">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label fw-bold">Kategori</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" id="category"
                                name="category" value="{{ old('category') }}" required
                                placeholder="Contoh: Psikologi / Nutrisi">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label fw-bold">Jadwal (Waktu Pelaksanaan)</label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"
                                name="duration" value="{{ old('duration') }}" required
                                placeholder="Contoh: Sabtu, 24 Jan 2026 • 10:00 WIB">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="instructor" class="form-label fw-bold">Narasumber</label>
                            <input type="text" class="form-control @error('instructor') is-invalid @enderror"
                                id="instructor" name="instructor" value="{{ old('instructor') }}" required
                                placeholder="Contoh: Fahmi Hidayat, M.Psi">
                            @error('instructor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="link" class="form-label fw-bold">Link Pendaftaran / Zoom / Meet</label>
                            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
                                value="{{ old('link') }}" required placeholder="https://...">
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail" class="form-label fw-bold">Thumbnail / Banner Webinar</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                            name="thumbnail" accept="image/jpeg,png,jpg" required>
                        <div class="form-text">Format: JPEG, PNG, JPG (Maks. 2MB)</div>
                        @error('thumbnail')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Deskripsi Singkat (Opsional)</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" rows="3"
                            placeholder="Tuliskan deskripsi singkat mengenai webinar...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.parenting.academy.index') }}" class="btn btn-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-success px-4">Simpan Webinar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection