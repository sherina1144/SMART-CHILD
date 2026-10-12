@extends('layout.app')

@section('content')
<div style="background-color: #f8f9fa; min-height: 100vh; padding: 3rem 0;">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 1rem;">
        
        <!-- Tombol Kembali -->
        <a href="{{ route('services.parenting_academy') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none; color: #4f46e5; font-weight: 600; margin-bottom: 2rem; transition: color 0.2s;">
            &larr; Kembali ke Parenting Academy
        </a>

        <!-- Kartu Konten Utama -->
        <article style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); overflow: hidden; padding: 2.5rem;">
            
            <!-- Kategori Badge -->
            <div style="margin-bottom: 1rem;">
                <span style="background-color: #e0e7ff; color: #4f46e5; padding: 0.35rem 0.85rem; border-radius: 50px; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                    {{ $academy->category }}
                </span>
            </div>

            <!-- Judul Artikel -->
            <h1 style="font-size: 2.25rem; font-weight: 700; color: #1f2937; line-height: 1.3; margin-bottom: 1.5rem;">
                {{ $academy->title }}
            </h1>

            <!-- Thumbnail Gambar (Bisa diklik jika link terisi) -->
            @if($academy->thumbnail)
                <div style="margin-bottom: 2rem; border-radius: 12px; overflow: hidden; max-height: 450px;">
                    @if(!empty($academy->link))
                        <a href="{{ $academy->link }}" target="_blank" title="Klik untuk membuka tautan">
                            <img src="{{ asset('storage/' . $academy->thumbnail) }}" alt="{{ $academy->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $academy->thumbnail) }}" alt="{{ $academy->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @endif
                </div>
            @endif

            <!-- Isi Deskripsi / Konten -->
            <div class="content-body" style="color: #4b5563; font-size: 1.05rem; line-height: 1.8; margin-bottom: 2rem;">
                {!! $academy->description !!}
            </div>

            <!-- Tombol Link Eksternal / Dokumen Terkait -->
            @if(!empty($academy->link))
                <div style="border-top: 1px solid #e5e7eb; padding-top: 1.5rem; margin-top: 2rem;">
                    <a href="{{ $academy->link }}" target="_blank" style="display: inline-flex; align-items: center; gap: 0.5rem; background-color: #4f46e5; color: #ffffff; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 600; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2); transition: background-color 0.2s;">
                        🔗 Kunjungi Tautan / Unduh Dokumen
                    </a>
                </div>
            @else
                <!-- Pesan opsional jika link kosong agar tahu datanya belum diisi admin -->
                <div style="border-top: 1px solid #e5e7eb; padding-top: 1rem; margin-top: 2rem; color: #9ca3af; font-size: 0.9rem; font-style: italic;">
                    *Tidak ada tautan eksternal untuk materi ini.
                </div>
            @endif

        </article>
    </div>
</div>
@endsection