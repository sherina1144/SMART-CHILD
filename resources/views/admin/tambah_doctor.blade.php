@extends('layout.dashboard_admin')

@section('content')
<style>
    .form-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        border: 1px solid #E2E8F0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        margin-bottom: 30px;
    }

    .form-title {
        font-size: 22px;
        font-weight: 800;
        color: #253D32;
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid #EEF2E6;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group.full-width {
        grid-column: span 2;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 700;
        color: #2D3748;
    }

    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #CBD5E1;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        transition: all 0.2s;
        background-color: #F8FAF9;
    }

    .form-control:focus {
        border-color: #253D32;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(37, 61, 50, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    .btn-submit {
        background-color: #253D32;
        color: #ffffff;
        border: none;
        padding: 12px 24px;
        font-weight: 700;
        font-size: 14px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.2s;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background-color: #314E41;
    }

    /* --- ALERT STYLES --- */
    .alert-success {
        background-color: #DEF7EC;
        color: #03543F;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 600;
    }

    .alert-danger {
        background-color: #FDE8E8;
        color: #9B1C1C;
        padding: 14px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-danger ul {
        margin-left: 20px;
    }

    /* --- TABLE STYLES --- */
    .table-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        border: 1px solid #E2E8F0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }

    .custom-table th {
        background-color: #F8FAF9;
        color: #4A5568;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 12px 16px;
        text-align: left;
        border-bottom: 2px solid #E2E8F0;
    }

    .custom-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #E2E8F0;
        font-size: 14px;
        color: #2D3748;
        vertical-align: middle;
    }

    .doctor-img {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        object-fit: cover;
    }

    .badge-category {
        background-color: #EEF2E6;
        color: #253D32;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .badge-schedule {
        background-color: #E2E8F0;
        color: #2D3748;
        padding: 2px 8px;
        border-radius: 4px;
        font-size: 11px;
        display: inline-block;
        margin: 2px 0;
    }

    .action-btns {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        background-color: #F39C50;
        color: #ffffff;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        display: inline-block;
    }

    .btn-delete {
        background-color: #E53E3E;
        color: #ffffff;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 700;
    }
</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- FORM TAMBAH DOKTER -->
<div class="form-container">
    <h2 class="form-title">Tambah Dokter / Terapis</h2>

    <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Nama Lengkap & Gelar</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama dokter atau terapis" required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control" required>
                    <option value="Dokter Spesialis">Dokter Spesialis</option>
                    <option value="Psikolog">Psikolog</option>
                    <option value="Terapis">Terapis</option>
                    <option value="Konselor Laktasi">Konselor Laktasi</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label>Spesialisasi</label>
                <textarea name="spesialisasi" class="form-control" placeholder="Masukkan deskripsi spesialisasi" required></textarea>
            </div>

            <div class="form-group">
                <label>Foto Dokter</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Lama Pengalaman (Tahun)</label>
                <input type="number" name="lama_pengalaman" class="form-control" placeholder="Contoh: 5" required>
            </div>

            <div class="form-group">
                <label>Rating Initial</label>
                <input type="number" step="0.1" name="rating" class="form-control" value="4.5" required>
            </div>

            <div class="form-group">
                <label>Biaya Konsultasi (Rp)</label>
                <input type="number" name="biaya_konsultasi" class="form-control" placeholder="Contoh: 150000" required>
            </div>
        </div>

        <button type="submit" class="btn-submit">Simpan Data Dokter</button>
    </form>
</div>

<!-- FORM TAMBAH JADWAL PRAKTIK (DOCTOR SCHEDULES RELASIONAL) -->
<div class="form-container">
    <h2 class="form-title">Tambah Slot Jadwal Praktik Dokter</h2>

    <form action="{{ route('admin.doctor.schedule.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Pilih Dokter / Terapis</label>
                <select name="doctor_id" class="form-control" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($doctors as $doc)
                        <option value="{{ $doc->doctor_id }}">{{ $doc->nama_lengkap }} ({{ $doc->kategori }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Hari Praktik</label>
                <select name="day" class="form-control" required>
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
                <label>Jam Mulai Praktik</label>
                <input type="time" name="start_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Jam Selesai Praktik</label>
                <input type="time" name="end_time" class="form-control" required>
            </div>

            <div class="form-group full-width">
                <label>Kuota Konsultasi (Jumlah Pasien)</label>
                <input type="number" name="quota" class="form-control" value="1" min="1" required>
            </div>
        </div>

        <button type="submit" class="btn-submit">Tambah Slot Jadwal</button>
    </form>
</div>

<!-- TABEL DAFTAR DOKTER & JADWAL TERSEDIA -->
<div class="table-container">
    <h3 class="form-title">Daftar Dokter & Slot Jadwal Praktik</h3>

    <table class="custom-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Slot Jadwal Praktik</th>
                <th>Pengalaman</th>
                <th>Rating</th>
                <th>Aksi Dokter</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doc)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $doc->foto) }}" class="doctor-img" alt="{{ $doc->nama_lengkap }}">
                </td>
                <td><strong>{{ $doc->nama_lengkap }}</strong></td>
                <td><span class="badge-category">{{ $doc->kategori }}</span></td>
                <td>
                    @if($doc->schedules && $doc->schedules->count() > 0)
                        @foreach($doc->schedules as $sch)
                            <div class="badge-schedule">
                                {{ $sch->day }}: {{ date('H:i', strtotime($sch->start_time)) }} - {{ date('H:i', strtotime($sch->end_time)) }}
                                <form action="{{ route('admin.doctor.schedule.destroy', $sch->id ?? $sch->schedule_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus slot jam ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:none; color:#E53E3E; cursor:pointer; font-weight:bold; padding:0 2px;">&times;</button>
                                </form>
                            </div><br>
                        @endforeach
                    @else
                        <span style="color: #A0AEC0; font-size: 12px; italic;">Belum ada slot jadwal</span>
                    @endif
                </td>
                <td>{{ $doc->lama_pengalaman }} Tahun</td>
                <td><i class="fa-solid fa-star" style="color: #F39C50;"></i> {{ $doc->rating }}</td>
                <td>
                    <div class="action-btns">
                        <a href="{{ route('admin.doctor.edit', $doc->doctor_id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('admin.doctor.destroy', $doc->doctor_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dokter ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection