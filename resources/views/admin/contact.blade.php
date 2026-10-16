@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4 py-4">

        {{-- Header Halaman --}}
        <div class="mb-4">
            <h2 class="fw-bold mb-1" style="color: #285B4D;">
                Kelola Kontak & Pesan Masuk
            </h2>

            <p class="mb-0" style="color: #667085;">
                Atur informasi kontak Smart Child dan lihat pesan yang dikirim pengguna.
            </p>
        </div>

        {{-- Notifikasi Sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
                </button>
            </div>
        @endif

        {{-- Pengaturan Informasi Kontak --}}
        <div class="card border-0 shadow-sm mb-4 contact-card">
            <div class="card-header contact-card-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="contact-icon">
                        <i class="fa-solid fa-gear"></i>
                    </div>

                    <div>
                        <h5 class="mb-1 fw-bold" style="color: #285B4D;">
                            Pengaturan Informasi Kontak
                        </h5>
                        <small class="text-muted">
                            Informasi yang ditampilkan kepada pengguna.
                        </small>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('admin.contact.update') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Email --}}
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold">
                                Email Resmi
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ $setting->email ?? '' }}"
                                required>
                        </div>

                        {{-- Telepon --}}
                        <div class="col-md-6 mb-3">
                            <label for="telepon" class="form-label fw-semibold">
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="telepon"
                                name="telepon"
                                value="{{ $setting->telepon ?? '' }}"
                                required>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="col-md-6 mb-3">
                            <label for="whatsapp" class="form-label fw-semibold">
                                Nomor WhatsApp
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="whatsapp"
                                name="whatsapp"
                                value="{{ $setting->whatsapp ?? '' }}"
                                placeholder="Contoh: 628123456789"
                                required>

                            <small class="text-muted">
                                Gunakan format nomor yang diawali 628.
                            </small>
                        </div>

                        {{-- Jam Operasional --}}
                        <div class="col-md-6 mb-3">
                            <label for="jam_operasional" class="form-label fw-semibold">
                                Jam Operasional
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="jam_operasional"
                                name="jam_operasional"
                                value="{{ $setting->jam_operasional ?? '' }}"
                                required>
                        </div>

                        {{-- Lokasi --}}
                        <div class="col-12 mb-3">
                            <label for="lokasi" class="form-label fw-semibold">
                                Alamat Lokasi
                            </label>

                            <textarea
                                class="form-control"
                                id="lokasi"
                                name="lokasi"
                                rows="3"
                                required>{{ $setting->lokasi ?? '' }}</textarea>
                        </div>

                        {{-- Google Maps --}}
                        <div class="col-12 mb-4">
                            <label for="maps_embed_url" class="form-label fw-semibold">
                                Google Maps Embed URL
                            </label>

                            <textarea
                                class="form-control"
                                id="maps_embed_url"
                                name="maps_embed_url"
                                rows="3"
                                placeholder="Masukkan URL embed Google Maps">{{ $setting->maps_embed_url ?? '' }}</textarea>

                            <small class="text-muted">
                                Masukkan URL dari atribut
                                <code>src</code> pada kode embed Google Maps.
                            </small>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn contact-save-btn rounded-3 px-4">
                        <i class="fa-solid fa-floppy-disk me-2"></i>
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

        {{-- Daftar Pesan Masuk --}}
        <div class="card border-0 shadow-sm contact-card">
            <div class="card-header contact-card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>
                            <h5 class="mb-1 fw-bold" style="color: #285B4D;">
                                Daftar Pesan Masuk
                            </h5>
                            <small class="text-muted">
                                Pesan yang dikirim oleh pengguna Smart Child.
                            </small>
                        </div>
                    </div>

                    <span class="contact-total-badge">
                        Total: {{ $messages->count() }} Pesan
                    </span>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 contact-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengirim</th>
                                <th>Subjek</th>
                                <th>Pesan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($messages as $index => $msg)
                                <tr>
                                    <td class="fw-semibold" style="color: #285B4D;">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        <div class="fw-semibold text-dark">
                                            {{ $msg->nama }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $msg->email }}
                                        </small>
                                    </td>

                                    <td>
                                        <span class="contact-subject-badge">
                                            {{ $msg->subjek }}
                                        </span>
                                    </td>

                                    <td>
                                        <span
                                            class="contact-message"
                                            title="{{ $msg->pesan }}">
                                            {{ Str::limit($msg->pesan, 50) }}
                                        </span>
                                    </td>

                                    <td class="text-muted small">
                                        {{ $msg->created_at
                                            ? $msg->created_at->format('d M Y, H:i')
                                            : '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="fa-regular fa-envelope-open d-block mb-2 fs-3"></i>
                                        Belum ada pesan masuk dari pengguna.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- Styling Halaman --}}
    <style>
        .contact-card {
            border-radius: 16px;
            overflow: hidden;
            background-color: #FFFFFF;
        }

        .contact-card-header {
            background-color: #FFFFFF;
            padding: 20px 24px;
            border-bottom: 1px solid #E8E4DC;
        }

        .contact-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border-radius: 12px;
            background-color: #EAF5EF;
            color: #285B4D;
            font-size: 18px;
        }

        .contact-card .form-label {
            color: #344054;
            font-size: 14px;
        }

        .contact-card .form-control {
            border: 1px solid #E0E5E1;
            border-radius: 9px;
            padding: 10px 12px;
            color: #344054;
        }

        .contact-card .form-control:focus {
            border-color: #70B2A0;
            box-shadow: 0 0 0 0.2rem rgba(112, 178, 160, 0.15);
        }

        .contact-save-btn {
            background-color: #315C50;
            color: #FFFFFF;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            font-weight: 600;
        }

        .contact-save-btn:hover {
            background-color: #285B4D;
            color: #FFFFFF;
        }

        .contact-total-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 50px;
            background-color: #EAF5EF;
            color: #285B4D;
            font-size: 12px;
            font-weight: 600;
        }

        .contact-table {
            color: #344054;
        }

        .contact-table thead th {
            background-color: #FFF9F2;
            color: #315C50;
            font-size: 13px;
            font-weight: 600;
            padding: 17px 18px;
            white-space: nowrap;
            border-bottom: 1px solid #E8E4DC;
        }

        .contact-table tbody td {
            padding: 18px;
            font-size: 13px;
            border-bottom: 1px solid #EAECF0;
            background-color: #FFFFFF;
        }

        .contact-table tbody tr:last-child td {
            border-bottom: none;
        }

        .contact-table tbody tr:hover td {
            background-color: #FCFDFC;
        }

        .contact-subject-badge {
            display: inline-block;
            max-width: 180px;
            padding: 6px 10px;
            border-radius: 50px;
            background-color: #EAF5EF;
            color: #285B4D;
            font-size: 11px;
            font-weight: 600;
        }

        .contact-message {
            display: inline-block;
            max-width: 240px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: middle;
            color: #667085;
        }

        @media (max-width: 768px) {
            .contact-card-header {
                padding: 16px;
            }

            .contact-card .card-body {
                padding: 20px !important;
            }

            .contact-table thead th,
            .contact-table tbody td {
                padding: 14px 12px;
            }
        }
    </style>
@endsection