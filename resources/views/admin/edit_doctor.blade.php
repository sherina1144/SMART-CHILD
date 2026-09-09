<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Dokter</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 2rem; background: #f9f9f9; }
        .container { max-width: 700px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select, textarea { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px; }
        button { background: #1e4d3b; color: white; border: none; padding: 12px 20px; cursor: pointer; border-radius: 5px; font-weight: bold; }
        .btn-cancel { background: #888; text-decoration: none; padding: 12px 20px; color: white; border-radius: 5px; font-weight: bold; display: inline-block; }
        .alert-danger { background: #ffe6e6; color: #d8000c; padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; }
        .img-preview { width: 80px; height: 110px; object-fit: cover; border-radius: 20px; margin-top: 5px; display: block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Dokter / Terapis</h2>

        @if ($errors->any())
            <div class="alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                <textarea name="spesialisasi" required>{{ old('spesialisasi', $doctor->spesialisasi) }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto Saat Ini</label>
                @if($doctor->foto)
                    <img src="{{ asset('storage/' . $doctor->foto) }}" class="img-preview" alt="Foto">
                @endif
                <label style="margin-top: 10px; font-weight: normal;">Ganti Foto (Biarkan kosong jika tidak ingin mengubah):</label>
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

            <div class="form-group">
                <label>Jadwal Praktik</label>
                <input type="text" name="jadwal_praktik" value="{{ old('jadwal_praktik', $doctor->jadwal_praktik) }}">
            </div>

            <button type="submit">Update Dokter</button>
            <a href="{{ route('admin.doctor.add') }}" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>