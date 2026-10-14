@extends('layout.dashboard_admin')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    .doctor-edit-page {
        font-family: 'Poppins', sans-serif;
        color: #253D32;
        padding-bottom: 30px;
    }

    /* HEADER */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        margin: 0 0 6px;
        font-size: 26px;
        font-weight: 700;
        color: #253D32;
    }

    .page-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 13px;
        line-height: 1.7;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #E1E9E3;
        border-radius: 9px;
        background: #FFFFFF;
        color: #315C50;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: 0.2s ease;
        white-space: nowrap;
    }

    .btn-back:hover {
        background: #F1F7F3;
        color: #253D32;
    }

    /* CARD */
    .edit-card {
        background: #FFFFFF;
        border: 1px solid #E8EEEA;
        border-radius: 16px;
        padding: 26px;
        margin-bottom: 22px;
        box-shadow: 0 4px 15px rgba(37, 61, 50, 0.04);
    }

    .card-heading {
        display: flex;
        align-items: center;
        gap: 13px;
        padding-bottom: 20px;
        margin-bottom: 22px;
        border-bottom: 1px solid #EEF2EF;
    }

    .heading-icon {
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: #EDF5EF;
        color: #315C50;
        font-size: 17px;
    }

    .card-heading h2,
    .card-heading h3 {
        margin: 0 0 4px;
        font-size: 16px;
        font-weight: 700;
        color: #253D32;
    }

    .card-heading p {
        margin: 0;
        color: #7A8A82;
        font-size: 12px;
        line-height: 1.6;
    }

    /* FORM */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        min-width: 0;
        margin-bottom: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #34483D;
        font-size: 12px;
        font-weight: 600;
    }

    .required-mark {
        color: #DC3545;
    }

    .form-control-custom {
        display: block;
        width: 100%;
        min-height: 44px;
        padding: 11px 13px;
        border: 1px solid #DCE5DE;
        border-radius: 9px;
        background: #FFFFFF;
        color: #253D32;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        outline: none;
        box-sizing: border-box;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    .form-control-custom:focus {
        border-color: #6FAF9B;
        box-shadow: 0 0 0 3px rgba(111, 175, 155, 0.13);
    }

    .form-control-custom::placeholder {
        color: #A0ACA5;
    }

    textarea.form-control-custom {
        min-height: 105px;
        resize: vertical;
        line-height: 1.7;
    }

    .form-help {
        display: block;
        margin-top: 7px;
        color: #849189;
        font-size: 11px;
        line-height: 1.6;
    }

    /* FOTO */
    .photo-current {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
        padding: 14px;
        border: 1px solid #E8EEEA;
        border-radius: 12px;
        background: #FAFCFA;
    }

    .img-preview {
        display: block;
        width: 85px;
        height: 100px;
        flex-shrink: 0;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #E1E9E3;
        background: #F4F7F4;
    }

    .photo-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 85px;
        height: 100px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #EDF5EF;
        color: #7A8A82;
        font-size: 24px;
    }

    .photo-info strong {
        display: block;
        margin-bottom: 5px;
        font-size: 12px;
        color: #34483D;
    }

    .photo-info span {
        display: block;
        color: #849189;
        font-size: 11px;
        line-height: 1.7;
    }

    input[type="file"].form-control-custom {
        padding: 8px;
        background: #FFFFFF;
    }

    input[type="file"]::file-selector-button {
        padding: 7px 10px;
        margin-right: 10px;
        border: none;
        border-radius: 6px;
        background: #EDF5EF;
        color: #315C50;
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
    }

    /* ALERT */
    .alert-custom {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 13px 15px;
        margin-bottom: 20px;
        border-radius: 10px;
        font-size: 12px;
        line-height: 1.7;
    }

    .alert-success-custom {
        background: #EDF7F0;
        border: 1px solid #CDE8D5;
        color: #25643D;
    }

    .alert-danger-custom {
        background: #FFF1F1;
        border: 1px solid #F4D0D0;
        color: #A92828;
    }

    .alert-custom ul {
        margin: 0;
        padding-left: 18px;
    }

    /* BUTTONS */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        padding-top: 22px;
        margin-top: 25px;
        border-top: 1px solid #EEF2EF;
    }

    .btn-custom {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 40px;
        padding: 10px 16px;
        border: 1px solid transparent;
        border-radius: 9px;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-primary-custom {
        background: #315C50;
        color: #FFFFFF;
    }

    .btn-primary-custom:hover {
        background: #253D32;
        color: #FFFFFF;
        transform: translateY(-1px);
    }

    .btn-secondary-custom {
        background: #FFFFFF;
        border-color: #DCE5DE;
        color: #64736A;
    }

    .btn-secondary-custom:hover {
        background: #F5F8F5;
        color: #253D32;
    }

    .btn-add-slot {
        min-height: 42px;
        padding: 10px 15px;
        white-space: nowrap;
    }

    /* JADWAL PRAKTIK */
    .schedule-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .schedule-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        padding: 14px 15px;
        border: 1px solid #E8EEEA;
        border-radius: 11px;
        background: #FFFFFF;
    }

    .schedule-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .schedule-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 39px;
        height: 39px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #EDF5EF;
        color: #315C50;
        font-size: 14px;
    }

    .schedule-text strong {
        display: block;
        margin-bottom: 4px;
        color: #34483D;
        font-size: 12px;
        font-weight: 600;
    }

    .schedule-text span {
        display: block;
        color: #7A8A82;
        font-size: 11px;
    }

    .btn-delete-slot {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        flex-shrink: 0;
        border: none;
        border-radius: 9px;
        background: #FFF0F0;
        color: #C62828;
        font-size: 13px;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-delete-slot:hover {
        background: #FFE0E0;
        color: #A61B1B;
    }

    .empty-schedule {
        padding: 25px 15px;
        border: 1px dashed #DCE5DE;
        border-radius: 12px;
        background: #FAFCFA;
        text-align: center;
        color: #849189;
        font-size: 12px;
        line-height: 1.7;
    }

    .empty-schedule i {
        display: block;
        margin-bottom: 10px;
        color: #A3B899;
        font-size: 25px;
    }

    .section-divider {
        border: 0;
        border-top: 1px solid #EEF2EF;
        margin: 25px 0;
    }

    .subsection-title {
        margin: 0 0 5px;
        color: #253D32;
        font-size: 14px;
        font-weight: 700;
    }

    .subsection-description {
        margin: 0 0 18px;
        color: #7A8A82;
        font-size: 11px;
        line-height: 1.7;
    }

    .schedule-form-grid {
        display: grid;
        grid-template-columns: 1.1fr 1fr 1fr 0.7fr auto;
        gap: 12px;
        align-items: end;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .schedule-form-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .schedule-form-grid .btn-add-slot {
            grid-column: 1 / -1;
            width: fit-content;
        }
    }

    @media (max-width: 650px) {
        .doctor-edit-page {
            padding: 0;
        }

        .page-header h1 {
            font-size: 22px;
        }

        .edit-card {
            padding: 18px;
            border-radius: 13px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 18px;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .schedule-form-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .schedule-form-grid .btn-add-slot {
            grid-column: auto;
            width: 100%;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .form-actions .btn-custom {
            width: 100%;
        }

        .schedule-item {
            padding: 12px;
        }
    }
</style>

<div class="doctor-edit-page">

    {{-- HEADER --}}
    <div class="page-header">
        <div>
            <h1>Edit Dokter / Terapis</h1>
            <p>Perbarui informasi dokter dan kelola jadwal praktik.</p>
        </div>

        <a href="{{ route('admin.doctor.add') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Daftar Dokter
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert-custom alert-success-custom">
            <i class="fa-solid fa-circle-check"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if(session('error'))
        <div class="alert-custom alert-danger-custom">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-custom alert-danger-custom">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div>
                <strong>Periksa kembali data yang dimasukkan.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- FORM EDIT PROFIL --}}
    <div class="edit-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="fa-solid fa-user-doctor"></i>
            </div>
            <div>
                <h2>Informasi Dokter</h2>
                <p>Perbarui data profil dokter atau terapis.</p>
            </div>
        </div>

        <form action="{{ route('admin.doctor.update', $doctor->doctor_id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-grid">

                {{-- AKUN LOGIN --}}
                <div class="form-group full-width">
                    <label for="user_id">
                        Pautan Akun Login User <span class="required-mark">*</span>
                    </label>

                    <select name="user_id" id="user_id" class="form-control-custom" required>
                        <option value="">-- Pilih akun user dokter --</option>

                        @foreach($usersDokter as $usr)
                            <option value="{{ $usr->user_id }}"
                                {{ old('user_id', $doctor->user_id) == $usr->user_id ? 'selected' : '' }}>
                                {{ $usr->nama }} ({{ $usr->email }})
                            </option>
                        @endforeach
                    </select>

                    <small class="form-help">
                        Pilih akun yang memiliki role dokter dan akan dihubungkan dengan profil ini.
                    </small>
                </div>

                {{-- NAMA --}}
                <div class="form-group full-width">
                    <label for="nama_lengkap">
                        Nama Lengkap & Gelar <span class="required-mark">*</span>
                    </label>

                    <input type="text"
                        name="nama_lengkap"
                        id="nama_lengkap"
                        class="form-control-custom"
                        value="{{ old('nama_lengkap', $doctor->nama_lengkap) }}"
                        placeholder="Contoh: dr. Nama Lengkap, Sp.A"
                        required>
                </div>

                {{-- KATEGORI --}}
                <div class="form-group">
                    <label for="kategori">
                        Kategori <span class="required-mark">*</span>
                    </label>

                    <select name="kategori" id="kategori" class="form-control-custom" required>
                        <option value="Dokter Spesialis"
                            {{ old('kategori', $doctor->kategori) == 'Dokter Spesialis' ? 'selected' : '' }}>
                            Dokter Spesialis
                        </option>
                        <option value="Psikolog"
                            {{ old('kategori', $doctor->kategori) == 'Psikolog' ? 'selected' : '' }}>
                            Psikolog
                        </option>
                        <option value="Terapis"
                            {{ old('kategori', $doctor->kategori) == 'Terapis' ? 'selected' : '' }}>
                            Terapis
                        </option>
                        <option value="Konselor Laktasi"
                            {{ old('kategori', $doctor->kategori) == 'Konselor Laktasi' ? 'selected' : '' }}>
                            Konselor Laktasi
                        </option>
                    </select>
                </div>

                {{-- PENGALAMAN --}}
                <div class="form-group">
                    <label for="lama_pengalaman">
                        Lama Pengalaman (Tahun) <span class="required-mark">*</span>
                    </label>

                    <input type="number"
                        name="lama_pengalaman"
                        id="lama_pengalaman"
                        class="form-control-custom"
                        min="0"
                        value="{{ old('lama_pengalaman', $doctor->lama_pengalaman) }}"
                        placeholder="Contoh: 5"
                        required>
                </div>

                {{-- SPESIALISASI --}}
                <div class="form-group full-width">
                    <label for="spesialisasi">
                        Spesialisasi <span class="required-mark">*</span>
                    </label>

                    <textarea name="spesialisasi"
                        id="spesialisasi"
                        rows="4"
                        class="form-control-custom"
                        placeholder="Jelaskan bidang spesialisasi dokter..."
                        required>{{ old('spesialisasi', $doctor->spesialisasi) }}</textarea>
                </div>

                {{-- RATING --}}
                <div class="form-group">
                    <label for="rating">
                        Rating <span class="required-mark">*</span>
                    </label>

                    <input type="number"
                        name="rating"
                        id="rating"
                        class="form-control-custom"
                        step="0.1"
                        min="0"
                        max="5"
                        value="{{ old('rating', $doctor->rating) }}"
                        placeholder="0.0 - 5.0"
                        required>

                    <small class="form-help">Masukkan nilai antara 0 sampai 5.</small>
                </div>

                {{-- BIAYA --}}
                <div class="form-group">
                    <label for="biaya_konsultasi">
                        Biaya Konsultasi (Rp) <span class="required-mark">*</span>
                    </label>

                    <input type="number"
                        name="biaya_konsultasi"
                        id="biaya_konsultasi"
                        class="form-control-custom"
                        min="0"
                        value="{{ old('biaya_konsultasi', $doctor->biaya_konsultasi) }}"
                        placeholder="Contoh: 150000"
                        required>
                </div>

                {{-- FOTO --}}
                <div class="form-group full-width">
                    <label>Foto Dokter</label>

                    <div class="photo-current">
                        @if($doctor->foto)
                            <img src="{{ asset('storage/' . $doctor->foto) }}"
                                class="img-preview"
                                alt="Foto {{ $doctor->nama_lengkap }}">
                        @else
                            <div class="photo-placeholder">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>
                        @endif

                        <div class="photo-info">
                            <strong>Foto saat ini</strong>
                            <span>
                                @if($doctor->foto)
                                    Foto profil dokter yang tersimpan.
                                @else
                                    Belum ada foto profil yang diunggah.
                                @endif
                            </span>
                            <span>Unggah foto baru jika ingin menggantinya.</span>
                        </div>
                    </div>

                    <label for="foto">Ganti Foto</label>

                    <input type="file"
                        name="foto"
                        id="foto"
                        class="form-control-custom"
                        accept="image/jpeg,image/png,image/jpg">

                    <small class="form-help">
                        Biarkan kosong jika tidak ingin mengganti foto.
                    </small>
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('admin.doctor.add') }}" class="btn-custom btn-secondary-custom">
                    Batal
                </a>

                <button type="submit" class="btn-custom btn-primary-custom">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

    {{-- KELOLA JADWAL PRAKTIK --}}
    <div class="edit-card">

        <div class="card-heading">
            <div class="heading-icon">
                <i class="fa-solid fa-calendar-days"></i>
            </div>
            <div>
                <h3>Jadwal Praktik</h3>
                <p>Kelola hari dan jam praktik dokter.</p>
            </div>
        </div>

        {{-- JADWAL TERSIMPAN --}}
        <div class="schedule-list">

            @if($doctor->schedules && $doctor->schedules->count() > 0)

                @foreach($doctor->schedules as $sch)
                    <div class="schedule-item">

                        <div class="schedule-info">
                            <div class="schedule-icon">
                                <i class="fa-regular fa-clock"></i>
                            </div>

                            <div class="schedule-text">
                                <strong>{{ $sch->day }}</strong>
                                <span>
                                    {{ date('H:i', strtotime($sch->start_time)) }}
                                    – 
                                    {{ date('H:i', strtotime($sch->end_time)) }}
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('admin.doctor.schedule.destroy', $sch->schedule_id ?? $sch->id) }}"
                            method="POST"
                            style="margin: 0;"
                            onsubmit="return confirm('Yakin ingin menghapus jadwal praktik ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn-delete-slot"
                                title="Hapus jadwal"
                                aria-label="Hapus jadwal">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </div>
                @endforeach

            @else

                <div class="empty-schedule">
                    <i class="fa-regular fa-calendar-xmark"></i>
                    Belum ada jadwal praktik tersimpan untuk dokter ini.
                </div>

            @endif

        </div>

        <hr class="section-divider">

        {{-- TAMBAH JADWAL --}}
        <div>
            <h4 class="subsection-title">Tambah Jadwal Praktik</h4>
            <p class="subsection-description">
                Pilih hari, jam mulai, jam selesai, dan kuota konsultasi.
            </p>

            <form action="{{ route('admin.doctor.schedule.store') }}" method="POST">
                @csrf

                <input type="hidden" name="doctor_id" value="{{ $doctor->doctor_id }}">

                <div class="schedule-form-grid">

                    <div class="form-group">
                        <label for="day">
                            Hari <span class="required-mark">*</span>
                        </label>

                        <select name="day" id="day" class="form-control-custom" required>
                            <option value="">Pilih hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="start_time">
                            Jam Mulai <span class="required-mark">*</span>
                        </label>

                        <input type="time"
                            name="start_time"
                            id="start_time"
                            class="form-control-custom"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">
                            Jam Selesai <span class="required-mark">*</span>
                        </label>

                        <input type="time"
                            name="end_time"
                            id="end_time"
                            class="form-control-custom"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="quota">
                            Kuota <span class="required-mark">*</span>
                        </label>

                        <input type="number"
                            name="quota"
                            id="quota"
                            class="form-control-custom"
                            value="1"
                            min="1"
                            required>
                    </div>

                    <button type="submit" class="btn-custom btn-primary-custom btn-add-slot">
                        <i class="fa-solid fa-plus"></i>
                        Tambah
                    </button>

                </div>
            </form>
        </div>

    </div>

</div>

@endsection