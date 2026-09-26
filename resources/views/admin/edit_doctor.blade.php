@extends('layout.dashboard_admin')

@section('content')
<style>
    .form-container { 
        max-width: 700px; 
        margin: auto; 
        background: white; 
        padding: 25px; 
        border-radius: 10px; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.05); 
        margin-bottom: 30px;
    }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; font-weight: bold; margin-bottom: 5px; color: #2D3748; }
    .form-group input, 
    .form-group select, 
    .form-group textarea { 
        width: 100%; 
        padding: 10px; 
        box-sizing: border-box; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
    }
    .btn-submit { background: #253D32; color: white; border: none; padding: 12px 20px; cursor: pointer; border-radius: 5px; font-weight: bold; }
    .btn-submit:hover { background: #314E41; }
    .btn-cancel { background: #888; text-decoration: none; padding: 12px 20px; color: white; border-radius: 5px; font-weight: bold; display: inline-block; }
    .alert-danger { background: #ffe6e6; color: #d8000c; padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; }
    .alert-success { background: #DEF7EC; color: #03543F; padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; font-weight: bold; }
    .img-preview { width: 80px; height: 110px; object-fit: cover; border-radius: 10px; margin-top: 5px; display: block; }
    
    /* --- STYLES SLOTS JADWAL --- */
    .schedule-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #EEF2E6;
        color: #253D32;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        margin-right: 8px;
        margin-bottom: 8px;
    }
    .btn-delete-slot {
        background: #E53E3E;
        color: white;
        border: none;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 11px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-row-custom {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 80px auto;
        gap: 10px;
        align-items: end;
    }
</style>

<div class="form-container">
    <h2 style="margin-bottom: 20px; color: #253D32;">Edit Data Dokter / Terapis</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- FORM UPDATE PROFIL DOKTER -->
    <form action="{{ route('admin.doctor.update', $doctor->doctor_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Lengkap & Gelar</label>
            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $doctor->nama_lengkap) }}" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" required>
                <option value="Dokter Spesialis" {{ old('kategori', $doctor->kategori) == 'Dokter Spesialis' ? 'selected' : '' }}>Dokter Spesialis</option>
                <option value="Psikolog" {{ old('kategori', $doctor->kategori) == 'Psikolog' ? 'selected' : '' }}>Psikolog</option>
                <option value="Terapis" {{ old('kategori', $doctor->kategori) == 'Terapis' ? 'selected' : '' }}>Terapis</option>
                <option value="Konselor Laktasi" {{ old('kategori', $doctor->kategori) == 'Konselor Laktasi' ? 'selected' : '' }}>Konselor Laktasi</option>
            </select>
        </div>

        <div class="form-group">
            <label>Spesialisasi</label>
            <textarea name="spesialisasi" rows="3" required>{{ old('spesialisasi', $doctor->spesialisasi) }}</textarea>
        </div>

        <div class="form-group">
            <label>Foto Saat Ini</label>
            @if($doctor->foto)
                <img src="{{ asset('storage/' . $doctor->foto) }}" class="img-preview" alt="Foto">
            @endif
            <label style="margin-top: 10px; font-weight: normal; font-size: 13px;">Ganti Foto (Biarkan kosong jika tidak ingin mengubah):</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <div class="form-group">
            <label>Lama Pengalaman (Tahun)</label>
            <input type="number" name="lama_pengalaman" value="{{ old('lama_pengalaman', $doctor->lama_pengalaman) }}" required>
        </div>

        <div class="form-group">
            <label>Rating (0.0 - 5.0)</label>
            <input type="number" step="0.1" name="rating" min="0" max="5" value="{{ old('rating', $doctor->rating) }}" required>
        </div>

        <div class="form-group">
            <label>Biaya Konsultasi (Rp)</label>
            <input type="number" name="biaya_konsultasi" value="{{ old('biaya_konsultasi', $doctor->biaya_konsultasi) }}" required>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn-submit">Update Profil Dokter</button>
            <a href="{{ route('admin.doctor.add') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>

<!-- CONTAINER KELOLA JADWAL TERPISAH -->
<div class="form-container">
    <h3 style="margin-bottom: 15px; color: #253D32;">Jadwal Praktik Dokter Saat Ini</h3>

    <div style="margin-bottom: 20px;">
        @if($doctor->schedules && $doctor->schedules->count() > 0)
            @foreach($doctor->schedules as $sch)
                <div class="schedule-badge">
                    <span>{{ $sch->day }}: {{ date('H:i', strtotime($sch->start_time)) }} - {{ date('H:i', strtotime($sch->end_time)) }}</span>
                    <form action="{{ route('admin.doctor.schedule.destroy', $sch->schedule_id ?? $sch->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Hapus slot jam ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-slot" title="Hapus Slot">&times;</button>
                    </form>
                </div>
            @endforeach
        @else
            <p style="color: #718096; font-size: 14px;">Dokter ini belum memiliki slot jadwal praktik tersimpan.</p>
        @endif
    </div>

    <hr style="border: 0; border-top: 1px solid #E2E8F0; margin-bottom: 20px;">

    <h4 style="margin-bottom: 15px; color: #253D32;">Tambah Slot Jam Baru</h4>
    <form action="{{ route('admin.doctor.schedule.store') }}" method="POST">
        @csrf
        <input type="hidden" name="doctor_id" value="{{ $doctor->doctor_id }}">
        
        <div class="form-row-custom">
            <div class="form-group" style="margin:0;">
                <label>Hari</label>
                <select name="day" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            <div class="form-group" style="margin:0;">
                <label>Jam Mulai</label>
                <input type="time" name="start_time" required>
            </div>

            <div class="form-group" style="margin:0;">
                <label>Jam Selesai</label>
                <input type="time" name="end_time" required>
            </div>

            <div class="form-group" style="margin:0;">
                <label>Kuota</label>
                <input type="number" name="quota" value="1" min="1" required>
            </div>

            <button type="submit" class="btn-submit" style="padding: 10px 16px;">+ Slot</button>
        </div>
    </form>
</div>
@endsection