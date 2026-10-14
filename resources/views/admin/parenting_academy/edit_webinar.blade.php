@extends('layout.dashboard_admin')

@section('page-title', 'Edit Webinar & Kelas Online')

@section('content')
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color: #315C50;">Edit Webinar & Kelas Online</h2>
            <a href="{{ route('admin.parenting.academy.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
                <form action="{{ route('admin.parenting.academy.webinar.update', $webinar->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold text-secondary small">Judul Webinar / Kelas</label>
                        <input type="text" class="form-control rounded-3" id="title" name="title"
                            value="{{ old('title', $webinar->title) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label fw-semibold text-secondary small">Kategori</label>
                            <input type="text" class="form-control rounded-3" id="category" name="category"
                                value="{{ old('category', $webinar->category ?? '') }}"
                                placeholder="Contoh: Parenting, Psikologi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="instructor" class="form-label fw-semibold text-secondary small">Instruktur /
                                Pembicara</label>
                            <input type="text" class="form-control rounded-3" id="instructor" name="instructor"
                                value="{{ old('instructor', $webinar->instructor ?? '') }}" placeholder="Nama instruktur"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label fw-semibold text-secondary small">Durasi (Contoh: 2 Jam
                                / 90 Menit)</label>
                            <input type="text" class="form-control rounded-3" id="duration" name="duration"
                                value="{{ old('duration', $webinar->duration ?? '') }}" placeholder="Contoh: 90 Menit"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="event_date" class="form-label fw-semibold text-secondary small">Jadwal
                                Pelaksanaan</label>
                            <input type="datetime-local" class="form-control rounded-3" id="event_date" name="event_date"
                                value="{{ old('event_date', isset($webinar->event_date) ? date('Y-m-d\TH:i', strtotime($webinar->event_date)) : '') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label fw-semibold text-secondary small">Tautan Akses (Zoom / GMeet /
                            YouTube)</label>
                        <input type="url" class="form-control rounded-3" id="link" name="link"
                            value="{{ old('link', $webinar->link ?? '') }}" placeholder="https://zoom.us/j/...">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold text-secondary small">Deskripsi / Silabus
                            Singkat</label>
                        <textarea class="form-control rounded-3" id="description" name="description" rows="5"
                            required>{{ old('description', $webinar->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="thumbnail" class="form-label fw-semibold text-secondary small">Banner / Poster Webinar
                            (Opsional)</label>
                        @if($webinar->thumbnail ?? false)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $webinar->thumbnail) }}" alt="Current Thumbnail"
                                    class="rounded-3 img-thumbnail shadow-sm"
                                    style="width: 140px; height: 90px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" class="form-control rounded-3" id="thumbnail" name="thumbnail" accept="image/*">
                        <div class="form-text text-muted small">Biarkan kosong jika tidak ingin mengubah banner.</div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <a href="{{ route('admin.parenting.academy.index') }}"
                            class="btn btn-light rounded-pill px-4 text-secondary">Batal</a>
                        <button type="submit" class="btn text-white rounded-pill px-4 shadow-sm"
                            style="background-color: #315C50; font-weight: 600;">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection