@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            {{-- Header & Tombol Kembali --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-3 border-bottom">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Semua Diskusi Komunitas</h2>
                    <p class="text-muted mb-0 small">Temukan berbagai topik menarik seputar tumbuh kembang dan parenting.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('community.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 py-2">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            </div>

            {{-- Daftar Thread --}}
            <div class="thread-list">
                @forelse($threads as $thread)
                    <div class="card border-0 shadow-sm mb-3 rounded-4 p-4 thread-card position-relative">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            {{-- Kategori Badge --}}
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill fw-semibold">
                                {{ $thread->category }}
                            </span>
                            <span class="text-muted small">
                                🕒 {{ $thread->created_at->diffForHumans() }}
                            </span>
                        </div>

                        {{-- Judul Diskusi (Tanpa stretched-link agar aman) --}}
                        <h4 class="h5 fw-bold mb-2">
                            <a href="{{ route('community.show', $thread->id) }}" class="text-decoration-none text-dark title-hover">
                                {{ $thread->title }}
                            </a>
                        </h4>

                        {{-- Cuplikan Konten --}}
                        <p class="text-secondary mb-3 small line-clamp-2">
                            {{ $thread->content }}
                        </p>

                        {{-- Footer Card (Author & Balasan) --}}
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top text-muted small">
                            <div>
                                Oleh <strong class="text-dark">{{ $thread->author_name ?? $thread->user->name ?? 'Pengguna' }}</strong>
                            </div>
                            <div class="bg-light px-3 py-1 rounded-pill text-dark fw-medium">
                                💬 {{ $thread->replies_count }} Balasan
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                        <p class="text-muted mb-0">Belum ada diskusi yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $threads->links() }}
            </div>

        </div>
    </div>
</div>

<style>
    .thread-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        background-color: #fff;
    }
    .thread-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08) !important;
    }
    .title-hover:hover {
        color: #198754 !important; /* Berubah warna hijau saat kursor diarahkan ke judul */
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection