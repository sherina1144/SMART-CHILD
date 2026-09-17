@extends('layout.dashboard_admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 24px; font-weight: 800; color: #253D32; margin-bottom: 5px;">Kelola Parenting Academy</h2>
        <p style="font-size: 14px; color: #64748B;">Tambah, ubah, atau hapus materi edukasi untuk para orang tua.</p>
    </div>
    <a href="{{ route('admin.parenting.create') }}" style="background-color: #253D32; color: #ffffff; padding: 10px 18px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 14px; display: flex; align-items: center; gap: 8px; transition: background 0.2s;">
        <i class="fa-solid fa-plus"></i> Tambah Materi
    </a>
</div>

<!-- Notifikasi Berhasil -->
@if(session('success'))
    <div style="background-color: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

<!-- Tabel Daftar Materi -->
<div style="background: #ffffff; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); overflow: hidden; border: 1px solid #E2E8F0;">
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background-color: #F8FAF9; border-bottom: 1px solid #E2E8F0; color: #64748B; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                <th style="padding: 16px 20px;">No</th>
                <th style="padding: 16px 20px;">Thumbnail</th>
                <th style="padding: 16px 20px;">Judul & Kategori</th>
                <th style="padding: 16px 20px;">Status</th>
                <th style="padding: 16px 20px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody style="font-size: 14px; color: #334155;">
            @forelse($academies as $index => $item)
                <tr style="border-bottom: 1px solid #F1F5F9; transition: background 0.2s;" onmouseover="this.style.backgroundColor='#F8FAF9'" onmouseout="this.style.backgroundColor='transparent'">
                    <td style="padding: 16px 20px; font-weight: 600; color: #64748B;">{{ $index + 1 }}</td>
                    <td style="padding: 16px 20px;">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="Thumbnail" style="width: 60px; height: 40px; object-fit: cover; border-radius: 6px;">
                        @else
                            <div style="width: 60px; height: 40px; background-color: #E2E8F0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #94A3B8; font-size: 12px;">No Img</div>
                        @endif
                    </td>
                    <td style="padding: 16px 20px;">
                        <div style="font-weight: 700; color: #253D32; margin-bottom: 4px;">{{ $item->title }}</div>
                        <span style="font-size: 11px; background-color: #E2F6EE; color: #0D9488; padding: 2px 8px; border-radius: 6px; font-weight: 600;">{{ $item->category ?? 'Umum' }}</span>
                    </td>
                    <td style="padding: 16px 20px;">
                        <span style="font-size: 11px; padding: 4px 10px; border-radius: 20px; font-weight: 700; {{ $item->status == 'published' ? 'background-color: #dcfce7; color: #166534;' : 'background-color: #fef9c3; color: #854d0e;' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td style="padding: 16px 20px; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 8px;">
                            <a href="{{ route('admin.parenting.edit', $item->id) }}" style="background-color: #FEF3C7; color: #D97706; padding: 6px 10px; border-radius: 6px; text-decoration: none; font-size: 13px;" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.parenting.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #FEE2E2; color: #DC2626; border: none; padding: 6px 10px; border-radius: 6px; cursor: pointer; font-size: 13px;" title="Hapus">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 40px; text-align: center; color: #94A3B8;">
                        Belum ada data materi Parenting Academy. Silakan tambahkan materi baru.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection