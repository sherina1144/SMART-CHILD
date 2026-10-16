@extends('layout.dashboard_admin')

@section('content')
    <div class="container-fluid px-4 py-4">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-1" style="color: #315C50;">Kelola Subscriber Newsletter</h2>
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

        {{-- Daftar subscriber --}}
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold" style="color: #315C50;">
                    <i class="fa-solid fa-envelope-open-text me-2"></i>
                    Daftar Email Berlangganan
                </h5>

                <span
                    class="badge px-3 py-2"
                    style="background-color: #EAF5EF; color: #315C50;">
                    Total: {{ $newsletters->count() }} Email
                </span>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="10%">No</th>
                                <th>Alamat Email</th>
                                <th>Tanggal Berlangganan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($newsletters as $index => $sub)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td class="fw-semibold">
                                        {{ $sub->email }}
                                    </td>

                                    <td class="text-muted small">
                                        <i class="fa-regular fa-calendar-days me-1"></i>
                                        {{ $sub->created_at->format('d M Y, H:i') }}
                                    </td>

                                    <td class="text-center">
                                        <form
                                            action="{{ route('admin.newsletter.destroy', $sub->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus email ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm border-0 rounded-3"
                                                style="background-color: #FFF0F0; color: #B42318; width: 36px; height: 36px;"
                                                title="Hapus"
                                                aria-label="Hapus subscriber"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Belum ada email yang berlangganan newsletter.
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