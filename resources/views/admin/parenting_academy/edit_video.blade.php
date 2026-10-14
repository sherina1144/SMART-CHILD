@extends('layout.dashboard_admin')

@section('content')
<style>
    .video-edit-page {
        padding: 28px 24px;
        color: #253D32;
    }

    .video-edit-page * {
        box-sizing: border-box;
    }

    .video-edit-page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
    }

    .video-edit-page .page-title {
        margin: 0 0 6px;
        color: #253D32;
        font-size: 24px;
        font-weight: 700;
    }

    .video-edit-page .page-subtitle {
        margin: 0;
        color: #7A8A82;
        font-size: 13px;
        line-height: 1.7;
    }

    .video-edit-page .edit-card {
        width: 100%;
        padding: 28px;
        background: #FFFFFF;
        border: 1px solid #E5ECE7;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(37, 61, 50, 0.04);
    }

    .video-edit-page .form-section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        padding-bottom: 17px;
        border-bottom: 1px solid #E8EEEA;
    }

    .video-edit-page .section-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        flex-shrink: 0;
        border-radius: 11px;
        background: #EDF5EF;
        color: #315C50;
        font-size: 17px;
    }

    .video-edit-page .form-section-title h3 {
        margin: 0 0 4px;
        color: #253D32;
        font-size: 16px;
        font-weight: 700;
    }

    .video-edit-page .form-section-title p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
    }

    .video-edit-page .form-label {
        display: block;
        margin-bottom: 8px;
        color: #34483D;
        font-size: 13px;
        font-weight: 600;
    }

    .video-edit-page .form-control {
        width: 100%;
        min-height: 44px;
        padding: 10px 13px;
        border: 1px solid #DCE5DE;
        border-radius: 8px;
        background: #FFFFFF;
        color: #253D32;
        font-size: 13px;
        box-shadow: none;
    }

    .video-edit-page .form-control:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, 0.15);
    }

    .video-edit-page textarea.form-control {
        min-height: 135px;
        resize: vertical;
        line-height: 1.7;
    }

    .video-edit input[type="file"].form-control {
        height: 46px;
        min-height: 46px;
        padding: 5px;
        display: flex;
        align-items: center;
        color: #66766D;
        line-height: normal;
        font-family: inherit;
        font-size: 12px;
    }

    .video-edit input[type="file"]::file-selector-button {
        height: 34px;
        margin: 0 12px 0 0;
        padding: 0 12px;
        border: none;
        border-radius: 6px;
        background: #EDF5EF;
        color: #315C50;
        font-family: inherit;
        font-size: 11px;
        font-weight: 600;
        vertical-align: middle;
        cursor: pointer;
    }

    .video-edit-page .form-text {
        margin-top: 7px;
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.7;
    }

    .video-edit-page .current-thumbnail {
        display: inline-block;
        margin-bottom: 12px;
        padding: 8px;
        border: 1px solid #E5ECE7;
        border-radius: 10px;
        background: #F8FAF8;
    }

    .video-edit-page .current-thumbnail img {
        display: block;
        width: 200px;
        height: 120px;
        object-fit: cover;
        border-radius: 6px;
    }

    .video-edit-page .thumbnail-caption {
        margin: 8px 0 0;
        color: #7A8A82;
        font-size: 11px;
    }

    .video-edit-page .form-actions {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
        padding-top: 20px;
        border-top: 1px solid #E8EEEA;
    }

    .video-edit-page .btn-back,
    .video-edit-page .btn-cancel,
    .video-edit-page .btn-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 40px;
        padding: 9px 17px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .video-edit-page .btn-back,
    .video-edit-page .btn-cancel {
        border: 1px solid #DCE5DE;
        background: #FFFFFF;
        color: #52655A;
    }

    .video-edit-page .btn-back:hover,
    .video-edit-page .btn-cancel:hover {
        background: #F5F8F5;
        color: #253D32;
    }

    .video-edit-page .btn-save {
        border: 1px solid #315C50;
        background: #315C50;
        color: #FFFFFF;
        cursor: pointer;
    }

    .video-edit-page .btn-save:hover {
        border-color: #253D32;
        background: #253D32;
    }

    .video-edit-page .alert {
        margin-bottom: 20px;
        border-radius: 9px;
        font-size: 13px;
    }

    @media (max-width: 600px) {
        .video-edit-page {
            padding: 20px 12px;
        }

        .video-edit-page .page-header {
            align-items: flex-start;
        }

        .video-edit-page .page-title {
            font-size: 20px;
        }

        .video-edit-page .edit-card {
            padding: 18px;
        }

        .video-edit-page .current-thumbnail img {
            width: 160px;
            height: 100px;
        }
    }
</style>

<div class="video-edit-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Video Parenting</h1>
            <p class="page-subtitle">
                Perbarui informasi video edukasi di Parenting Academy.
            </p>
        </div>

        <a href="{{ route('admin.parenting.academy.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    {{-- VALIDASI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <div class="fw-semibold mb-2">
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                Periksa kembali data yang kamu masukkan.
            </div>

            <ul class="mb-0 ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM EDIT --}}
    <div class="edit-card">

        <div class="form-section-title">
            <div class="section-icon">
                <i class="fa-solid fa-video"></i>
            </div>

            <div>
                <h3>Informasi Video</h3>
                <p>Ubah detail video dan thumbnail sesuai kebutuhan.</p>
            </div>
        </div>

        <form
            action="{{ route('admin.parenting.academy.video.update', $video->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-4">
                <label for="title" class="form-label">Judul Video</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $video->title) }}"
                    placeholder="Contoh: Cara Mengukur Tumbuh Kembang Anak"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- KATEGORI --}}
            <div class="mb-4">
                <label for="category" class="form-label">Kategori</label>
                <input
                    type="text"
                    class="form-control @error('category') is-invalid @enderror"
                    id="category"
                    name="category"
                    value="{{ old('category', $video->category) }}"
                    placeholder="Contoh: Tumbuh Kembang"
                    required
                >
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- PEMATERI --}}
            <div class="mb-4">
                <label for="instructor" class="form-label">Pemateri / Instruktur</label>
                <input
                    type="text"
                    class="form-control @error('instructor') is-invalid @enderror"
                    id="instructor"
                    name="instructor"
                    value="{{ old('instructor', $video->instructor) }}"
                    placeholder="Masukkan nama pemateri"
                    required
                >
                @error('instructor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DURASI --}}
            <div class="mb-4">
                <label for="duration" class="form-label">Durasi Video</label>
                <input
                    type="text"
                    class="form-control @error('duration') is-invalid @enderror"
                    id="duration"
                    name="duration"
                    value="{{ old('duration', $video->duration) }}"
                    placeholder="Contoh: 15 Menit atau 10:45"
                    required
                >
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- LINK VIDEO --}}
            <div class="mb-4">
                <label for="video_url" class="form-label">Link Video (YouTube URL / Embed)</label>
                <input
                    type="text"
                    class="form-control @error('video_url') is-invalid @enderror"
                    id="video_url"
                    name="video_url"
                    value="{{ old('video_url', $video->video_url) }}"
                    placeholder="Contoh: https://youtu.be/..."
                    required
                >
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label for="description" class="form-label">Deskripsi Video</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Tuliskan ringkasan isi video..."
                >{{ old('description', $video->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- THUMBNAIL --}}
            <div class="mb-2">
                <label for="thumbnail" class="form-label">Thumbnail Video</label>

                @if ($video->thumbnail)
                    <div class="current-thumbnail">
                        <img
                            src="{{ asset('storage/' . $video->thumbnail) }}"
                            alt="Thumbnail {{ $video->title }}"
                        >
                        <p class="thumbnail-caption">
                            <i class="fa-regular fa-image me-1"></i>
                            Thumbnail yang digunakan saat ini
                        </p>
                    </div>
                @endif

                <input
                    type="file"
                    class="form-control @error('thumbnail') is-invalid @enderror"
                    id="thumbnail"
                    name="thumbnail"
                    accept=".jpg,.jpeg,.png"
                >

                <div class="form-text">
                    Pilih gambar JPG, JPEG, atau PNG. Biarkan kosong jika tidak ingin mengganti thumbnail.
                </div>

                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="form-actions">
                <a href="{{ route('admin.parenting.academy.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn-save">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection