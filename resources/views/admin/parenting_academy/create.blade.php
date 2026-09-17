@extends('layout.dashboard_admin')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 25px;">
        <div>
            <h2 style="font-size: 24px; font-weight: 800; color: #253D32; margin-bottom: 5px;">Tambah Materi Parenting</h2>
            <p style="font-size: 14px; color: #64748B;">Isi form di bawah untuk mempublikasikan materi edukasi baru.</p>
        </div>
        <a href="{{ route('admin.parenting.index') }}" style="background-color: #E2E8F0; color: #475569; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px;">
            <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div style="background-color: #FEE2E2; color: #DC2626; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background: #ffffff; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border: 1px solid #E2E8F0;">
        <form action="{{ route('admin.parenting.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px;">Judul Materi</label>
                <input type="text" name="title" value="{{ old('title') }}" required style="width: 100%; padding: 12px 16px; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 14px; outline: none; transition: border 0.2s;" placeholder="Contoh: Tips Mengatasi Anak Tantrum di Tempat Umum">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px;">Kategori</label>
                <input type="text" name="category" value="{{ old('category') }}" style="width: 100%; padding: 12px 16px; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 14px; outline: none;" placeholder="Contoh: Psikologi Anak, Nutrisi, Tumbuh Kembang">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px;">Deskripsi / Konten Materi</label>
                <textarea name="description" rows="6" required style="width: 100%; padding: 12px 16px; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 14px; outline: none;" placeholder="Tuliskan isi ringkasan atau penjelasan materi...">{{ old('description') }}</textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                <div>
                    <label style="display: block; font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px;">Thumbnail (Gambar)</label>
                    <input type="file" name="thumbnail" accept="image/*" style="width: 100%; font-size: 13px; color: #64748B;">
                </div>
                <div>
                    <label style="display: block; font-size: 14px; font-weight: 700; color: #334155; margin-bottom: 8px;">URL Video (Opsional)</label>
                    <input type="url" name="video_url" value="{{ old('video_url') }}" style="width: 100%; padding: 12px 16px; border: 1px solid #CBD5E1; border-radius: 8px; font-size: 14px; outline: none;" placeholder="https://www.youtube.com/watch?v=...">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="{{ route('admin.parenting.index') }}" style="background-color: #F1F5F9; color: #475569; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">Batal</a>
                <button type="submit" style="background-color: #253D32; color: #ffffff; padding: 12px 24px; border-radius: 8px; border: none; font-weight: 600; font-size: 14px; cursor: pointer;">Simpan Materi</button>
            </div>
        </form>
    </div>
</div>
@endsection