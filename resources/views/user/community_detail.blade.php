@extends('layout.app')

@section('content')
    <div class="container community-detail-container">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('community.index') }}" class="btn-back">
                &larr; Kembali ke Komunitas
            </a>
        </div>

        <!-- Detail Thread -->
        <div class="thread-card">
            <span class="thread-category-badge">
                {{ $thread->category }}
            </span>
            <h1 class="thread-main-title">{{ $thread->title }}</h1>
            <p class="thread-info">
                Diposting oleh
                <strong>{{ $thread->user->name ?? $thread->author_name ?? 'Pengguna' }}</strong> pada
                {{ $thread->created_at->format('d M Y, H:i') }}
            </p>

            <div class="thread-body">
                {{ $thread->content }}
            </div>
        </div>

        <!-- Kolom Komentar / Balasan -->
        <div class="replies-section">
            <h3 class="replies-heading">Balasan Diskusi</h3>

            <!-- Form Kirim Komentar -->
            <form action="{{ route('community.storeReply', $thread->id) }}" method="POST" class="reply-form mb-4">
                @csrf
                <div class="form-group mb-3">
                    <textarea name="content" rows="3" placeholder="Tulis tanggapan atau saran Anda..." required
                        class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn-submit">Kirim Komentar</button>
            </form>

            <!-- Daftar Komentar Masuk -->
            <div class="replies-list">
                @forelse($thread->replies as $reply)
                    <div class="reply-card">
                        <div class="reply-header">
                            <strong class="reply-author">{{ $reply->user->name ?? $reply->user->nama ?? 'Pengguna' }}</strong>
                            <span class="reply-time">{{ $reply->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="reply-content mb-0">{{ $reply->content }}</p>
                    </div>
                @empty
                    <div class="empty-replies">
                        Belum ada balasan pada diskusi ini. Jadilah yang pertama memberikan tanggapan!
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Styling CSS yang sudah diperbaiki -->
    <style>
        .community-detail-container {
            padding: 2rem 1rem;
            max-width: 850px;
            margin: 0 auto;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem; /* Diperbaiki dari 0.5Krem */
            padding: 0.4rem 0.9rem;
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-back:hover {
            background-color: #e5e7eb;
            color: #1f2937;
            border-color: #9ca3af;
        }

        .thread-card {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .thread-category-badge {
            background: #ccfbf1;
            color: #0f766e;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .thread-main-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 0.75rem;
            color: #1c1917;
        }

        .thread-info {
            color: #78716c;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .thread-body {
            margin-top: 1rem;
            color: #292524;
            line-height: 1.6;
        }

        .replies-section {
            margin-top: 2rem;
        }

        .replies-heading {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #1c1917;
        }

        .reply-form {
            background: white;
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d6d3d1;
            border-radius: 0.5rem;
            outline: none;
            font-family: inherit;
            resize: vertical;
        }

        .form-textarea:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 2px rgba(13, 148, 136, 0.1);
        }

        .btn-submit {
            background: #0d9488;
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-submit:hover {
            background: #0f766e;
        }

        .replies-list {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .reply-card {
            background: #f0fdf4;
            border-left: 4px solid #0d9488;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem 0.75rem 0.75rem 0.5rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .reply-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.4rem;
        }

        .reply-author {
            font-size: 0.875rem;
            color: #0f766e;
            font-weight: 600;
        }

        .reply-time {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .reply-content {
            color: #1f2937;
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .empty-replies {
            color: #78716c;
            font-size: 0.875rem;
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection