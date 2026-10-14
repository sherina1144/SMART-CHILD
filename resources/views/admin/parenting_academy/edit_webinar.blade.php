@extends('layout.dashboard_admin')

@section('content')

<style>
    .webinar-page {
        padding: 28px 24px;
        color: #253D32;
        font-family: 'Poppins', sans-serif;
    }

    .webinar-page * {
        box-sizing: border-box;
    }

    .webinar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .webinar-header h2 {
        margin: 0 0 6px;
        color: #253D32;
        font-size: 24px;
        font-weight: 700;
    }

    .webinar-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 13px;
        line-height: 1.6;
    }

    .webinar-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #DCE7DF;
        border-radius: 8px;
        background: #FFFFFF;
        color: #315C50;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
    }

    .webinar-back:hover {
        background: #EDF5EF;
        color: #253D32;
    }

    .webinar-card {
        overflow: hidden;
        border: 1px solid #E5ECE7;
        border-radius: 14px;
        background: #FFFFFF;
        box-shadow: 0 4px 16px rgba(37, 61, 50, .04);
    }

    .webinar-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 20px 24px;
        border-bottom: 1px solid #E8EEEA;
    }

    .webinar-heading-icon {
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

    .webinar-card-header h3 {
        margin: 0 0 4px;
        color: #253D32;
        font-size: 15px;
        font-weight: 700;
    }

    .webinar-card-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
        line-height: 1.6;
    }

    .webinar-card-body {
        padding: 25px 24px;
    }

    .webinar-page .form-label {
        display: block;
        margin-bottom: 8px;
        color: #34483D;
        font-size: 12px;
        font-weight: 600;
    }

    .webinar-page .form-control {
        display: block;
        width: 100%;
        min-height: 43px;
        padding: 10px 13px;
        border: 1px solid #DCE5DF;
        border-radius: 8px;
        background: #FFFFFF;
        color: #253D32;
        font-family: inherit;
        font-size: 12px;
        box-shadow: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .webinar-page .form-control:focus {
        border-color: #6F9C85;
        box-shadow: 0 0 0 3px rgba(111, 156, 133, .13);
        outline: none;
    }

    .webinar-page .form-control::placeholder {
        color: #A0ADA5;
    }

    .webinar-page textarea.form-control {
        min-height: 110px;
        resize: vertical;
        line-height: 1.7;
    }

    .webinar-page input[type="file"].form-control {
        min-height: 46px;
        padding: 5px;
        color: #66766D;
        line-height: 1.5;
    }

    .webinar-page input[type="file"]::file-selector-button {
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
        cursor: pointer;
    }

    .webinar-page input[type="file"]::file-selector-button:hover {
        background: #DCECE0;
    }

    .webinar-page .form-text {
        margin-top: 7px;
        color: #849189;
        font-size: 11px;
        line-height: 1.6;
    }

    .webinar-page .invalid-feedback {
        font-size: 11px;
    }

    .webinar-alert {
        margin-bottom: 20px;
        padding: 13px 16px;
        border: 1px solid #F2D2D2;
        border-radius: 8px;
        background: #FFF2F2;
        color: #B83232;
        font-size: 12px;
    }

    .webinar-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #E8EEEA;
    }

    .webinar-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 40px;
        padding: 10px 18px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .webinar-btn-cancel {
        border-color: #DCE5DF;
        background: #FFFFFF;
        color: #66766D;
    }

    .webinar-btn-cancel:hover {
        background: #F5F8F5;
        color: #253D32;
    }

    .webinar-btn-save {
        background: #315C50;
        color: #FFFFFF;
    }

    .webinar-btn-save:hover {
        background: #253D32;
        color: #FFFFFF;
    }

    .webinar-current-banner {
        display: inline-block;
        margin-bottom: 12px;
        padding: 6px;
        border: 1px solid #E5ECE7;
        border-radius: 10px;
        background: #FAFCFA;
    }

    .webinar-current-banner img {
        display: block;
        width: 150px;
        height: 95px;
        border-radius: 6px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .webinar-page {
            padding: 20px 12px;
        }

        .webinar-header h2 {
            font-size: 20px;
        }

        .webinar-card-header,
        .webinar-card-body {
            padding: 18px;
        }
    }

    @media (max-width: 480px) {
        .webinar-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .webinar-actions {
            flex-direction: column-reverse;
        }

        .webinar-btn {
            width: 100%;
        }
    }
</style>

<div class="webinar-page">

    {{-- HEADER --}}
    <div class="webinar-header">
        <div>
            <h2>Edit Webinar & Kelas Online</h2>
            <p>Perbarui informasi webinar dan kelas online Parenting Academy.</p>
        </div>

        <a href="{{ route('admin.parenting.academy.index') }}" class="webinar-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    {{-- ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="webinar-alert">
            <strong>
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                Periksa kembali data berikut:
            </strong>

            <ul class="mb-0 mt-2 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM EDIT --}}
    <div class="webinar-card">

        <div class="webinar-card-header">
            <div class="webinar-heading-icon">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>

            <div>
                <h3>Informasi Webinar</h3>
                <p>Perbarui detail kegiatan, narasumber, jadwal, dan tautan akses.</p>
            </div>
        </div>

        <div class="webinar-card-body">
            <form
                id="webinarForm"
                action="{{ route('admin.parenting.academy.webinar.update', $webinar->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                {{-- JUDUL --}}
                <div class="mb-4">
                    <label for="title" class="form-label">Judul Webinar / Kelas</label>

                    <input
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title"
                        value="{{ old('title', $webinar->title) }}"
                        placeholder="Contoh: Mengurai Tantrum Anak Tanpa Teriak"
                        required
                    >

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- KATEGORI DAN NARASUMBER --}}
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="category" class="form-label">Kategori</label>

                        <input
                            type="text"
                            class="form-control @error('category') is-invalid @enderror"
                            id="category"
                            name="category"
                            value="{{ old('category', $webinar->category ?? '') }}"
                            placeholder="Contoh: Psikologi / Nutrisi"
                            required
                        >

                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="instructor" class="form-label">Narasumber</label>

                        <input
                            type="text"
                            class="form-control @error('instructor') is-invalid @enderror"
                            id="instructor"
                            name="instructor"
                            value="{{ old('instructor', $webinar->instructor ?? '') }}"
                            placeholder="Contoh: Fahmi Hidayat, M.Psi"
                            required
                        >

                        @error('instructor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- DURASI DAN JADWAL --}}
                <div class="row">

                    <div class="col-md-4 mb-4">
                        <label for="webinar_date" class="form-label">
                            <i class="fa-regular fa-calendar me-1"></i>
                            Tanggal Pelaksanaan
                        </label>

                        <input
                            type="date"
                            class="form-control"
                            id="webinar_date"
                            value="{{ old('webinar_date', $webinar->event_date ? \Carbon\Carbon::parse($webinar->event_date)->format('Y-m-d') : '') }}"
                            required
                        >

                        <div class="form-text">Pilih tanggal pelaksanaan webinar.</div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="webinar_time" class="form-label">
                            <i class="fa-regular fa-clock me-1"></i>
                            Waktu Pelaksanaan
                        </label>

                        <input
                            type="time"
                            class="form-control"
                            id="webinar_time"
                            value="{{ old('webinar_time', $webinar->event_date ? \Carbon\Carbon::parse($webinar->event_date)->format('H:i') : '') }}"
                            required
                        >

                        <div class="form-text">Pilih jam mulai webinar.</div>
                    </div>
                </div>

                {{-- FIELD EVENT DATE UNTUK DIKIRIM KE CONTROLLER --}}
                <input
                    type="hidden"
                    id="event_date"
                    name="event_date"
                    value="{{ old('event_date', $webinar->event_date ?? '') }}"
                >

                @error('event_date')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                {{-- TAUTAN --}}
                <div class="mb-4">
                    <label for="link" class="form-label">
                        Link Pendaftaran / Zoom / Google Meet
                    </label>

                    <input
                        type="url"
                        class="form-control @error('link') is-invalid @enderror"
                        id="link"
                        name="link"
                        value="{{ old('link', $webinar->link ?? '') }}"
                        placeholder="https://..."
                        required
                    >

                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- BANNER --}}
                <div class="mb-4">
                    <label for="thumbnail" class="form-label">
                        <i class="fa-regular fa-image me-1"></i>
                        Thumbnail / Banner Webinar
                        <span class="text-muted fw-normal">(Opsional)</span>
                    </label>

                    @if ($webinar->thumbnail)
                        <div class="webinar-current-banner">
                            <img
                                src="{{ asset('storage/' . $webinar->thumbnail) }}"
                                alt="Banner webinar saat ini"
                            >
                        </div>
                    @endif

                    <input
                        type="file"
                        class="form-control @error('thumbnail') is-invalid @enderror"
                        id="thumbnail"
                        name="thumbnail"
                        accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                    >

                    <div class="form-text">
                        Biarkan kosong jika tidak ingin mengganti banner. Format JPG, JPEG, atau PNG; maksimal 2 MB.
                    </div>

                    @error('thumbnail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Deskripsi / Silabus Singkat
                    </label>

                    <textarea
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Tuliskan deskripsi singkat mengenai webinar..."
                        required
                    >{{ old('description', $webinar->description ?? '') }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <div class="webinar-actions">
                    <a
                        href="{{ route('admin.parenting.academy.index') }}"
                        class="webinar-btn webinar-btn-cancel"
                    >
                        Batal
                    </a>

                    <button type="submit" class="webinar-btn webinar-btn-save">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('webinarForm').addEventListener('submit', function (event) {
        const dateInput = document.getElementById('webinar_date');
        const timeInput = document.getElementById('webinar_time');
        const eventDateInput = document.getElementById('event_date');

        if (!dateInput.value || !timeInput.value) {
            event.preventDefault();
            alert('Silakan pilih tanggal dan waktu pelaksanaan webinar.');
            return;
        }

        // Tanggal dan waktu masuk ke event_date, bukan duration.
        eventDateInput.value = dateInput.value + ' ' + timeInput.value + ':00';
    });
</script>

@endsection