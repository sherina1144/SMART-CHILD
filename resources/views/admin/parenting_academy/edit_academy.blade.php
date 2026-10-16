@extends('layout.dashboard_admin')

@section('content')
<style>
    .academy-edit-page {
        padding: 28px 24px;
        color: #253D32;
    }

    .academy-edit-page .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
    }

    .academy-edit-page .page-title {
        margin: 0 0 6px;
        color: #253D32;
        font-size: 24px;
        font-weight: 700;
    }

    .academy-edit-page .page-subtitle {
        margin: 0;
        color: #7A8A82;
        font-size: 13px;
    }

    .academy-edit-page .edit-card {
        width: 100%;
        padding: 28px;
        background: #FFFFFF;
        border: 1px solid #E5ECE7;
        border-radius: 14px;
        box-shadow: 0 4px 16px rgba(37, 61, 50, 0.04);
    }

    .academy-edit-page .form-section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 1px solid #E8EEEA;
    }

    .academy-edit-page .section-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 11px;
        background: #EDF5EF;
        color: #315C50;
        font-size: 17px;
    }

    .academy-edit-page .form-section-title h3 {
        margin: 0 0 4px;
        font-size: 16px;
        font-weight: 700;
        color: #253D32;
    }

    .academy-edit-page .form-section-title p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
    }

    .academy-edit-page .form-label {
        display: block;
        margin-bottom: 8px;
        color: #34483D;
        font-size: 13px;
        font-weight: 600;
    }

    .academy-edit-page .form-control {
        width: 100%;
        min-height: 44px;
        padding: 10px 13px;
        border: 1px solid #DCE5DE;
        border-radius: 8px;
        background-color: #FFFFFF;
        color: #253D32;
        font-size: 13px;
        box-shadow: none;
    }

    .academy-edit-page .form-control:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, 0.15);
    }

    .academy-edit-page textarea.form-control {
        min-height: 140px;
        resize: vertical;
        line-height: 1.7;
    }

    .academy-edit input[type="file"].form-control{
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

    .academy-edit input[type="file"]::file-selector-button{
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

    .academy-edit-page .form-text {
        margin-top: 7px;
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.6;
    }

    .academy-edit-page .current-image {
        display: inline-block;
        margin-bottom: 12px;
        padding: 8px;
        border: 1px solid #E5ECE7;
        border-radius: 10px;
        background: #F8FAF8;
    }

    .academy-edit-page .current-image img {
        display: block;
        width: 180px;
        height: 120px;
        object-fit: cover;
        border-radius: 6px;
    }

    .academy-edit-page .current-image-caption {
        margin: 8px 0 0;
        color: #7A8A82;
        font-size: 11px;
    }

    .academy-edit-page .form-actions {
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
        padding-top: 20px;
        border-top: 1px solid #E8EEEA;
    }

    .academy-edit-page .btn-cancel,
    .academy-edit-page .btn-save,
    .academy-edit-page .btn-back {
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

    .academy-edit-page .btn-back,
    .academy-edit-page .btn-cancel {
        border: 1px solid #DCE5DE;
        background: #FFFFFF;
        color: #52655A;
    }

    .academy-edit-page .btn-back:hover,
    .academy-edit-page .btn-cancel:hover {
        background: #F5F8F5;
        color: #253D32;
    }

    .academy-edit-page .btn-save {
        border: 1px solid #315C50;
        background: #315C50;
        color: #FFFFFF;
        cursor: pointer;
    }

    .academy-edit-page .btn-save:hover {
        border-color: #253D32;
        background: #253D32;
    }

    .academy-edit-page .alert {
        margin-bottom: 20px;
        border-radius: 9px;
        font-size: 13px;
    }

    @media (max-width: 600px) {
        .academy-edit-page {
            padding: 20px 12px;
        }

        .academy-edit-page .page-header {
            align-items: flex-start;
        }

        .academy-edit-page .page-title {
            font-size: 20px;
        }

        .academy-edit-page .edit-card {
            padding: 18px;
        }

        .academy-edit-page .current-image img {
            width: 150px;
            height: 100px;
        }
    }
</style>

<div class="academy-edit-page">
    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Buku Panduan</h1>
            <p class="page-subtitle">
                Perbarui informasi buku panduan atau artikel Parenting Academy.
            </p>
        </div>

        <a href="{{ url('admin/parenting-academy') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    {{-- PESAN VALIDASI --}}
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
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div>
                <h3>Informasi Buku Panduan</h3>
                <p>Ubah informasi berikut sesuai kebutuhan.</p>
            </div>
        </div>

        <form
            action="{{ url('admin/parenting-academy/academy/' . $academy->id . '/update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-4">
                <label for="title" class="form-label">Judul Panduan / Artikel</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title', $academy->title) }}"
                    placeholder="Masukkan judul buku panduan"
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
                    value="{{ old('category', $academy->category) }}"
                    placeholder="Contoh: Psikologi Anak, Nutrisi, Tumbuh Kembang"
                    required
                >

                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <label for="description" class="form-label">Deskripsi / Konten</label>
                <textarea
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Tuliskan deskripsi atau isi buku panduan..."
                    required
                >{{ old('description', $academy->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- THUMBNAIL --}}
            <div class="mb-2">
                <label for="thumbnail" class="form-label">Thumbnail / Gambar Sampul</label>

                @if ($academy->thumbnail)
                    <div class="current-image">
                        <img
                            src="{{ asset('storage/' . $academy->thumbnail) }}"
                            alt="{{ $academy->title }}"
                        >
                        <p class="current-image-caption">
                            <i class="fa-regular fa-image me-1"></i>
                            Gambar yang digunakan saat ini
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
                    Pilih gambar JPG, JPEG, atau PNG. Biarkan kosong jika tidak ingin mengganti gambar.
                </div>

                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- TOMBOL --}}
            <div class="form-actions">
                <a href="{{ url('admin/parenting-academy') }}" class="btn-cancel">
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