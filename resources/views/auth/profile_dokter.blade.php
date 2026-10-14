@extends('layout.dashboard_dokter') {{-- Sesuaikan dengan layout dashboard utama dokter/admin kamu --}}

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
    .form-group textarea { 
        width: 100%; 
        padding: 10px; 
        box-sizing: border-box; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
        background-color: #F7FAFC;
        color: #4A5568;
    }
    .img-preview { width: 90px; height: 120px; object-fit: cover; border-radius: 10px; margin-top: 5px; display: block; border: 1px solid #E2E8F0; }
    .alert-info { background: #EBF8FF; color: #2B6CB0; padding: 12px 15px; border-radius: 5px; margin-bottom: 20px; font-size: 14px; }
    .alert-warning { background: #FEFCBF; color: #744210; padding: 12px 15px; border-radius: 5px; margin-bottom: 20px; font-size: 14px; }
</style>

<div class="form-container">
    <h2 style="margin-bottom: 15px; color: #253D32;">Profil Saya (Dokter / Terapis)</h2>
    
    @if(isset($message))
        <div class="alert-warning">
            ⚠️ {{ $message }}
        </div>
    @else
        <div class="alert-info">
            ℹ️ Informasi profil ini dikelola sepenuhnya oleh Admin. Jika terdapat kesalahan data, silakan hubungi administrator sistem.
        </div>

        <div class="form-group">
            <label>Nama Lengkap & Gelar</label>
            <input type="text" value="{{ $doctor->nama_lengkap ?? '-' }}" disabled>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" value="{{ $doctor->kategori ?? '-' }}" disabled>
        </div>

        <div class="form-group">
            <label>Spesialisasi</label>
            <textarea rows="3" disabled>{{ $doctor->spesialisasi ?? '-' }}</textarea>
        </div>

        <div class="form-group">
            <label>Foto Profil Dokter</label>
            @if(isset($doctor->foto) && $doctor->foto)
                <img src="{{ asset('storage/' . $doctor->foto) }}" class="img-preview" alt="Foto Dokter">
            @else
                <p style="font-size: 13px; color: #718096;">Tidak ada foto.</p>
            @endif
        </div>

        <div class="form-group">
            <label>Lama Pengalaman</label>
            <input type="text" value="{{ $doctor->lama_pengalaman ?? 0 }} Tahun" disabled>
        </div>

        <div class="form-group">
            <label>Rating</label>
            <input type="text" value="⭐ {{ $doctor->rating ?? '0' }}" disabled>
        </div>

        <div class="form-group">
            <label>Biaya Konsultasi</label>
            <input type="text" value="Rp {{ number_format($doctor->biaya_konsultasi ?? 0, 0, ',', '.') }}" disabled>
        </div>
    @endif
</div>
@endsection