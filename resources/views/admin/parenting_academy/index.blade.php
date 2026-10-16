
@extends('layout.dashboard_admin')

@section('content')

<style>
    .parenting-page {
        padding: 24px;
        color: #253D32;
    }

    .parenting-header {
        margin-bottom: 24px;
    }

    .parenting-header h2 {
        margin: 0 0 6px;
        font-size: 25px;
        font-weight: 700;
        color: #253D32;
    }

    .parenting-header p {
        margin: 0;
        color: #7A8A82;
        font-size: 13px;
    }

    .parenting-section {
        margin-bottom: 28px;
        overflow: hidden;
        background: #FFFFFF;
        border: 1px solid #E5ECE7;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(37, 61, 50, 0.04);
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 20px 22px;
        background: #FFFFFF;
        border-bottom: 1px solid #E8EEEA;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .section-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 11px;
        color: #315C50;
        background: #EDF7F0;
        font-size: 17px;
    }

    .section-title h5 {
        margin: 0;
        color: #253D32;
        font-size: 15px;
        font-weight: 700;
    }

    .section-title p {
        margin: 4px 0 0;
        color: #7A8A82;
        font-size: 11px;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        flex-shrink: 0;
        padding: 10px 14px;
        border: none;
        border-radius: 9px;
        background: #315C50;
        color: #FFFFFF;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: background 0.2s ease;
    }

    .btn-add:hover {
        background: #253D32;
        color: #FFFFFF;
    }

    .btn-add.video {
        background: #315C50;
    }

    .btn-add.webinar {
        background: #315C50;
    }

    .section-body {
        padding: 0 22px 18px;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .parenting-table {
        width: 100%;
        min-width: 600px;
        margin: 0;
        border-collapse: collapse;
        color: #53645A;
        font-size: 12px;
    }

    .parenting-table thead th {
        padding: 15px 12px;
        background: #F5F8F5;
        color: #52655A;
        border-bottom: 1px solid #E5ECE7;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        text-align: left;
        white-space: nowrap;
    }

    .parenting-table tbody td {
        padding: 15px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #E8EEEA;
        line-height: 1.6;
    }

    .parenting-table tbody tr:last-child td {
        border-bottom: none;
    }

    .parenting-table tbody tr {
        transition: background 0.2s ease;
    }

    .parenting-table tbody tr:hover {
        background: #FAFCFA;
    }

    .thumbnail {
        display: block;
        width: 76px;
        height: 54px;
        object-fit: cover;
        border: 1px solid #E5ECE7;
        border-radius: 8px;
        background: #F5F8F5;
    }

    .item-title {
        display: block;
        margin-bottom: 4px;
        color: #253D32;
        font-weight: 600;
        font-size: 12px;
        overflow-wrap: anywhere;
    }

    .item-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #47698A;
        font-size: 11px;
        text-decoration: none;
        overflow-wrap: anywhere;
    }

    .item-link:hover {
        color: #315C50;
        text-decoration: underline;
    }

    .category-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 7px;
        color: #315C50;
        background: #EDF7F0;
        font-size: 10px;
        font-weight: 600;
    }

    .item-detail {
        display: flex;
        align-items: flex-start;
        gap: 7px;
        margin-bottom: 6px;
        color: #6E7F75;
        font-size: 11px;
    }

    .item-detail:last-child {
        margin-bottom: 0;
    }

    .item-detail i {
        width: 13px;
        margin-top: 3px;
        flex-shrink: 0;
        color: #7A9B8A;
    }

    .item-detail span {
        overflow-wrap: anywhere;
    }

    /* Tombol aksi ikon */
    .action-icons {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .action-edit {
        color: #315C50;
        background: #EDF7F0;
    }

    .action-edit:hover {
        color: #FFFFFF;
        background: #315C50;
    }

    .action-delete {
        color: #DC2626;
        background: #FFF0F0;
    }

    .action-delete:hover {
        color: #FFFFFF;
        background: #DC2626;
    }

    .action-icons form {
        display: inline-flex;
        margin: 0;
    }

    .empty-state {
        padding: 35px 15px !important;
        color: #849189;
        text-align: center;
    }

    .empty-state i {
        display: block;
        margin-bottom: 10px;
        color: #A3B899;
        font-size: 25px;
    }

    .empty-state p {
        margin: 0;
        font-size: 12px;
    }

    .alert {
        border-radius: 10px;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        .parenting-page {
            padding: 16px 10px;
        }

        .parenting-header h2 {
            font-size: 21px;
        }

        .section-header {
            align-items: flex-start;
            flex-direction: column;
            padding: 16px;
        }

        .section-body {
            padding: 0 12px 12px;
        }

        .btn-add {
            width: 100%;
        }

        .section-title h5 {
            font-size: 13px;
        }
    }
</style>

<div class="parenting-page">

    {{-- HEADER HALAMAN --}}
    <div class="parenting-header">
        <h2>Kelola Parenting Academy</h2>
        <p>Kelola buku panduan, artikel, video rekomendasi, dan webinar SmartChild.</p>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- SECTION 1: BUKU PANDUAN DAN ARTIKEL --}}
    <div class="parenting-section">

        <div class="section-header">
            <div class="section-title">
                <div class="section-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div>
                    <h5>Daftar Buku Panduan & Artikel</h5>
                    <p>Kelola materi bacaan untuk orang tua.</p>
                </div>
            </div>

            <a href="{{ url('admin/parenting-academy/academy/create') }}" class="btn-add">
                <i class="fa-solid fa-plus"></i>
                Tambah Buku/Artikel
            </a>
        </div>

        <div class="section-body">
            <div class="table-responsive">
                <table class="parenting-table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($academies as $item)
                            <tr>
                                <td>
                                    @if($item->thumbnail)
                                        <img
                                            src="{{ asset('storage/' . $item->thumbnail) }}"
                                            alt="{{ $item->title }}"
                                            class="thumbnail">
                                    @else
                                        <div class="thumbnail d-flex align-items-center justify-content-center">
                                            <i class="fa-regular fa-image text-secondary"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <span class="item-title">{{ $item->title }}</span>
                                </td>

                                <td>
                                    <span class="category-badge">
                                        {{ $item->category }}
                                    </span>
                                </td>

                                <td>
                                    <div class="action-icons">
                                        <a
                                            href="{{ url('admin/parenting-academy/academy/' . $item->id . '/edit') }}"
                                            class="action-icon action-edit"
                                            title="Edit"
                                            aria-label="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form
                                            action="{{ url('admin/parenting-academy/academy/' . $item->id . '/destroy') }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus panduan ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-icon action-delete"
                                                title="Hapus"
                                                aria-label="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <p>Belum ada data buku panduan atau artikel.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- SECTION 2: VIDEO REKOMENDASI --}}
    <div class="parenting-section">

        <div class="section-header">
            <div class="section-title">
                <div class="section-icon">
                    <i class="fa-solid fa-video"></i>
                </div>
                <div>
                    <h5>Daftar Video Rekomendasi</h5>
                    <p>Kelola video edukasi dan informasi instruktur.</p>
                </div>
            </div>

            <a href="{{ url('admin/parenting-academy/video/create') }}" class="btn-add video">
                <i class="fa-solid fa-plus"></i>
                Tambah Video
            </a>
        </div>

        <div class="section-body">
            <div class="table-responsive">
                <table class="parenting-table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Judul Video</th>
                            <th>Durasi & Instruktur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($videos as $vid)
                            <tr>
                                <td>
                                    @if($vid->thumbnail)
                                        <img
                                            src="{{ asset('storage/' . $vid->thumbnail) }}"
                                            alt="{{ $vid->title }}"
                                            class="thumbnail">
                                    @else
                                        <div class="thumbnail d-flex align-items-center justify-content-center">
                                            <i class="fa-regular fa-image text-secondary"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <span class="item-title">{{ $vid->title }}</span>

                                    @if($vid->video_url)
                                        <a
                                            href="{{ $vid->video_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="item-link">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            Lihat Link Video
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    <div class="item-detail">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>{{ $vid->duration ?: '-' }}</span>
                                    </div>

                                    <div class="item-detail">
                                        <i class="fa-solid fa-user-doctor"></i>
                                        <span>{{ $vid->instructor ?: '-' }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="action-icons">
                                        <a
                                            href="{{ route('admin.parenting.academy.video.edit', $vid->id) }}"
                                            class="action-icon action-edit"
                                            title="Edit"
                                            aria-label="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.parenting.academy.video.destroy', $vid->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-icon action-delete"
                                                title="Hapus"
                                                aria-label="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fa-solid fa-video-slash"></i>
                                    <p>Belum ada data video rekomendasi.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- SECTION 3: WEBINAR DAN KELAS ONLINE --}}
    
    <div class="parenting-section">

        {{-- Header Section --}}
        <div class="section-header">
            <div class="section-title">
                <div class="section-icon">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>

                <div>
                    <h5>Daftar Webinar & Kelas Online</h5>
                    <p>Kelola jadwal webinar dan informasi narasumber.</p>
                </div>
            </div>

            <a href="{{ url('admin/parenting-academy/webinar/create') }}"
            class="btn-add webinar">
                <i class="fa-solid fa-plus"></i>
                Tambah Webinar
            </a>
        </div>

        {{-- Tabel Webinar --}}
        <div class="section-body">
            <div class="table-responsive">
                <table class="parenting-table">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Judul Webinar</th>
                            <th>Jadwal & Narasumber</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($webinars ?? [] as $web)
                            <tr>
                                {{-- Thumbnail --}}
                                <td>
                                    @if($web->image)
                                        <img
                                            src="{{ asset('storage/' . $web->image) }}"
                                            alt="{{ $web->title }}"
                                            class="thumbnail">
                                    @else
                                        <div class="thumbnail d-flex align-items-center justify-content-center">
                                            <i class="fa-regular fa-image text-secondary"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Judul dan Link --}}
                                <td>
                                    <span class="item-title">
                                        {{ $web->title }}
                                    </span>

                                    @if($web->link)
                                        <a
                                            href="{{ $web->link }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="item-link">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                            Lihat Tautan
                                        </a>
                                    @endif
                                </td>

                                {{-- Jadwal dan Narasumber --}}
                                <td>
                                    <div class="item-detail">
                                        <i class="fa-regular fa-calendar"></i>

                                        <span>
                                            @if($web->schedule)
                                                {{ \Carbon\Carbon::parse($web->schedule)->format('d/m/Y H:i') }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </div>

                                    <div class="item-detail">
                                        <i class="fa-solid fa-user-tie"></i>

                                        <span>
                                            {{ $web->speaker ?: '-' }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <div class="action-icons">
                                        <a
                                            href="{{ route('admin.parenting.academy.webinar.edit', $web->id) }}"
                                            class="action-icon action-edit"
                                            title="Edit"
                                            aria-label="Edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.parenting.academy.webinar.destroy', $web->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus webinar ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-icon action-delete"
                                                title="Hapus"
                                                aria-label="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <i class="fa-regular fa-calendar-xmark"></i>
                                    <p>Belum ada data webinar atau kelas online.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection
