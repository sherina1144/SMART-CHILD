@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        {{-- Header --}}
        <div class="mb-4">
            <h2 class="fw-bold mb-1" style="color: #285B4D;">
                Daftar Pengajuan Partnership
            </h2>

            <p class="mb-0" style="color: #667085;">
                Kelola dan tinjau pengajuan kerja sama dari School dan Business Partner.
            </p>
        </div>

        {{-- Notifikasi --}}
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

        {{-- Tabel Partnership --}}
        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 partnership-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Instansi</th>
                                <th>Tipe</th>
                                <th>Kontak PIC</th>
                                <th>Pesan Kolaborasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($partnerships as $index => $item)
                                <tr>
                                    {{-- Nomor --}}
                                    <td class="fw-semibold" style="color: #285B4D;">
                                        {{ $index + 1 }}
                                    </td>

                                    {{-- Instansi --}}
                                    <td>
                                        <div class="fw-semibold text-dark">
                                            {{ $item->nama_instansi }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $item->email }}
                                        </small>
                                    </td>

                                    {{-- Tipe Partner --}}
                                    <td>
                                        @if ($item->tipe_partner == 'School')
                                            <span class="status-badge badge-school">
                                                School
                                            </span>
                                        @else
                                            <span class="status-badge badge-business">
                                                {{ $item->tipe_partner }}
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Kontak PIC --}}
                                    <td>
                                        {{ $item->kontak_person }}
                                    </td>

                                    {{-- Pesan Kolaborasi --}}
                                    <td>
                                        <span
                                            class="message-text"
                                            title="{{ $item->pesan }}"
                                        >
                                            {{ $item->pesan ?? '-' }}
                                        </span>
                                    </td>

                                    {{-- Status --}}
                                    <td>
                                        @if ($item->status == 'Confirmed')
                                            <span class="status-badge badge-confirmed">
                                                Dikonfirmasi
                                            </span>
                                        @elseif ($item->status == 'Cancelled')
                                            <span class="status-badge badge-cancelled">
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="status-badge badge-process">
                                                Proses
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        <div class="action-buttons">
                                            @if ($item->status != 'Confirmed')
                                                <form
                                                    action="{{ route('admin.partnership.status', $item->partnership_id) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method('PUT')

                                                    <input
                                                        type="hidden"
                                                        name="status"
                                                        value="Confirmed"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="btn-action btn-confirm"
                                                        title="Konfirmasi kerja sama"
                                                    >
                                                        Konfirmasi
                                                    </button>
                                                </form>
                                            @endif

                                            @if ($item->status != 'Cancelled')
                                                <form
                                                    action="{{ route('admin.partnership.status', $item->partnership_id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menolak pengajuan partnership ini?')"
                                                >
                                                    @csrf
                                                    @method('PUT')

                                                    <input
                                                        type="hidden"
                                                        name="status"
                                                        value="Cancelled"
                                                    >

                                                    <button
                                                        type="submit"
                                                        class="btn-action btn-cancel"
                                                        title="Tolak kerja sama"
                                                    >
                                                        Tolak
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty-message">
                                        <i class="fa-regular fa-folder-open"></i>
                                        <span>Belum ada pengajuan partnership yang masuk.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Styling Partnership --}}
    <style>
        .partnership-table {
            width: 100%;
            margin-bottom: 0;
            color: #315C50;
            vertical-align: middle;
        }

        .partnership-table thead th {
            background-color: #FFF9F2;
            color: #315C50;
            font-size: 13px;
            font-weight: 600;
            padding: 17px 18px;
            white-space: nowrap;
            border-bottom: 1px solid #E8E4DC;
        }

        .partnership-table tbody td {
            background-color: #FFFFFF;
            color: #344054;
            font-size: 13px;
            padding: 20px 18px;
            border-bottom: 1px solid #EAECF0;
        }

        .partnership-table tbody tr:last-child td {
            border-bottom: none;
        }

        .partnership-table tbody tr:hover td {
            background-color: #FCFDFC;
        }

        .partnership-table .status-badge {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-school {
            background-color: #EAF5EF;
            color: #285B4D;
        }

        .badge-business {
            background-color: #FFF2D6;
            color: #946200;
        }

        .badge-confirmed {
            background-color: #EAF5EF;
            color: #285B4D;
        }

        .badge-cancelled {
            background-color: #FDECEC;
            color: #B42318;
        }

        .badge-process {
            background-color: #FFF2D6;
            color: #946200;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 7px;
            min-width: 100px;
        }

        .action-buttons form {
            margin: 0;
        }

        .btn-action {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            min-width: 88px;
            min-height: 33px;
            padding: 8px 12px;
            border: none;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
            transition: opacity 0.2s ease;
        }

        .btn-action:hover {
            opacity: 0.85;
        }

        .btn-confirm {
            background-color: #70B2A0;
            color: #FFFFFF;
        }

        .btn-cancel {
            background-color: #FDECEC;
            color: #B42318;
        }

        .message-text {
            display: inline-block;
            max-width: 180px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            vertical-align: middle;
            color: #667085;
        }

        .empty-message {
            padding: 40px 20px !important;
            text-align: center;
            color: #667085 !important;
        }

        .empty-message i {
            display: block;
            margin-bottom: 10px;
            font-size: 26px;
            color: #70B2A0;
        }

        @media (max-width: 768px) {
            .partnership-table thead th,
            .partnership-table tbody td {
                padding: 14px 12px;
            }
        }
    </style>
@endsection