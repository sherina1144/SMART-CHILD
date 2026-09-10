<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Tambah Dokter</title>
    <style>
        body { font-family: sans-serif; padding: 2rem; background: #f9f9f9; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #1e4d3b; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Dokter / Terapis</h2>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
    <div style="background: #ffe6e6; color: red; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap & Gelar</label>
                <input type="text" name="nama_lengkap" placeholder="Masukan nama dokter atau trapis" required>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Dokter Spesialis">Dokter Spesialis</option>
                    <option value="Psikolog">Psikolog</option>
                    <option value="Terapis">Terapis</option>
                    <option value="Konselor Laktasi">Konselor Laktasi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Spesialisasi</label>
                <textarea name="spesialisasi" placeholder="Masukan spesialisasi" required></textarea>
            </div>
            <div class="form-group">
                <label>Foto Dokter</label>
                <input type="file" name="foto" required>
            </div>
            <div class="form-group">
                <label>Lama Pengalaman (Tahun)</label>
                <input type="number" name="lama_pengalaman" placeholder="Masukan lama pengalaman" required>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="number" step="0.1" name="rating" placeholder="Masukan rating" value="4.5" required>
            </div>
            <div class="form-group">
                <label>Biaya Konsultasi (Rp)</label>
                <input type="number" name="biaya_konsultasi" placeholder="Masukan biaya konsultasi" required>
            </div>
            <div class="form-group">
                <label>Jadwal Praktik</label>
                <input type="text" name="jadwal_praktik" placeholder="Masukan jadwal praktik dokter atau trapis">
            </div>
            <button type="submit">Simpan Dokter</button>
        </form>

        <hr style="margin-top: 40px;">

        <h3>Daftar Dokter Tersimpan</h3>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Pengalaman</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doc)
                <tr>
                    <td><img src="{{ asset('storage/' . $doc->foto) }}" width="50" style="border-radius: 5px;"></td>
                    <td>{{ $doc->nama_lengkap }}</td>
                    <td>{{ $doc->kategori }}</td>
                    <td>{{ $doc->lama_pengalaman }} Tahun</td>
                    <td>★ {{ $doc->rating }}</td>
                    
                    <td>
                        <div style="display: flex; gap: 5px;">
                            <!-- Tombol Edit -->
                            <a href="{{ route('admin.doctor.edit', $doc->doctor_id) }}" style="background: #e0a800; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; font-size: 0.8rem; font-weight: bold;">Edit</a>

                            <!-- Form & Tombol Hapus -->
                            <form action="{{ route('admin.doctor.destroy', $doc->doctor_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dokter ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; font-weight: bold;">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>