@extends('layout.dashboard_admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .parenting-form-page {
        font-family: 'Poppins', sans-serif;
        color: #253D32;
        padding: 24px;
        padding-bottom: 35px;
    }

    .parenting-form-page * {
        box-sizing: border-box;
    }

    .form-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .form-page-header h2 {
        margin: 0 0 6px;
        color: #253D32;
        font-size: 24px;
        font-weight: 700;
    }

    .form-page-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
        line-height: 1.7;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 15px;
        color: #315C50;
        background: #EDF5EF;
        border: 1px solid #DCE9DF;
        border-radius: 9px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-back:hover {
        color: #FFFFFF;
        background: #315C50;
    }

    .form-card {
        overflow: hidden;
        background: #FFFFFF;
        border: 1px solid #E5ECE7;
        border-radius: 15px;
        box-shadow: 0 4px 18px rgba(37, 61, 50, .04);
    }

    .form-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 22px 26px;
        background: #FFFFFF;
        border-bottom: 1px solid #EDF1EE;
    }

    .form-header-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 45px;
        height: 45px;
        flex-shrink: 0;
        color: #315C50;
        background: #EDF5EF;
        border-radius: 12px;
        font-size: 18px;
    }

    .form-card-header h5 {
        margin: 0 0 5px;
        color: #253D32;
        font-size: 15px;
        font-weight: 700;
    }

    .form-card-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.6;
    }

    .form-card-body {
        padding: 26px;
    }

    .form-section-title {
        margin-bottom: 22px;
        color: #315C50;
        font-size: 13px;
        font-weight: 700;
    }

    .form-section-title i {
        margin-right: 7px;
    }

    .parenting-form-page .form-label {
        display: block;
        margin-bottom: 8px;
        color: #34483D;
        font-size: 12px;
        font-weight: 600;
    }

    .required-mark {
        color: #D64545;
    }

    .parenting-form-page .form-control {
        width: 100%;
        min-height: 43px;
        padding: 11px 13px;
        color: #34483D;
        background-color: #FFFFFF;
        border: 1px solid #DCE5DE;
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        box-shadow: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .parenting-form-page .form-control:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, .15);
    }

    .parenting-form-page .form-control::placeholder {
        color: #A0ACA4;
        font-size: 11px;
    }

    .parenting-form-page textarea.form-control {
        min-height: 125px;
        resize: vertical;
        line-height: 1.8;
    }

    .parenting-form-page input[type="file"].form-control {
        display: flex;
        align-items: center;
        min-height: 44px;
        padding: 4px;
        line-height: 34px;
    }

    .parenting-form-page input[type="file"]::file-selector-button {
        height: 34px;
        margin: 0 10px 0 0;
        padding: 0 12px;
        vertical-align: middle;
        line-height: normal;
        border: none;
        border-radius: 7px;
        background: #EDF5EF;
        color: #315C50;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        cursor: pointer;
    }

    .parenting-form-page .form-text {
        margin-top: 7px;
        color: #89968E;
        font-size: 10px;
        line-height: 1.7;
    }

    .form-group {
        margin-bottom: 21px;
    }

    .form-divider {
        height: 1px;
        margin: 25px 0;
        background: #EDF1EE;
        border: 0;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-top: 27px;
        padding-top: 22px;
        border-top: 1px solid #EDF1EE;
    }

    .btn-cancel,
    .btn-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 10px 18px;
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-cancel {
        color: #53645A;
        background: #FFFFFF;
        border: 1px solid #DCE5DE;
    }

    .btn-cancel:hover {
        color: #253D32;
        background: #F5F8F5;
    }

    .btn-submit {
        color: #FFFFFF;
        background: #315C50;
        border: 1px solid #315C50;
    }

    .btn-submit:hover {
        color: #FFFFFF;
        background: #253D32;
        border-color: #253D32;
    }

    .form-error-alert {
        margin-bottom: 20px;
        padding: 14px 17px;
        color: #B83232;
        background: #FFF0F0;
        border: 1px solid #F3D5D5;
        border-radius: 10px;
        font-size: 12px;
    }

    .form-error-alert ul {
        margin: 8px 0 0;
        padding-left: 20px;
        line-height: 1.8;
    }

    @media (max-width: 768px) {
        .parenting-form-page {
            padding: 16px 12px 25px;
        }

        .form-page-header {
            align-items: flex-start;
        }

        .form-page-header h2 {
            font-size: 20px;
        }

        .form-card-header,
        .form-card-body {
            padding: 18px;
        }

        .form-actions {
            flex-wrap: wrap;
        }
    }

    @media (max-width: 480px) {
        .form-page-header {
            flex-direction: column;
        }

        .btn-back {
            align-self: flex-start;
        }

        .form-actions > * {
            flex: 1;
        }
    }
</style>

<div class="parenting-form-page">

    {{-- HEADER HALAMAN --}}
    <div class="form-page-header">
        <div>
            <h2>Tambah Buku Panduan Parenting</h2>
            <p>Lengkapi informasi buku panduan yang akan ditampilkan di Parenting Academy.</p>
        </div>

        <a href="{{ route('admin.parenting.academy.index') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    {{-- VALIDASI --}}
    @if ($errors->any())
        <div class="form-error-alert">
            <strong><i class="fa-solid fa-circle-exclamation me-1"></i> Periksa kembali isian berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM UTAMA --}}
    <div class="form-card">

        <div class="form-card-header">
            <div class="form-header-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div>
                <h5>Informasi Buku Panduan</h5>
                <p>Isi data buku panduan dengan lengkap dan benar.</p>
            </div>
        </div>

        <div class="form-card-body">
            <form
                action="{{ route('admin.parenting.academy.academy.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-section-title">
                    <i class="fa-solid fa-circle-info"></i>
                    Detail Panduan
                </div>

                {{-- JUDUL --}}
                <div class="form-group">
                    <label for="title" class="form-label">
                        Judul Buku Panduan <span class="required-mark">*</span>
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Contoh: Panduan Nutrisi Anak"
                        required
                    >
                </div>

                {{-- KATEGORI DAN DURASI --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category" class="form-label">
                                Kategori <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="category"
                                name="category"
                                value="{{ old('category') }}"
                                placeholder="Contoh: Nutrisi, Kesehatan, Psikologi"
                                required
                            >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="duration" class="form-label">
                                Estimasi Waktu Baca / Durasi <span class="required-mark">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="duration"
                                name="duration"
                                value="{{ old('duration') }}"
                                placeholder="Contoh: 5 menit baca"
                                required
                            >

                            <div class="form-text">
                                Masukkan perkiraan waktu membaca atau jumlah bab.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- LINK --}}
                <div class="form-group">
                    <label for="link" class="form-label">Tautan Buku Panduan</label>

                    <input
                        type="url"
                        class="form-control"
                        id="link"
                        name="link"
                        value="{{ old('link') }}"
                        placeholder="https://example.com/buku-panduan.pdf"
                    >

                    <div class="form-text">
                        Masukkan URL bacaan atau file buku panduan jika tersedia.
                    </div>
                </div>

                {{-- DESKRIPSI --}}
                <div class="form-group">
                    <label for="description" class="form-label">
                        Deskripsi / Ringkasan Panduan <span class="required-mark">*</span>
                    </label>

                    <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Tuliskan ringkasan isi dan manfaat buku panduan ini..."
                        required
                    >{{ old('description') }}</textarea>
                </div>

                <hr class="form-divider">

                {{-- THUMBNAIL --}}
                <div class="form-section-title">
                    <i class="fa-solid fa-image"></i>
                    Sampul Buku
                </div>

                <div class="form-group mb-0">
                    <label for="thumbnail" class="form-label">Thumbnail / Sampul Buku</label>

                    <input
                        type="file"
                        class="form-control"
                        id="thumbnail"
                        name="thumbnail"
                        accept=".jpg,.jpeg,.png"
                    >

                    <div class="form-text">
                        Pilih gambar JPG, JPEG, atau PNG untuk sampul buku panduan.
                    </div>
                </div>

                {{-- TOMBOL --}}
                <div class="form-actions">
                    <a href="{{ route('admin.parenting.academy.index') }}" class="btn-cancel">
                        Batal
                    </a>

                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Panduan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection